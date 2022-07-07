<div class="login">
    <div class="d-flex justify-content-center align-items-center vh-100">

        <?php if (!$_SESSION) { ?>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center vh-100">
                <div class="col-md-6">
                    <div class="login-form bg-light mt-4 p-4" style="    border-radius: 0.5em;
                    background-color: #d3dd69 !important;">
                        <form action="" method="post" class="row g-3">
                            <div style="    text-align: center;">
                                <h4 style="font-family:'Libre Baskerville', serif; font-size:0.9em; fo">BIENVENIDO A
                                    BIBLIO</h4>
                            </div>

                            <div class="col-12">
                                <label style="font-size:0.8em;">Usuario</label>
                                <input type="email" name="user" class="form-control" placeholder="Usuario">
                            </div>
                            <div class="col-12">
                                <label style="font-size:0.8em;">Contraseña</label>
                                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                            </div>
                            <!-- <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe"> Recordar</label>
                                </div>
                            </div> -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark float-end">Aceptar</button>
                            </div>
                        </form>
                        <hr class="mt-4">
                        <div class="col-12">
                            <p class="text-center mb-0" style="font-size:2em;">Todavía no tenes una cuenta? <a
                                    href="?controlador=login&accion=registro">Resgistrate</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php } else {
            header("Location: index.php");
        } ?>