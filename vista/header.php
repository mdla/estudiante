<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link  rel="stylesheet" type="text/css" href="/estudiante/vista/bootstrap/css/bootstrap.css"/>
    <link href="http://localhost/estudiante/vista/css/ui-lightness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
    <script src="http://localhost/estudiante/vista/js/jquery-1.9.0.js"></script>
    <script src="http://localhost/estudiante/vista/js/jquery-ui-1.10.0.custom.js"></script>
    <script>
      $(document).ready(function(){
          
        $("#datepicker").datepicker( {
          dateFormat: "yy-mm-dd",
          minDate:"-80Y",
          maxDate:0,
          changeMonth: true,
          changeYear: true});
      });
      
  
    </script>
    <title></title>
  </head>
  <body>
    <section id="contenedor" class="container-fluid">
      <header class="hero-unit">
        <hgroup>
          <h1>Estudiante</h1>
        </hgroup>
      </header>
