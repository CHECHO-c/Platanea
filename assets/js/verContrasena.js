

const btnVerContraseña = document.querySelector("#verContraseña");
const iptContraseña = document.querySelector("#contraseña");
const iptConfirmarContraseña = document.querySelector("#confirmarContraseña");




btnVerContraseña.addEventListener('change', function() {
    iptContraseña.type = iptConfirmarContraseña.type = btnVerContraseña.checked ? 'text' : 'password';
    iptConfirmarContraseña.type = iptConfirmarContraseña.type = btnVerContraseña.checked ? 'text' : 'password';

})