<div class="autores">
    <a name="" id="" class="btn btn-success mb-3 mt-3" href="?controlador=autor&accion=crear" role="button">Agregar Autor</a>
        <div class="card col-12 col-lg-6 m-5">

<table class="table">
    <thead>
        <tr>
            <th fs-2>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        <?php
            foreach ($autores as $autor) {
        ?>
        <tr>
            <td><?php echo $autor->id_autor; ?></td>
            <td><?php echo $autor->nombre; ?></td>
            <td><?php echo $autor->apellido; ?></td>
            <td>
                <div class="btn-group" role="group" aria-label="">
                <a href="?controlador=autor&accion=editar&id_autor=<?php echo $autor->id_autor; ?>" class="btn btn-warning ">Editar</a>
                <a href="?controlador=autor&accion=eliminar&id_autor=<?php echo $autor->id_autor; ?>" class="btn btn-danger ">Borrar</a>
                </div>
            </td>
        </tr>
        <?php
        }
        ?>

    </tbody>
</table>

</div>
</div>