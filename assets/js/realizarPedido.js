const btnPedido = document.querySelector("#realizarPedido");
let lista  ="";

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