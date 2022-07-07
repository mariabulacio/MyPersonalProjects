<?php

include_once('modelos/genero.php');
include_once('conexion.php');
include_once('modelos/login.php');

BD::crearInstancia();

class ControladorGeneros
{

    public function inicio()
    {
        Login::isAdmin();
        $generos = Genero::getgeneros();
        include_once("vistas/genero/inicio.php");
    }

    public function crear()
    {
        Login::isAdmin();
        if ($_POST) {
            Genero::crearGenero($_POST['nombre']);
            echo '<script> window.location="./?controlador=generos&accion=inicio"</script>';
        }

        include_once("vistas/genero/crear.php");
    }

    public function buscar()
    {

        $Genero = Genero::buscarGenero($_GET['id']);
        include_once("vistas/genero/editar.php");
    }

    public function editar()
    {

        Login::isAdmin();
        if ($_GET) {
            $genero = Genero::buscarGenero($_GET['id_genero']);
            include_once("vistas/genero/editar.php");
        }

        if ($_POST) {
            Genero::editarGenero($_POST['id_genero'], $_POST['nombre']);
            echo '<script> window.location="./?controlador=generos&accion=inicio"</script>';
        }
    }

    public function eliminar()
    {

        Login::isAdmin();
        if ($_GET) {
            Genero::eliminarGenero($_GET['id_genero']);
            echo '<script> window.location="./?controlador=generos&accion=inicio"</script>';
        }
    }
}