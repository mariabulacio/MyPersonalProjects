<?php

include_once('modelos/editorial.php');
include_once('modelos/login.php');
include_once('conexion.php');



BD::crearInstancia();

class ControladorEditorial
{

    public function inicio()
    {
        Login::isAdmin();
        $editoriales = Editorial::getEditoriales();
        include_once("vistas/editorial/inicio.php");
    }

    public function crear()
    {
        Login::isAdmin();
        if ($_POST) {
            Editorial::crearEditorial($_POST['nombre']);
            print_r($_POST);
            header('Location: ./?controlador=editorial&accion=inicio');
        }

        include_once("vistas/editorial/crear.php");
    }

    public function buscar()
    {

        $editorial = Editorial::buscarEditorial($_GET['id']);
        include_once("vistas/editorial/editar.php");
    }

    public function editar()
    {
        Login::isAdmin();

        if ($_GET) {
            $editorial = Editorial::buscarEditorial($_GET['id_editorial']);
            print_r($editorial);
            include_once("vistas/editorial/editar.php");
            // header('Location:./?controlador=editorial&accion=editar');
        }

        if ($_POST) {
            print_r($_POST);
            Editorial::editarEditorial($_POST['id_editorial'], $_POST['nombre']);

            echo '<script> window.location="./?controlador=editorial&accion=inicio"</script>';
        }
    }

    public function eliminar()
    {

        Login::isAdmin();
        if ($_GET) {
            print_r($_GET);
            Editorial::eliminarEditorial($_GET['id_editorial']);
            echo '<script> window.location="./?controlador=autor&accion=inicio"</script>';
        }
    }
}