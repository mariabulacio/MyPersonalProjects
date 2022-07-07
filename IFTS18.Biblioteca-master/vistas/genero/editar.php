
    <div class="usuarios">

<div class="card col-12 col-lg-6 m-5">
    <div class="card-header">
        Editar Genero
    </div>
    
    <div class="card-body">

        <form action="" method="post">

        <div class="mb-3">
                <label for="id_autor"" class="form-label">ID: </label>
                <input  readonly type="text" class="form-control" value="<?php echo $autor->id_autor?>" name="id_autor" id="id_autor" aria-describedby="helpId" placeholder="">
        </div>

        <div class="mb-3">
                <label for="nombre" class="form-label">Nombre: </label>
                <input required type="text" class="form-control" value="<?php echo $autor->nombre?>" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">
        </div>


        <input name="" id="" class="btn btn-warning" type="submit" value="Guardar Cambio">
        </form>

    </div>

</div>