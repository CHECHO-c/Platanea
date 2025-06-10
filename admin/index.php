<?php

//Controladores
include "controlador/plantilla.controlador.php";
include "controlador/usuarios.controlador.php";
include "controlador/roles.controlador.php";
include "controlador/productos.controlador.php";
include "controlador/pedidos.controlador.php";


//Modelos
include "modelo/usuarios.modelo.php";
include "modelo/roles.modelo.php";
include "modelo/productos.modelo.php";
include "modelo/pedidos.modelo.php";
//Iniciar Vista
$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();

?>