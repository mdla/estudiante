<article class="row-fluid">
  <div id="error">
    <?php
    if (isset($error))
      echo $error;
    ?>
  </div>

  <form name="cuenta_de_usuario" METHOD="POST" action="/estudiante/controlador/servicio_nuevo.php" class="form-signin form-horizontal span4">
    <label for="usuario">DNI</label>
    <input type="text" name="dni" id="dni" value="<?php if (isset($dni)) echo $dni; else echo ''; ?>"/>
    <label for="nombre">Nombre </label>
    <input type="text" name="nombre" id="nombre" maxlength="30"  size=30 required="required" value="<?php if (isset($nombre)) echo $nombre; ?>"/>
    <label for="apellido">Apellido </label>
    <input type="text" name="apellido" id="apellido" maxlength="30"  size=30 value="<?php if (isset($apellido)) echo $apellido; ?>"/>
    <label for="fecha">Fecha de Nacimiento </label><input type="text" name="fecha" id="datepicker" size=28 value="<?php if (isset($fecha)) echo $fecha; else echo ''; ?>"/>
    <br /> 
    <br /> 
    <button type="submit" class="btn btn-primary" >Enviar</button>    
  </form>

</article>
