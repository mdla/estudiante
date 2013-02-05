<?php
include_once '../clases/Direccionador.php';
include_once '../modelo/Estudiante.php';
include_once '../modelo/GestorEstudiantes.php';
include_once '../recursos/helper.php';

$path_mostrar = "../vista/mostrar.php";
$gestor=new GestorEstudiantes();
$path_header="../vista/header.php";
$path_footer="../vista/footer.php";

$estudiantes=$gestor->listarEstudiantes();

include "$path_header";
include "$path_mostrar";
include "$path_footer";
?>
