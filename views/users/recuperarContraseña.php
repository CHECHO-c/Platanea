<?php
require_once '../../models/MySql.php';
session_start();
$numeroFilas =0;
  if(isset($_GET['codigo'],$_GET['correo'])){

    $old = $_SESSION['old'] ?? [];
    $error = $_SESSION['error'] ?? [];

    unset($_SESSION['error'],$_SESSION['old']);
    
    $mysql = new MySQL;
    
    $codigo = $_GET['codigo'];
    $correo= $_GET['correo'];
    
    $consulta = "SELECT * FROM recuperacion where codigo='$codigo' AND correo='$correo' ";

    $mysql->conectar();
    $resultado = $mysql->ejecutarConsulta($consulta);

    $numeroFilas = mysqli_num_rows($resultado);
    //le envio por la session el valor de la query GET
    $_SESSION['cadenaQuery'] = $_SERVER['QUERY_STRING'];
    $_SESSION['correo'] = $correo;
    $mysql->desconectar();
  }
   else{
      //  header("Location: ../../index.php");
      //        exit();

      echo "No isset";
   }
  

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupera tu contraseña</title>
    <link rel="shortcut icon" href="../../assets/img/logo/favicon.svg">
        <!--<< Bootstrap min.css >>-->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"> 
        <!--<< Font Awesome.css >>-->
        <link rel="stylesheet" href="../../assets/css/font-awesome.css">
        <!--<< Animate.css >>-->
        <link rel="stylesheet" href="..../assets//css/animate.css">
        <!--<< Magnific Popup.css >>-->
        <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
        <!--<< MeanMenu.css >>-->
        <link rel="stylesheet" href="../../assets/css/meanmenu.css">
        <!--<< Swiper Bundle.css >>-->
        <link rel="stylesheet" href="../../assets/css/swiper-bundle.min.css">
        <!--<< Nice Select.css >>-->
        <link rel="stylesheet" href="../../assets/css/nice-select.css">
        <!--<< Main.css >>-->
        <link rel="stylesheet" href="../../assets/css/main.css">
        <!--<< Style.css >>-->
        <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
  <?php if($numeroFilas>0): ?>
   <!-- Sección de Formulario de Login -->
<section id="login-section" class="oxyy-login-register my-5">
  <div class="container">
    <div class="row g-0 shadow rounded overflow-hidden">
      <!-- Lado Izquierdo (Verde) -->
      <div class="col-lg-5 d-none d-lg-block" style="background-color: #2f7d1d;">
        <div class="row g-0 h-100">
          <div class="col-10 col-lg-9 d-flex flex-column mx-auto text-white">
            <h3 class="mt-5 mb-4 text-white">Recupera tu contraseña</h3>
            <p class="text-4 lh-base mb-4">Tranquilo, nosotros te ayudamos .</p>
            <div class="mt-auto mb-4">
              <img class="img-fluid w-100 w-sm-40 w-md-50" src="/assets\img\icon\recoverIcon.png" alt="Oxyy">
            </div>
          </div>
        </div>
      </div>

      <!-- Formulario -->
      <div class="col-lg-7 d-flex align-items-center bg-white">
        <div class="container my-auto py-5">
          <div class="row">
            <div class="col-11 col-lg-10 mx-auto">
              <h3 class="text-center text-4 mb-4 fw-bold text-dark">Recupera tu contraseña</h3>

              <form action="../../controllers/users/recuperarContraseña.php" method="POST">
                            <p class="text-start text-danger"> <?php echo $error['datosVacio']??''; ?></p>
                            <p class="text-start text-danger"> <?php echo $error['noCoinciden']??''; ?></p>    

                

                <div class="mb-3">
                  <input type="password" class="form-control border border-2 rounded-3 py-2 px-3 <?php echo isset($error['contrasena']) ? 'is-invalid' : ""; ?>" id="contraseña";   name="nuevaContraseña" <?php echo 'value="'. htmlspecialchars($old['nuevaContraseña']??'') .'"'; ?> required placeholder="Ingresa tu nueva contraseña">
                            <p class="text-start text-danger"> <?php echo $error['contrasena']??''; ?></p>    
                  
                </div>

                <div class="mb-3">
                  <input type="password" class="form-control border border-2 rounded-3 py-2 px-3 <?php echo isset($error['confirmarContrasena']) ? 'is-invalid' : ""; ?>" id="confirmarContraseña"  name="confirmarContraseña" <?php echo 'value="'. htmlspecialchars($old['confirmarContraseña']??'') .'"'; ?> required placeholder="Confirma tu contraseña">
                            <p class="text-start text-danger"> <?php echo $error['confirmarContrasena']??''; ?></p>    
                 
                </div>

                <div class="mb-3">
                          <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="verContraseña">
                          <label class="form-check-label" for="showPasswordCheck">
                            Mostrar contraseña
                          </label>
            </div>
                 
                </div>


                

                <div class="d-grid my-4">
                  <button class="btn text-white" style="background-color: #2f7d1d;" type="submit">Actualizar contraseña</button>
                </div>
              </form>

              
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Formulario -->
    </div>
  </div>
  
</section>

<?php else: ?>

<div class="container vh-100 d-flex justify-content-center align-items-center">
  <div class="card shadow-sm border-danger text-center p-4" style="max-width: 500px; width: 100%;">
    <div class="card-body">
      <i class="bi bi-exclamation-triangle-fill display-3 text-danger mb-3"></i>
      <h1 class="h4 fw-bold text-danger">¡El código ha expirado o no existe!</h1>
      <p class="text-muted mb-4">Intentalo nuevamente.</p>
      <a href="../../index.php" class="btn btn-danger w-100">Regresar</a>
    </div>
  </div>
</div>

<?php endif; ?>

      <!--<< All JS Plugins >>-->
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../../assets/js/jquery-3.7.1.min.js"></script>
        <!--<< Viewport Js >>-->
        <script src="../../assets/js/viewport.jquery.js"></script> 
        <!--<< Bootstrap Js >>-->
        <script src="../../assets/js/bootstrap.bundle.min.js"></script>
        <!--<< Nice Select Js >>-->
        <script src="../../assets/js/jquery.nice-select.min.js"></script>
        <!--<< Waypoints Js >>-->
        <script src="../../assets/js/jquery.waypoints.js"></script>
        <!--<< Counterup Js >>-->
        <script src="../../assets/js/jquery.counterup.min.js"></script>
        <!--<< Swiper Slider Js >>-->
        <script src="../../assets/js/swiper-bundle.min.js"></script>
        <!--<< MeanMenu Js >>-->
        <script src="../../assets/js/jquery.meanmenu.min.js"></script>
        <!--<< CountDown Js >>-->
        <script src="../../assets/js/countdowncustom.js"></script>
        <!--<< Magnific Popup Js >>-->
        <script src="../../assets/js/jquery.magnific-popup.min.js"></script>
        <!--<< GSAP Animation Js >>-->
        <script src="../../assets/js/animation.js"></script>
        <!--<< Wow Animation Js >>-->
        <script src="../../assets/js/wow.min.js"></script>
        <!--<< Main.js >>-->
        <script src="../../assets/js/main.js"></script>

        <script src="../../assets/js/verContrasena.js"></script>

</body>
</html>




