<?php
include_once '../clases/Direccionador.php';
include_once '../modelo/Estudiante.php';
include_once '../modelo/GestorEstudiantes.php';
include_once '../recursos/helper.php';

$pathMostrar = "http://localhost/estudiante/controlador/servicio_mostrar.php";
$pathNuevo = "/nuevo.php";

if ($_SERVER["REQUEST_METHOD"] != "POST")
  cargarVista($pathNuevo);
else {
  $dni = $_POST["dni"];
  $apellido = $_POST["apellido"];
  $nombre = $_POST["nombre"];
  $fecha = $_POST["fecha"];
  

  $est = new Estudiante($dni, $nombre, $apellido, $fecha);
  $gestor = new GestorEstudiantes();
  $direc = new Direccionador();

  $r=$gestor->agregarEstudiante($est);
  $direc->direccionarA($pathMostrar);
}
?>
