<?php

include_once 'Estudiante.php';

class GestorEstudiantes {

  private $pathConfiguracion = "http://localhost/estudiante/recursos/config.txt";
  private $conexion;
  private $conf = array();

  public function __construct() {
    $this->cargarConfiguracion();
    $dns = "mysql:host=" . $this->getHost() . ";dbname=" . $this->getDb();
    try {
      $this->setConexion(new PDO($dns, $this->getUser(), $this->getPass()));
      $con = new PDO($dns, $this->getUser(), $this->getPass());
      $r = $con->prepare($dns);
      //$r->bindValue($r, $con, $data_type)
//      $r->execute($input_parameters);
//      $r->errorInfo()
    } catch (PDOException $e) {
      echo "Ocurrio este error al conectarse la base de datos -> " . $e->getMessage();
      die();
    }
  }
  

//  private function imprimir() {
//    echo $this->host . "<br />";
//    var_dump($this->pass);
//    echo "<br />";
//    echo $this->user . "<br />";
//    echo $this->table . "<br />";
//    echo $this->db . "<br />";
//  }

  private function getConexion() {
    return $this->conexion;
  }

  private function getHost() {
    return $this->conf["host"];
  }

  private function getPass() {
    return $this->conf["pass"];
  }

  private function getUser() {
    return $this->conf["user"];
  }

  private function getDb() {
    return $this->conf["db"];
  }

  private function getTable() {
    return $this->conf["table"];
  }

  private function getPathConfiguracion() {
    return $this->pathConfiguracion;
  }

  private function setConexion($conexion) {
    $this->conexion = $conexion;
  }

  private function imprimir() {
    echo $this->host . "<br />";
    var_dump($this->pass);
    echo "<br />";
    echo $this->user . "<br />";
    echo $this->table . "<br />";
    echo $this->db . "<br />";
  }

  private function cargarConfiguracion() {
    $puntero = fopen($this->pathConfiguracion, "r");
    while (!feof($puntero)) {
      $campos = explode("=", fgets($puntero));
      $this->conf[$campos[0]] = (isset($campos[1])) ? trim($campos[1]) : "";
    }
    fclose($puntero);
  }

  public function listarEstudiantes() {
    $res = array();
    $recurso = $this->getConexion()->prepare('SELECT * FROM ' . $this->getTable());
    if (!$recurso->execute()) {
      echo "NO SE PUDO REALIZAR LA CONSULTA :" . errorInfo()[2];
      die();
    }
    foreach ($recurso->fetchAll(PDO::FETCH_OBJ) as $row) {
      $res[] = new Estudiante($row->dni, $row->nombre, $row->apellido, $row->fecha);
    }
    return $res;
  }

  public function obtenerEstudiante($dni) {
    $recurso = $this->getConexion()->prepare("SELECT * FROM " . $this->getTable() . " WHERE `dni` = :dni");
    $datos = array(
        "dni" => $dni
    );
    $recurso->execute($datos);
    $res = $recurso->fetch(PDO::FETCH_OBJ);
    return new Estudiante($res->dni, $res->nombre, $res->apellido, $res->fecha);
  }

  public function agregarEstudiante(Estudiante $estudiante) {
    $recurso = $this->getConexion()->prepare("INSERT INTO `" . $this->getTable() . "` VALUES (:dni, :nombre, :apellido, :fecha)");
    $datos = array(
        "dni" => $estudiante->getDni(),
        "nombre" => $estudiante->getNombre(),
        "apellido" => $estudiante->getApellido(),
        "fecha" => $estudiante->getFechaNac(),
    );
    $recurso->execute($datos);
    return ($recurso->rowCount() == 1) ? TRUE : FALSE;
  }

  public function modificarEstudiante(Estudiante $estudiante) {
    $recurso = $this->getConexion()->prepare("UPDATE `" . $this->getTable() . "` SET `nombre` = :nombre , `apellido` = :apellido , `fecha` =:fecha WHERE `dni` = :dni");
    $datos = array(
        "nombre" => $estudiante->getNombre(),
        "apellido" => $estudiante->getApellido(),
        "fecha" => $estudiante->getFechaNac(),
        "dni" => $estudiante->getDni()
    );
    $recurso->execute($datos);
    return ($recurso->rowCount()==1)?TRUE:FALSE;
  }

  public function borrarEstudiante($dni) {
    $recurso = $this->getConexion()->prepare("DELETE FROM `" . $this->getTable() . "` WHERE (usuario  = :dni)");
    $datos = array(
        "dni" => $dni
    );
    $recurso->execute($datos);
    return ($recurso->rowCount() == 1) ? TRUE : FALSE;
  }

}

?>
