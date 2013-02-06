
<form name="cuenta_de_usuario" METHOD="POST" action="/estudiante/controlador/servicio_modificar.php" class="form-signin">
  <?php
    if (isset($_GET["dni"])) 
      $est=obtenerEstudiante($_GET["dni"]);
    else
      $est = new Estudiante(); //estudiante sin valores
  ?>
  <fieldset>
    <legend>Cambiar contraseña</legend>
    <label for="usuario">Usuario</label>

    <input type="text" name="dni" id="dni" value="<?php echo $est->getDni(); ?>"/>
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre" maxlength="30"  size=30 required="required" value="<?php echo $est->getNombre(); ?>"/>
    <label for="apellido">Apellido: </label>
    <input type="text" name="apellido" id="apellido" maxlength="30"  size=30 value="<?php echo $est->getApellido(); ?>"/>
    <label for="fecha">fecha: </label><input type="date" name="fecha" id="fecha" size=28 value="<?php echo $est->getFechaNac(); ?>"/>
  </fieldset>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
