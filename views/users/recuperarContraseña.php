<?php
require_once '../../models/MySql.php';

  if(isset($_GET['codigo'],$_GET['correo'])){
    
    $mysql = new MySQL;
    
    $codigo = $_GET['codigo'];
    $correo= $_GET['correo'];
    
    $consulta = "SELECT * FROM recuperacion where codigo='$codigo' AND correo='$correo' ";

    $mysql->conectar();
    $resultado = $mysql->ejecutarConsulta($consulta);

    $numeroFilas = mysqli_num_rows($resultado);

  
    $mysql->desconectar();
  }
   else{
      //  header("Location: ../../index.php");
      //        exit();

      echo "No isset";
   }
  

?>


<?php if($numeroFilas>0): ?>
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
              <img class="img-fluid w-100 w-sm-40 w-md-50" src="/assets/img/shape/loginPlatano.webp" alt="Oxyy">
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

              <form action="controllers/users/login.php" method="POST">
                

                <div class="mb-3">
                  <input type="email" class="form-control border border-2 rounded-3 py-2 px-3"    name="nuevaContraseña" required placeholder="Ingresa tu nueva contraseña">
                  
                </div>

                <div class="mb-3">
                  <input type="password" class="form-control border border-2 rounded-3 py-2 px-3" id="loginPassword"  name="confirmarContraseña" required placeholder="Confirma tu contraseña">
                 
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
</body>
</html>
<?php else: ?>
  <h1>El codigo de recuperacion ha expirado o no existe</h1>
<?php endif; ?>



