<?php

include_once('modelos/usuario.php');
include_once('conexion.php');
include_once('modelos/login.php');

BD::crearInstancia();

class ControladorUsuarios
{

    //obtener todos los usuriarios
    public function inicio()
    {
        Login::isAdmin();
        $usuarios = Usuario::getUsers();
        include_once("vistas/usuarios/inicio.php");
    }

    public function crear()
    {
        Login::isAdmin();
        if ($_POST) {
            $response = Usuario::createUser($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['telefono'], $_POST['password'], $_POST['url_foto'], $_POST['rol']);
            if ($response) {
                echo '<script> alert("Se creo el usuario") </script>';
                header('Location: ./?controlador=usuarios&accion=inicio');
            } else {
                echo '<script> alert("Error al crear el usuario") </script>';
            }
        }

        include_once("vistas/usuarios/crear.php");
    }

    //editar usuario
    public function editar()
    {
        Login::isAdmin();
        if ($_GET) {
            $usuario = Usuario::buscarUsuario($_GET['id_usuario']);
            include_once("vistas/usuarios/editar.php");
        }

        if ($_POST) {
            $response = Usuario::updateUser($_POST['id_usuario'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['telefono'], $_POST['password'], $_POST['rol']);
            if ($response) {
                echo '<script> alert("Se edito el usuario") </script>';
                echo '<script> window.location="./?controlador=usuarios&accion=inicio"</script>';
            } else {
                echo '<script> alert("Error al editar el usuario") </script>';
            }
        }
    }

    public function editarCommonUser()
    {
        Login::isLogued();

        if ($_GET) {
            $id_usuario = $_SESSION['id_usuario'];
            $usuario = Usuario::buscarUsuario($id_usuario);
        }

        if ($_POST) {
            $response = Usuario::updateCommonUser($id_usuario, $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['telefono'], $_POST['password']);
            if ($response) {
                echo '<script> alert("Se edito el usuario") </script>';
                echo '<script> window.location="./?controlador=stocklibros&accion=inicio"</script>';
            } else {
                echo '<script> alert("Error al editar el usuario") </script>';
            }
        }
        include_once("vistas/usuarios/editarCommonUser.php");
    }
}