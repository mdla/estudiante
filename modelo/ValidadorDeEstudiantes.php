<?php

class ValidadorDeEstudiantes {

  private $est;

  public function __construct(Estudiante $estudiante) {
    $this->est = $estudiante;
  }

  public function validar() {
    $resDni = $this->comprobarDni();
    if ($resDni !== TRUE)
      return $resDni;

    if ($this->existeEstudiante())
      return "El estudiante ya existe";

    $resFecha = $this->comprobarFecha();
    if ($resFecha !== TRUE)
      return $resFecha;

    $resNombre = $this->comprobarCadena($this->getEst()->getNombre(), "Nombre");
    if ($resNombre !== TRUE)
      return $resNombre;

    $resApellido = $this->comprobarCadena($this->getEst()->getNombre(), "Apellido");
    if ($resApellido !== TRUE)
      return $resApellido;
    
    return TRUE;
  }

  private function existeEstudiante() {
    $admin = new GestorEstudiantes();
    $dni = $this->getEst()->getDni();
    $res=$admin->obtenerEstudiante($dni);
    if (empty($res))
      return FALSE;
    else
      return TRUE;
  }

  private function comprobarFecha() {
    $nacio=$this->getEst()->getFechaNac();
    if(empty($nacio))
      return "Campo de Fecha de nacimiento vacio";
    $fecha = explode("-", $nacio);
    if (checkdate($fecha[1], $fecha[2], $fecha[0]))
      return "Esa fecha no existe";
    if (is_numeric($fecha[0]) && intval($fecha) < 1900)
      return "fecha ilogica: año menor a 1900";
    //PASO LA FECHA A INTEGER PARA COMPARAR
    $hoy = intval(date("Ymd"));
    if (intval(date("Ymd", mktime(0, 0, 0, $fecha[1], $fecha[2], $fecha[0]))) > $hoy)
      return "Fecha superior a la de hoy";
    //Fin de las validaciones
    return TRUE;
  }

  private function comprobarDni() {
    $dni=$this->getEst()->getDni();
    if(empty($dni))
      return "DNI vacio";
    if (!is_numeric($dni))
      return "DNI no numerico";
    if (intval($dni) > 0)
      return "DNI negativo";
    return TRUE;
  }

  private function comprobarCadena($cadena, $campo) {
    if (strlen($cadena) == 0)
      return "Campo vacio";
    //Vefico que no haya caracteres extraños
    $pattern = '/[^a-zñÑ\s]/i';
    if (preg_match_all($pattern, $cadena) > 0)
      return "Caracteres ilegales en el $campo";
    if (strlen($cadena) <= 30)
      return "Superado el maximo permitido de caracteres en el campo: $campo ";
    return TRUE;
  }

  private function getEst() {
    return $this->est;
  }

}

?>
