<?php

include_once('modelos/libros.php');
include_once('conexion.php');
include_once('modelos/autor.php');
include_once('modelos/editorial.php');
include_once('modelos/genero.php');
include_once('modelos/login.php');

BD::crearInstancia();

class ControladorLibros
{

    public function inicio()
    {

        Login::isAdmin();
        $librosListados = Libros::ListarLibros();
        include_once("vistas/libros/inicio.php");
    }

    public function crear()
    {


        Login::isAdmin();
        if ($_GET) {
            //Probando 
            $autores = Autor::getAutores();
            $editoriales = Editorial::getEditoriales();
            $generos = Genero::getGeneros();
        }
        if ($_POST) {


            //create random unique gui
            $codigo = uniqid('img', true);


            $nombre_archivo_cliente = $_FILES['userfile']['name'];
            $nombre_archivo_temp = $_FILES['userfile']['tmp_name'];
            $tipo_archivo = $_FILES['userfile']['type'];
            $tamano_archivo = $_FILES['userfile']['size'];
            $nombre_img_db = $codigo . $nombre_archivo_cliente;
            $dir_subida = 'statics/img/';
            $fichero_subido = $dir_subida . basename($nombre_img_db);


            if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 10000000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
            } else {
                if (move_uploaded_file($nombre_archivo_temp,   $fichero_subido)) {
                    echo "El archivo ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }

            Libros::crearLibro($_POST['titulo'], $_POST['id_genero'], $_POST['id_editorial'], $_POST['id_autor'], $nombre_img_db);
            echo '<script> window.location="./?controlador=libros&accion=inicio"</script>';
        }

        include_once("vistas/libros/crear.php");
    }

    public function buscar()
    {

        $libro = Libros::buscarLibro($_GET['id_libro']);
        include_once("vistas/libros/editar.php");
    }

    public function editar()
    {

        Login::isAdmin();

        if ($_GET) {
            $libro = libros::buscarLibro($_GET['id_libro']);
            include_once("vistas/libros/editar.php");
        }

        if ($_POST) {
            Libros::editarLibro($_POST['id_libro'], $_POST['titulo'], $_POST['id_genero'], $_POST['id_editorial'], $_POST['id_autor']);
            echo '<script> window.location="./?controlador=libros&accion=inicio"</script>';
        }
    }



    public function eliminar()
    {
        if ($_GET) {
            print_r($_GET);
            Libros::eliminarLibro($_GET['id_libro']);
            echo '<script> window.location="./?controlador=libros&accion=inicio"</script>';
        }
    }
}