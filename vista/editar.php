
<form name="cuenta_de_usuario" METHOD="POST" action="../controlador/servicio_modificar.php" class="form-signin">
    <fieldset>
        <legend>Cambiar contraseña</legend>
        <label for="usuario">Usuario</label>

        <input type="text" name="dni" id="dni"value="<?php echo  $est->getDni();?>"
               
               readonly
               />
        <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" maxlength="30"  size=30 required="required" value="<?php echo $est->getNombre();?>"/>
        <label for="apellido">Apellido: </label><input type="text" name="apellido" id="apellido" maxlength="30"  size=30 value="<?php echo $est->getApellido();?>"/>
        <label for="password">fecha: </label><input type="text" name="fecha" id="fecha" size=28 value="<?php echo $est->getNac();?>"/>
    </fieldset>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
