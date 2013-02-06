<?php

include_once '../clases/Direccionador.php';
include_once '../modelo/Estudiante.php';
include_once '../modelo/GestorEstudiantes.php';
include_once '../recursos/helper.php';

$pathMostrar = "http://localhost/estudiante/controlador/servicio_mostrar.php";

$gestor = new GestorEstudiantes();
$dir=new Direccionador();

$gestor->borrarEstudiante($_GET["dni"]);
$dir->direccionarA($pathMostrar);
?>
