document.querySelectorAll('.cantidad-input').forEach(input => {
    input.addEventListener('change', function() {
        let cantidad = parseInt(this.value);
        let indice = this.dataset.indice;
        if (isNaN(cantidad) || cantidad < 1) {
            cantidad = 1;
            this.value = 1;
        }
        fetch('../../controllers/users/actualizarCarrito.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `accion=actualizar&indice=${indice}&cantidad=${cantidad}`
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                if (data.carrito.length === 0) {
                    location.reload();
                    return;
                }
                data.carrito.forEach((producto, i) => {
                    let fila = document.querySelector(`tr[data-indice='${i}']`);
                    if (fila) {
                        fila.querySelector('.cantidad-input').value = producto.cantidad;
                        fila.querySelector('.subtotal').textContent = '$' + Number(producto.precio * producto.cantidad).toLocaleString('es-CO');
                    }
                });
                document.getElementById('subTotal').textContent = '$' + Number(data.total).toLocaleString('es-CO');
                document.getElementById('total').textContent = '$' + Number(data.total).toLocaleString('es-CO');
         

            }
        });
    });
});




document.querySelectorAll('.btn-eliminar').forEach(btn => {
    btn.onclick = function() {
        let indice = this.dataset.indice;
        fetch('../../controllers/users/actualizarCarrito.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `accion=eliminar&indice=${indice}`
        }).then(r => r.json()).then(data => location.reload());
    }
}); 