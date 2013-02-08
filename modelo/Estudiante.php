<?php

class Estudiante {

    private $dni;
    private $nombre;
    private $apellido;
    private $nac;

    public function __construct($dni = "", $nombre = "", $apellido = "", $fecha = "") {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nac = $fecha;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getFechaNac() {
        return $this->nac;
    }

    public function getEdad() {
        $hoy = time();
        $f = explode("-", trim($this->getFechaNac()));
        $nacimiento = mktime(0, 0, 0, $f[1], $f[2], $f[0]);
        $edad = $hoy - $nacimiento;
        return floor($edad / 60 / 60 / 24 / 365);
//        $hoy = time();
//        $fechaUnix = mktime(0, 0, 0, 0, 0, 0);
//        $aux = explode("-", $this->getFechaNac());
//        $cumple = mktime(0, 0, 0, $aux[1], $aux[2], $aux[0]);
//        if ($cumple < 0) {
//            $hoy+=$cumple * (-1);
//            return date("Y", ($hoy - $fechaUnix));
//        }
//        return date("Y", ($hoy - $cumple));
    }

}

?>
