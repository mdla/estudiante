<?php

include_once '../clases/Direccionador.php';
include_once '../modelo/Estudiante.php';
include_once '../modelo/GestorEstudiantes.php';
include_once '../recursos/helper.php';

$path_modificar = "/editar.php";
$pathMostrar = "http://localhost/estudiante/controlador/servicio_mostrar.php";


$gestor = new GestorEstudiantes();
$dir = new Direccionador();
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    cargarVista($path_modificar);
} else {
    $est = new Estudiante($_POST["dni"], $_POST["nombre"], $_POST["apellido"], $_POST["fecha"]);
    $gestor->modificarEstudiante($est);
    $dir->direccionarA($pathMostrar);
}
?>
