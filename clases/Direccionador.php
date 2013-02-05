<?php

class Direccionador {

	
public function URIBase() { 
$host = $_SERVER['HTTP_HOST']; 
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); 
return "http://" . $host . $uri . "/"; 
} 
//$pagina = "ver_polizas.php"; 
//header("Location: ".URIbase().$pagina); 
 

	public function direccionarA($unPath){
		header("Location: ".$unPath); 
	}
}

?>