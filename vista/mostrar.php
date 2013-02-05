<table>
    <thead>
        <tr>
          <th>Dni</th>
          <th>Nombre</th>
          <th>Apelldo</th>
          <th>Fecha Nacimiento</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($estudiantes as $est): ?>
        <tr>
            <td><?php echo $est->getDni() ?></td>
            <td><?php echo $est->getNombre() ?></td>
            <td><?php echo $est->getApellido() ?></td>
            <td><?php echo $est->getFechaNac() ?></td>
            <td>
                <a href="../controlador/servicio_borrar.php?dni=<?php echo $est->getDni();  ?>">Borrar</a>
                <a href="../controlador/servicio_modificar.php?dni=<?php echo $est->getDni();  ?>">Modificar</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
    <a href="../controlador/servicio_nuevo.php">Agregar usuario</a>
</table>