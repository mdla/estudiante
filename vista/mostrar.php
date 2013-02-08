<article class="span8">
  <table class="table table-hover">
    <thead>
        <tr>
          <th>Dni</th>
          <th>Nombre</th>
          <th>Apelldo</th>
          <th>Fecha Nacimiento</th>
          <th>Edad</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (listarEstudiantes() as $est): ?>
        <tr>
            <td><?php echo $est->getDni() ?></td>
            <td><?php echo $est->getNombre() ?></td>
            <td><?php echo $est->getApellido() ?></td>
            <td><?php echo $est->getFechaNac() ?></td>
            <td><?php echo $est->getEdad() ?></td>
            <td>
              <a href="/estudiante/controlador/servicio_borrar.php?dni=<?php echo $est->getDni();  ?>">Borrar</a>
                <a href="/estudiante/controlador/servicio_modificar.php?dni=<?php echo $est->getDni();  ?>">Modificar</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
    
</table>
  
</article>
<aside class="span2">
  <a href="/estudiante/controlador/servicio_nuevo.php" class="">Agregar usuario</a>
</aside>