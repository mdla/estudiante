<?php

include_once '../clases/Direccionador.php';
include_once '../modelo/Estudiante.php';
include_once '../modelo/GestorEstudiantes.php';
include_once '../recursos/helper.php';

$path_mostrar = "../vista/mostrar.php";
$path_modificar = "/editar.php";


$gestor = new GestorEstudiantes();
echo '1';
$dir = new Direccionador();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $est = $gestor->obtenerUsuario($_GET["dni"]);

    cargarVista($path_modificar);
    echo '2';
} else {

    $est = new Estudiante($_POST["dni"], $_POST["nombre"], $_POST["apellido"], $_POST["fecha"]);
    $gestor->modificarEstudiante($est);
}
?>
