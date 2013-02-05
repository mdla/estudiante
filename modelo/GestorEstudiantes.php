<?php
include_once 'Estudiante.php';

class GestorEstudiantes {
private $host; //= "localhost";
  private $pass; //= "";
  private $user; //= "root";
  private $db; //= "primera";
  private $table; //= "estudiante";
  private $pathConfiguracion = "http://localhost/estudiante/recursos/config.txt";

  public function __construct() {

    $this->cargarConfiguracion();
    //$this->imprimir();
    $con = mysql_connect($this->host, $this->user, $this->pass);

    if (!$con)
      die("no pude conectarme ---" . mysql_error());



    if (!mysql_select_db($this->db))
      die("la base no existe ----" . mysql_error());
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
      $this->asignaCampos($campos);
    }
    fclose($puntero);
  }

  private function asignaCampos($arreglo) {
    switch ($arreglo[0]) {
      case "host":
        $this->host = trim($arreglo[1]);
        break;
      case "pass":

        if (strlen(trim($arreglo[1])) != 0)
          $this->pass = trim($arreglo[1]);

        else
          $this->pass = '';
        break;
      case "user":
        $this->user = trim($arreglo[1]);
        break;
      case "db":
        $this->db = trim($arreglo[1]);
        break;
      case "table":
        $this->table = trim($arreglo[1]);
        break;
    }
  }

  public function listarEstudiantes() {
    $res = array();
    $query = mysql_query("SELECT * FROM `$this->table`");
    while ($row = mysql_fetch_object($query)):
      $res[] = new Estudiante($row->dni, $row->nombre, $row->apellido, $row->fecha);
    endwhile;
    return $res;
  }
  
  public function obtenerUsuario($id) {
    $query = mysql_query("SELECT * FROM `$this->table` WHERE `dni`='$id'");
    $res = mysql_fetch_object($query);
    return new Estudiante($res->dni,$res->nombre,$res->apellido,$res->fecha);
  }
  

  public function agregarEstudiante(Estudiante $estudiante) {
    return mysql_query("INSERT INTO `$this->table` VALUES ('$estudiante->getDni()','$estudiante->getNombre()')");
  }

  public function modificarUsuario($usuario, $pass) {
    if(mysql_query("UPDATE `$this->table` SET `pass`='$pass' WHERE  `usuario` = '$usuario'"))
    return "modificado";
    else
      return mysql_error();
  }

  public function borrarUsuario($usuario) {
    return mysql_query("DELETE FROM `$this->table` WHERE ('$usuario' = `usuario`)");
  }
}

?>
