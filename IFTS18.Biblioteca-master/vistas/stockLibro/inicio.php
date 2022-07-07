<?php include_once('modelos/stockLibros.php'); ?>
<h2 class="p-5 mt-0 md-0 text-black justify-content-center text-center" id="titulo-libros">Nuestros Libros</h2>

<div class="card-deck container-fluid text-center justify-content-center pt-3 " id="libros-cont">
    <div class="row g-3">
        <?php
        foreach ($libros as $libro) {
        ?>
        <div class="pb-5 mb-0 col-12  col-md-6 col-lg-3">
            <img src="/statics/img/<?php echo $libro->image_name ?>" alt="tapa libro" id="book">
            <p class="p-5 mt-2 text-center fs-2"><?php echo $libro->titulo  ?></p>

            <?php if ($_SESSION) { ?>
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal<?php echo $libro->id_libro ?>">
                Consultar
            </button>
            <?php } else { ?>
            <a class="btn p-3 fs-5" href="?controlador=login&accion=inicio">Consultar</a>
            <?php } ?>
        </div>
        <!-- The Modal -->
        <div class="modal" id="modal<?php echo $libro->id_libro ?>" style="color:black; font-size:2em;">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header  d-block">
                        <h2 class="modal-title text-center" style="color:black;"><?php echo $libro->titulo ?>
                        </h2>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p style="font-size:2em;"></p>
                        <?php $vendedor = stockLibros::getVendedor($libro->id_libro) ?>
                        <h3>Contacta con el vendedor para mas información</h3>

                        <span class="fw-bold">Vendedor:</span>
                        <span><?php echo $vendedor->nombre ?> <?php echo $vendedor->apellido ?> </span> <br>
                        <span class="fw-bold">Email:</span>
                        <span><?php echo $vendedor->email ?></span> <br>
                        <span class="fw-bold">Celular:</span>
                        <span><?php echo $vendedor->telefono ?></span>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
        <?php } ?>




    </div>