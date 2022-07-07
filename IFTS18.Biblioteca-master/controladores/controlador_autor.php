<?php

include_once("modelos/autor.php");
include_once("conexion.php");
include_once('modelos/login.php');
BD::crearInstancia();

class ControladorAutor
{

    public function inicio()
    {
        Login::isAdmin();
        $autores = Autor::getAutores();
        include_once("vistas/autor/inicio.php");
    }

    public function crear()
    {
        Login::isAdmin();
        if ($_POST) {
            Autor::crearAutor($_POST['nombre'], $_POST['apellido']);
            echo '<script> window.location="./?controlador=autor&accion=inicio"</script>';
        }
        include_once("vistas/autor/crear.php");
    }

    public function buscarAutor()
    {
        $autor = Autor::buscarAutor($_GET['id']);
        include_once("vistas/autor/editar.php");
    }

    public function editar()
    {
        Login::isAdmin();
        if ($_GET) {
            $autor = Autor::buscarAutor($_GET['id_autor']);
            print_r($autor);
            include_once("vistas/autor/editar.php");
            // header('Location:./?controlador=editorial&accion=editar');
        }

        if ($_POST) {
            print_r($_POST);
            Autor::editarAutor($_POST['id_autor'], $_POST['nombre'], $_POST['apellido']);
            echo '<script> window.location="./?controlador=autor&accion=inicio"</script>';
        }
    }

    public function eliminar()
    {

        Login::isAdmin();
        if ($_GET) {
            print_r($_GET);
            Autor::eliminarAutor($_GET['id_autor']);
            echo '<script> window.location="./?controlador=autor&accion=inicio"</script>';
        }
    }
}