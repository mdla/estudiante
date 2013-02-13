<?php

include_once '../clases/Direccionador.php';
include_once '../modelo/Estudiante.php';
include_once '../modelo/GestorEstudiantes.php';
require_once '../recursos/helper.php';
include_once '../modelo/ValidadorDeEstudiantes.php';

function mostrarError() {
  
}

$pathMostrar = "http://localhost/estudiante/controlador/servicio_mostrar.php";
$pathNuevo = "/nuevo.php";





if ($_SERVER["REQUEST_METHOD"] != "POST")
  cargarVista($pathNuevo);
else {
  $dni = trim($_POST["dni"]);
  $apellido = ucwords(trim($_POST["apellido"]));
  $nombre = ucwords(trim($_POST["nombre"]));
  $fecha = trim($_POST["fecha"]);
//  $dni = "23233232";
//  $apellido = "luna ayala";
//  $nombre = "pablo";
//  $fecha = "2013-02-04";
  $est = new Estudiante($dni, $nombre, $apellido, $fecha);
  $validador = new ValidadorDeEstudiantes($est);
  $validacion = $validador->validar();
  //Si hay un mensaje de error muestra la vista de nuevo
  if (is_string($validacion)) {
//    var_dump($validador->validar());
    $error = $validacion;
    ob_start();
    include '../vista/header.php';
    include "../vista/nuevo.php";
    include "../vista/footer.php";
    ob_get_flush();
  } else {
    //Datos validos y realizao el alta
    $gestor = new GestorEstudiantes();
    $direc = new Direccionador();

    $gestor->agregarEstudiante($est);
    $direc->direccionarA($pathMostrar);
  }
}
?>
