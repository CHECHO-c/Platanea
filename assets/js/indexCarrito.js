// Función para inicializar los eventos del carrito
function inicializarCarrito() {
    document.querySelectorAll('.btn-agregar-producto').forEach(btn => {
        btn.addEventListener('click', function() {
            const nombre = this.dataset.nombre;
            const precio = this.dataset.precio;
            const imagen = this.dataset.imagen;
            
            // Efecto visual de click
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
            
            fetch('controllers/users/agregarCarrito.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: `nombre=${encodeURIComponent(nombre)}&precio=${encodeURIComponent(precio)}&imagen=${encodeURIComponent(imagen)}&ajax=1`
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    mostrarToast();
                    // Efecto de éxito en el botón
                    this.innerHTML = '<i class="fa fa-check me-2"></i>¡Agregado!';
                    this.classList.remove('btn-success');
                    this.classList.add('btn-outline-success');
                    
                    setTimeout(() => {
                        this.innerHTML = '<i class="fa fa-cart-plus me-2"></i>Agregar al carrito';
                        this.classList.remove('btn-outline-success');
                        this.classList.add('btn-success');
                    }, 2000);
                } else {
                    mostrarErrorToast();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarErrorToast();
            });
        });
    });
}

// Función para mostrar toast de éxito
function mostrarToast() {
    const toast = document.getElementById('toastProductoAgregado');
    if (toast) {
        toast.style.display = 'block';
        setTimeout(() => { 
            toast.style.display = 'none'; 
        }, 3000);
    }
}

// Función para mostrar toast de error
function mostrarErrorToast() {
    // Crear toast de error si no existe
    let errorToast = document.getElementById('toastError');
    if (!errorToast) {
        errorToast = document.createElement('div');
        errorToast.id = 'toastError';
        errorToast.className = 'toast align-items-center text-bg-danger border-0 position-fixed end-0 top-0 m-4';
        errorToast.style.cssText = 'z-index: 9999; min-width: 200px; display:none;';
        errorToast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fa fa-exclamation-circle me-2"></i>Error al agregar producto
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        `;
        document.body.appendChild(errorToast);
    }
    
    errorToast.style.display = 'block';
    setTimeout(() => { 
        errorToast.style.display = 'none'; 
    }, 3000);
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    inicializarCarrito();
    
    // Agregar efecto hover a las cards
    document.querySelectorAll('#productos-grid .card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

// Función para reinicializar eventos (útil si se cargan productos dinámicamente)
function reinicializarCarrito() {
    inicializarCarrito();
} 