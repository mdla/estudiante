<?php
define("PATH_ERROR", "http://localhost/mvc3/formularios/error.php");


function estaAutorizado() {
    if (!key_exists("autorizado", $_SESSION) || $_SESSION["autorizado"] == FALSE) {
        return FALSE;
    } else {
        return TRUE;
    }
}
function cargarVista($path) {
    include '../vista/header.php';
    include "../vista/$path";
    include "../vista/footer.php";
    }

?>
