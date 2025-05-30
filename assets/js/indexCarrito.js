document.querySelectorAll('.btn-agregar-producto').forEach(btn => {
    btn.addEventListener('click', function() {
        const nombre = this.dataset.nombre;
        const precio = this.dataset.precio;
        const imagen = this.dataset.imagen;
        fetch('controllers/users/agregarCarrito.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `nombre=${encodeURIComponent(nombre)}&precio=${encodeURIComponent(precio)}&imagen=${encodeURIComponent(imagen)}&ajax=1`
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                mostrarToast();
            }
        });
    });
});

function mostrarToast() {
    const toast = document.getElementById('toastProductoAgregado');
    toast.style.display = 'block';
    setTimeout(() => { toast.style.display = 'none'; }, 2000);
} 