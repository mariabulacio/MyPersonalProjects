<div class="autores">
    <a name="" id="" class="btn btn-success mb-3 mt-3" href="?controlador=editorial&accion=crear" role="button">Agregar Editorial</a>
        <div class="card col-12 col-lg-6 m-5">
<table class="table">
    <thead>
        <tr>
            <th fs-2>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        <?php
            $cantidad = count($editoriales);
            // print_r($cantidad);
                foreach ($editoriales as $editorial) {
        ?>
            <tr>
                <td><?php echo $editorial->id_editorial; ?></td>
                <td><?php echo $editorial->nombre; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="">
                    <a  href="?controlador=editorial&accion=editar&id_editorial=<?php echo $editorial->id_editorial; ?>" class="btn btn-warning ">Editar</a>
                    <a  href="?controlador=editorial&accion=eliminar&id_editorial=<?php echo $editorial->id_editorial;  ?>" class="btn btn-danger ">Borrar</a>
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