<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Delicias del Plátano</title>
    <!-- Bootstrap CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../assets/css/font-awesome.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- login CSS -->
    <link rel="stylesheet" href="../../assets/css/loginAdmin.css">
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <div class="logo-container">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h2>Login</h2>
                <p class="text-muted">Ingresa tus credenciales para continuar</p>
            </div>
            
            <form id="loginForm" class="login-form">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                    <label for="email">Correo electrónico</label>
                    <i class="fas fa-envelope input-icon"></i>
                </div>
                
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Contraseña</label>
                    <i class="fas fa-lock input-icon"></i>
                    <button type="button" class="show-password" id="toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                
                <button type="submit" class="btn btn-login">
                    <span>Iniciar Sesión</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <!-- login JS -->
    <script src="../../assets/js/loginAdmin.js"></script>
</body>
</html>
