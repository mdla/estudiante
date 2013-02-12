<?php
include_once '../clases/Direccionador.php';
include_once '../modelo/Estudiante.php';
include_once '../modelo/GestorEstudiantes.php';
require_once '../recursos/helper.php';
include_once '../modelo/ValidadorDeEstudiantes.php';

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
  $validador= new ValidadorDeEstudiantes($est);
  
  //Si hay error muestra la vista de nuevo
  if ($validador->validar() !== TRUE){
    cargarVista($pathNuevo);
  }
    
  //Datos validos y realizao el alta
  $gestor = new GestorEstudiantes();
  $direc = new Direccionador();

  $gestor->agregarEstudiante($est);
  $direc->direccionarA($pathMostrar);
}
?>
