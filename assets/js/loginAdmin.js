document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('toggle-password');
    const password = document.getElementById('password');

    if (togglePassword && password) {
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle eye line
            const eyeLine = this.querySelector('.eye-line');
            if (eyeLine) {
                eyeLine.style.display = type === 'password' ? 'block' : 'none';
            }
        });
    }

    // Efecto de hover en los inputs
    const inputs = document.querySelectorAll('.input-group input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });

    // Animación del botón de login
    const loginButton = document.querySelector('.btn-login');
    if (loginButton) {
        loginButton.addEventListener('mouseover', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        loginButton.addEventListener('mouseout', function() {
            this.style.transform = 'translateY(0)';
        });
    }
});