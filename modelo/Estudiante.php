<?php

class Estudiante {
    private $dni;
    private $nombre;
    private $apellido;
    private $nac;

    public function __construct($dni,$nombre,$apellido,$fecha) {
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->nac=$fecha;
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
    
    
}

?>
