<!DOCTYPE html>
<?php ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link  rel="stylesheet" type="text/css" href="/estudiante/vista/bootstrap/css/bootstrap.css"/>
        <title></title>
    </head>
    <body>
        <section id="contenedor" class="container-fluid">
            <header class="hero-unit">
                <hgroup>
                    <h1>Estudiante</h1>
                </hgroup>
            </header>

            <article class="span8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Dni</th>
                            <th>Nombre</th>
                            <th>Apelldo</th>
                            <th>Fecha Nacimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (listarEstudiantes() as $est): ?>
                            <tr>
                                <td><?php echo $est->getDni() ?></td>
                                <td><?php echo $est->getNombre() ?></td>
                                <td><?php echo $est->getApellido() ?></td>
                                <td><?php echo $est->getFechaNac() ?></td>
                                <td>
                                    <a href="/estudiante/controlador/servicio_borrar.php?dni=<?php echo $est->getDni(); ?>">Borrar</a>
                                    <a href="/estudiante/controlador/servicio_modificar.php?dni=<?php echo $est->getDni(); ?>">Modificar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

            </article>
            <aside class="span2">
                <a href="/estudiante/controlador/servicio_nuevo.php" class="">Agregar usuario</a>
            </aside>
        </section>

        <footer>

        </footer>
</html>

