<?php
session_start();
$usuarios = ctrUsuarios::ctrMostrarUsuarios();

$roles = ctrRoles::ctrMostrarRoles2();




if (isset($_SESSION["idBackend"])) {


  $admin = ctrUsuarios::ctrMostrarUsuarios1("id_usuario", $_SESSION["idBackend"]);


}




?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Platanea Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/recursos/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/recursos/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/recursos/bower_components/Ionicons/css/ionicons.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/recursos/bower_components/DataTables/datatables.min.css">


  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/recursos/dist/css/AdminLTE.min.css">

  <!-- Components -->
  <link rel="stylesheet" href="vistas/css/modalDesign.css">
  <link rel="stylesheet" href="vistas/css/tableDesign.css">
  <link rel="stylesheet" href="vistas/css/loginDesign.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="vistas/recursos/dist/css/skins/_all-skins.min.css">

  <script src="vistas/js/sweetalert2.all.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<?php if (!isset($_SESSION["validarSession"])):

  include "paginas/login.php";
?>
<?php
else:
  ?>

  <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">


      <?php include "modulos/header.php" ?>
      <!-- =============================================== -->



      <?php include "modulos/menu.php" ?>
      <!-- =============================================== -->


      <?php
      if (isset($_GET["pagina"])) {

        if (
          $_GET["pagina"] == "usuarios" ||
          $_GET["pagina"] == "roles" ||
          $_GET["pagina"] == "productos" ||
          $_GET["pagina"] == "pedidos" ||
          $_GET["pagina"] == "salir"
        ) {

          include "paginas/" . $_GET["pagina"] . ".php";

        }

      }

      ?>


      <?php include "modulos/footer.php" ?>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="vistas/recursos/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/recursos/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- DataTables -->
    <script src="vistas/recursos/bower_components/DataTables/datatables.min.js"></script>
    <!-- SlimScroll -->
    <script src="vistas/recursos/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="vistas/recursos/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/recursos/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="vistas/recursos/dist/js/demo.js"></script>


    <script src="vistas/js/usuarios.js"></script>
    <script src="vistas/js/roles.js"></script>
    <script src="vistas/js/productos.js"></script>
    <script>
      $(document).ready(function () {
        $('.sidebar-menu').tree()
      })
    </script>
  </body>
  <?php
endif;
?>

</html>