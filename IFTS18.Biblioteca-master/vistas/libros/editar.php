
    <div class="usuarios">

<div class="card col-12 col-lg-6 m-5">
    <div class="card-header">
        Editar Libro
    </div>
    

<form action="" method="post">

        <div class="mb-3">
                <label for=id_libro"" class="form-label">ID: </label>
                <input readonly type="text" class="form-control" value="<?php echo $libro->id_libro; ?>" name="id_libro" id="id_libro" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for=titulo"" class="form-label">Titulo: </label>
                <input required type="text" class="form-control" value="<?php echo $libro->titulo; ?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder="">
            </div>

            <div class="mb-3">
                <label for="id_genero" class="form-label">Genero: </label>
                <select required class="form-select" name="id_genero" id="id_genero" class="form-select">
                    <option selected value='<?php echo $libro->id_genero; ?>'><?php echo $libro->gen_nombre; ?></option>
                    
                    <?php
                    foreach (Genero::getgeneros() as $genero) {
                        if ($genero->nombre == $libro->gen_nombre) {
                            continue;
                        }
                    ?>
                        <option value='<?php echo $genero->id_genero; ?>'><?php echo $genero->nombre; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_editorial" class="form-label">Editorial:</label>
                <select required class="form-select" name="id_editorial" id="id_editorial" class="form-select">
                    <option selected value='<?php echo $libro->id_editorial; ?>'><?php echo $libro->ed_nombre; ?></option>
                    
                    <?php
                    foreach (Editorial::getEditoriales() as $editorial) {
                        if ($editorial->nombre == $libro->ed_nombre) {
                            continue;
                        }
                    ?>
                        <option value='<?php echo $editorial->id_editorial; ?>'><?php echo $editorial->nombre; ?></option>

                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_autor" class="form-label">Autor:</label>
                <select required class="form-select" name="id_autor" id="id_autor" class="form-select">
                    <option selected value='<?php echo $libro->id_autor; ?>'><?php echo $libro->autor; ?></option>
                    <?php
                    
                    foreach (Autor::getAutores() as $autor) {
                        $autorStr = $autor->nombre.' '.$autor->apellido;
                        if ( $autorStr == $libro->autor) {
                            continue;
                        }
                    ?>
                    
                        <option value='<?php echo $autor->id_autor; ?>'><?php echo $autorStr; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <input name="" id="" class="btn btn-success" type="submit" value="Guardar Cambios">
            <a href="?controlador=libros&accion=inicio" class="btn btn-danger ">Cancelar</a>

</form>
</div>
    </div>

<script>
$(function(){

    const config = {
    search: true, // Toggle search feature. Default: false
    creatable: false, // Creatable selection. Default: false
    clearable: false, // Clearable selection. Default: false
    maxHeight: '360px', // Max height for showing scrollbar. Default: 360px
    size: '', // Can be "sm" or "lg". Default ''
}


let idselect=['#autor','#editorial','#genero'];
idselect.forEach(addSearch);

function addSearch(foobar){
    dselect(document.querySelector(foobar), config)
}

});



</script>