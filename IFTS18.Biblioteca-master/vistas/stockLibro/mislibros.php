<div class="autores">
    <a name="" id="" class="btn btn-success mb-3 mt-3" href="?controlador=stocklibros&accion=crear" role="button">Agregar Libro</a>
        <div class="card col-12 col-lg-6 m-5">

<table class="table">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Editorial</th>
            <th>Genero</th>
            <th>Autor</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>

        <?php
            foreach ($misLibros as $libro) {
        ?>
            <tr>
                <td><?php echo $libro->titulo; ?></td>
                <td><?php echo $libro->ed_nombre; ?></td>
                <td><?php echo $libro->gen_nombre; ?></td>
                <td><?php echo $libro->autor; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="">
                    <a href="?controlador=libros&accion=editar&id_libro=<?php echo $libro->id_libro; ?>" class="btn btn-warning ">Editar</a>
                    <a href="?controlador=stocklibros&accion=setVendido&id_libro=<?php echo $libro->id_libro;  ?>" class="btn btn-danger ">Vendido</a>
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
