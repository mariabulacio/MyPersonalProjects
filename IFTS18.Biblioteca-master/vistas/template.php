<!doctype html>
<html lang="es">

<head>
    <title>Biblio</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Popper Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <!-- https://github.com/jarstone/dselect -->
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <!-- <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script> -->
    <script src="/statics/scripts/dselect.js"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/5c5038153c.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@1&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="/statics/css/stylecss.css">
</head>

<body>

    <nav class="navbar sticky-top navbar-expand-lg navbar-collapse navbar-dark p-0">

        <a class="navbar-brand pb-0 pt-0" href="/index.php">
            <img src="/statics/img/logo.jpeg" alt="" width="100" height="auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="/index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="?controlador=stocklibros&accion=inicio">Libros</a>
                </li>
                <?php if (isset($_SESSION['rol'])) {
                    if ($_SESSION['rol'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown">Administrador</a>
                    <ul class="dropdown-menu" style="font-size:1em ;padding-left: 0em !; ">
                        <li><a class="dropdown-item" href="?controlador=autor&accion=inicio">Autores</a></li>
                        <li><a class="dropdown-item" href="?controlador=editorial&accion=inicio">Editoriales</a></li>
                        <li><a class="dropdown-item" href="?controlador=generos&accion=inicio">Generos</a></li>
                        <li><a class="dropdown-item" href="?controlador=usuarios&accion=inicio">Usuarios</a></li>
                        <li><a class="dropdown-item" href="?controlador=libros&accion=inicio">Libros</a></li>
                    </ul>
                </li>
                <?php } elseif ($_SESSION['rol'] == 2) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Menu</a>
                    <ul class="dropdown-menu" style="font-size:1em ;padding-left: 0em !; ">
                        <li><a class="dropdown-item" href="?controlador=stocklibros&accion=mislibros">Mis Libros</a>
                        </li>
                        <li><a class="dropdown-item" href="?controlador=usuarios&accion=editarCommonUser">Mi
                                Perfil</a>
                        </li>
                    </ul>
                </li>
                <?php }
                } else { ?>
                <li class="nav-item">
                    <a class="nav-link active" href="?controlador=welcome&accion=contacto">Contacto</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <?php if ($_SESSION) { ?>

                    <div class=" row">
                        <div class="d-flex justify-content-center">
                            <span class="text-white nav-link active">Bienvenido
                                <?php echo ucfirst($_SESSION['nombre']) ?><br /></span>
                            <a class="text-white nav-link active" href="?controlador=login&accion=logout"><i
                                    class="fas fa-door-open"></i></a>
                        </div>
                    </div>

                    <?php } else { ?>
                    <a class="text-white nav-link active" href="?controlador=login&accion=inicio"><i
                            class="fas fa-door-closed"></i>Login</a>
                    <?php } ?>
                </li>

            </ul>
        </div>
        </div>

    </nav>

    <!-- sidebar -->



    <div class="container-flex">
        <div class="row">
            <div class="col-12">
                <?php include_once("ruteador.php") ?>
            </div>

        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <footer class="container-fluid mb-0 site-footer text-white text-center">
        <br><br>
        <h4 class="pb-2 mb-1 pt-3" id="dire">Copyright © 2021 Biblio. Todos los derechos reservados</h4>
    </footer>
</body>

</html>

<!-- <script>
$(function(){



let idselect=['#id_autor','#id_editorial','#id_genero'];
idselect.forEach(addSearch);

function addSearch(foobar){
    dselect(document.querySelector(foobar), config)
}






});



</script> -->