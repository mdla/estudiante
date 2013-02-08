<?php

class ValidadorDeEstudiantes {

    private $estado = TRUE;
    private $error = "";
    private $est;

    public function __construct(Estudiante $estudiante) {
        $this->est = $estudiante;
    }

    public function existeEstudiante(Estudiante $estudiante) {
        
    }

    public function comprobarFecha() {
        //RANGO DE FECHA MAXIMAS
        // AÑO = ACTUAL
        // MES = 12
        // DIA =31
        $rangos = array(intval(date("Y")), 12, 31);

        $fecha = explode("-", $this->getEst()->getFechaNac();
        
        foreach (explode("-", $fecha) as $key => $value) {
            if (is_numeric($value) && intval($value) > 0):

            endif;
        }
    }

    public function getEst() {
        return $this->est;
    }

}

?>
