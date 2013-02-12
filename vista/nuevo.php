<article>
  <div id="error">
    <?php
    if (isset($error))
      echo $error;
    ?>
  </div>

<form name="cuenta_de_usuario" METHOD="POST" action="/estudiante/controlador/servicio_nuevo.php" class="form-signin">
    <label for="usuario">dni</label>
    <input type="text" name="dni" id="dni" value="
      <?php 
      if(isset($dni)) 
      echo $dni; 
      ?>"/>
    <label for="nombre">Nombre </label>
    <input type="text" name="nombre" id="nombre" maxlength="30"  size=30 required="required" value="<?php if(isset($nombre)) echo $nombre; ?>"/>
    <label for="apellido">Apellido </label>
    <input type="text" name="apellido" id="apellido" maxlength="30"  size=30 value="<?php if(isset($apellido)) echo $apellido; ?>"/>
    <label for="fecha">Fecha de Nacimiento </label><input type="date" name="fecha" id="fecha" size=28 value="<?php if(isset($fecha)) echo $fecha ?>"/>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

</article>
