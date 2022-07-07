<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('modelos/stockLibros.php');
include_once('conexion.php');
include_once('modelos/libros.php');
include_once('conexion.php');
include_once('modelos/autor.php');
include_once('modelos/editorial.php');
include_once('modelos/genero.php');
include_once('modelos/login.php');


class ControladorStockLibros
{

    public function inicio()
    {
        $libros = stockLibros::getLibros();
        include_once('vistas/stockLibro/inicio.php');
    }


    public function crear()
    {
        Login::isLogued();
        if ($_GET) {
            //Probando 
            $autores = Autor::getAutores();
            $editoriales = Editorial::getEditoriales();
            $generos = Genero::getGeneros();
        }

        if ($_POST) {

            $codigo = uniqid('img', true);


            $nombre_archivo_cliente = $_FILES['userfile']['name'];
            $nombre_archivo_temp = $_FILES['userfile']['tmp_name'];
            $tipo_archivo = $_FILES['userfile']['type'];
            $tamano_archivo = $_FILES['userfile']['size'];
            $nombre_img_db = $codigo . $nombre_archivo_cliente;
            $dir_subida = 'statics/img/';
            $fichero_subido = $dir_subida . basename($nombre_img_db);

            // No se puede redimensionar la imagen por que no puedo agregar la libreria php_gd2.dll al servidor wew. php.ini

            if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 10000000000))) {
                echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
            } else {
                if (move_uploaded_file($nombre_archivo_temp,   $fichero_subido)) {
                    echo "El archivo ha sido cargado correctamente.";
                } else {
                    echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                }
            }

            stockLibros::crearLibroUsuario($_POST['titulo'], $_POST['id_genero'], $_POST['id_editorial'], $_POST['id_autor'], $_SESSION['id_usuario'], $nombre_img_db);
            //print_r($_POST);
            // Corregir esto
            echo '<script> window.location="./?controlador=stocklibros&accion=inicio"</script>';
        }
        include_once('vistas/stockLibro/crear.php');
    }

    public function misLibros()
    {
        Login::isLogued();
        $misLibros = stockLibros::getMisLibros($_SESSION['id_usuario']);
        include_once('vistas/stockLibro/mislibros.php');
    }

    public function setVendido()
    {
        Login::isLogued();
        stockLibros::setVendido($_GET['id_libro']);
        echo '<script> window.location="./?controlador=stocklibros&accion=inicio"</script>';
    }
}