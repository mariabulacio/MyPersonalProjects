<div class="autores">
    <a name="" id="" class="btn btn-success mb-3 mt-3" href="?controlador=usuarios&accion=crear" role="button">Crear
        Usuario</a>
    <div class="card col-12 col-lg-6 m-5">
        <table class="table">
            <thead>
                <tr>
                    <th fs-2>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <th scope="row"><?php echo $usuario->id_usuario; ?></th>
                    <td><?php echo $usuario->nombre; ?></td>
                    <td><?php echo $usuario->apellido; ?></td>
                    <td><?php echo $usuario->email; ?></td>
                    <td><?php echo $usuario->telefono; ?></td>
                    <td><?php echo $usuario->rol; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            <a href="?controlador=usuarios&accion=editar&id_usuario=<?php echo $usuario->id_usuario; ?>"
                                class="btn btn-warning fs-4 " id="editar">Editar</a>
                            <a href="?controlador=usuarios&accion=eliminar&id_usuario=<?php echo $usuario->id_usuario; ?>"
                                class="btn btn-warning fs-4" id="borrar">Borrar</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>