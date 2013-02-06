<article>

<form name="cuenta_de_usuario" METHOD="POST" action="/estudiante/controlador/servicio_nuevo.php" class="form-signin">
    <label for="usuario">dni</label>
    <input type="text" name="dni" id="dni" />
    <label for="nombre">Nombre </label>
    <input type="text" name="nombre" id="nombre" maxlength="30"  size=30 required="required" />
    <label for="apellido">Apellido </label>
    <input type="text" name="apellido" id="apellido" maxlength="30"  size=30 />
    <label for="fecha">Fecha de Nacimiento </label><input type="date" name="fecha" id="fecha" size=28 />

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

</article>
