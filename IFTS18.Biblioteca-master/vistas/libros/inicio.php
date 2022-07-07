<div class="autores">
    <a name="" id="" class="btn btn-success mb-3 mt-3" href="?controlador=libros&accion=crear" role="button">Agregar Libro</a>
        <div class="card col-12 col-lg-6 m-5">

<table class="table">
    <thead>
        <tr>
            <th fs-2>ID</th>
            <th>Titulo</th>
            <th>Editorial</th>
            <th>Genero</th>
            <th>Autor</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>

        <?php
            foreach ($librosListados as $libro) {
        ?>
            <tr>
                <td><?php echo $libro->id_libro; ?></td>
                <td><?php echo $libro->titulo; ?></td>
                <td><?php echo $libro->editorial; ?></td>
                <td><?php echo $libro->genero; ?></td>
                <td><?php echo $libro->autor; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="">
                    <a href="?controlador=libros&accion=editar&id_libro=<?php echo $libro->id_libro; ?>" class="btn btn-warning ">Editar</a>
                    <a href="?controlador=libros&accion=eliminar&id_libro=<?php echo $libro->id_libro;  ?>" class="btn btn-danger ">Borrar</a>
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
