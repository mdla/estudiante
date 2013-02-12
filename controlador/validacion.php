<?php

$dni = $_POST["dni"];
$apellido = $_POST["apellido"];
$nombre = $_POST["nombre"];
$fecha = $_POST["fecha"];

$est = new Estudiante($dni, $nombre, $apellido, $fecha);
$validador = new ValidadorDeEstudiantes($est);
?>
