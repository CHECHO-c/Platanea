const btnPedido = document.querySelector("#realizarPedido");
let lista  ="";

document.querySelectorAll('.cantidad-input').forEach(input => {
    input.addEventListener('change', function () {
        const cantidad = parseInt(this.value);
        const fila = this.closest('tr');
        const precioText = fila.querySelector('td:nth-child(2)').textContent.trim(); // Ej: "$20.000"
        const precio = parseInt(precioText.replace(/\./g, '').replace('$', ''));
        const nuevoSubtotal = cantidad * precio;

        // Actualizar el td del subtotal
        const tdSubtotal = fila.querySelector('.subtotal');
        tdSubtotal.textContent = '$' + nuevoSubtotal.toLocaleString('es-CO'); // Actualizar texto visible
        tdSubtotal.setAttribute('data-valor', nuevoSubtotal); // Actualizar el atributo data-valor
    });
});

function actualizarTotal() {
    let total = 0;
    document.querySelectorAll('.subtotal').forEach(td => {
        const valor = parseInt(td.getAttribute('data-valor').replace(/\./g, ''));
        if (!isNaN(valor)) {
            total += valor;
        }
    });

    const totalSpan = document.getElementById('total');
    totalSpan.textContent = '$' + total.toLocaleString('es-CO');
    totalSpan.setAttribute('data-total', total);
}

document.querySelectorAll('.cantidad-input').forEach(input => {
    input.addEventListener('change', function () {
        const cantidad = parseInt(this.value);
        const fila = this.closest('tr');
        const precioText = fila.querySelector('td:nth-child(2)').textContent.trim();
        const precio = parseInt(precioText.replace(/\./g, '').replace('$', ''));
        const nuevoSubtotal = cantidad * precio;

        const tdSubtotal = fila.querySelector('.subtotal');
        tdSubtotal.textContent = '$' + nuevoSubtotal.toLocaleString('es-CO');
        tdSubtotal.setAttribute('data-valor', nuevoSubtotal);

        // 🔄 Actualizar total general
        actualizarTotal();
    });
});

let filas = document.querySelectorAll("#tablaProductos  tbody tr");
btnPedido.addEventListener("click",()=>{

  filas.forEach(fila =>{
    let celda = fila.querySelectorAll("td");
        let i = 0;
        let sobrenombre = "";
        let saltoN ="";
    celda.forEach(dato => {
        
        if(dato.hasAttribute("data-valor")){
            if(i==3){
                i=0;
            }
             if(i==2){
                sobrenombre="Subtotal: ";
                saltoN ="\n\n";
            }
             if(i==1){
                sobrenombre=" X ";
                saltoN ="\n";
            }
             if(i==0){
                sobrenombre="Producto: ";
                saltoN ="";
            }

             lista += sobrenombre + dato.dataset.valor + saltoN;

             i++;
        }
        
    });
  })
    
  let nombre = document.querySelector("#nombreUsuario").dataset.nombre;
  let total = document.querySelector("#total").dataset.total;
  let mensaje = `Hola mi nombre es ${nombre} quiero solicitar los siguientes productos \n\n${lista} \n*TOTAL* \n${total} COP `;
  let url = `https://wa.me/573226479250?text=${encodeURIComponent(mensaje)}`;
   
            

            fetch("../../controllers/vaciarCarrito.php")
            .then(res => res.text())
            .then(data => {
                if (data === "ok") {
                
    
                }
            });

            
            setTimeout(() => {
            window.location.href = "../../index.php";
            }, 1000);
      

  window.open(url,"_blank");



});