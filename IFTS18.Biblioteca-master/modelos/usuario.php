<?php

include_once('modelos/persona.php');
class Usuario extends Persona
{
    public $Id_usuario;
    public $password;
    public $urlFoto;
    public $rol;

    public function __construct($nombre, $apellido, $email, $telefono, $password, $id_usuario, $urlFoto, $rol)
    {
        parent::__construct($nombre, $apellido, $email, $telefono);
        $this->Id_usuario = $id_usuario;
        $this->password = $password;
        $this->urlFoto = $urlFoto;
        $this->rol = $rol;
    }

    public static function createUser($nombre, $apellido, $email, $telefono, $password, $urlFoto, $rol)
    {
        $conexionDB = BD::crearInstancia();
        $sql = $conexionDB->prepare("INSERT INTO usuarios(nombre, apellido, email, telefono, password, url_foto, rol) VALUES(?,?,?,?,?,?,?);");
        try {
            $sql->execute(array($nombre, $apellido, $email, $telefono, $password, $urlFoto, $rol));
            return true;
        } catch (PDOException $e) {
            return false;
        } finally {
            $sql = null;
        }
    }


    public static function createCommonUser($nombre, $apellido, $email, $telefono, $password)
    {
        $rol = 2;
        //verificar si el usuario existe
        $usuario = Usuario::getUserByEmail($email);
        if ($usuario == null) {
            $conexionDB = BD::crearInstancia();
            $sql = $conexionDB->prepare("INSERT INTO usuarios(nombre, apellido, email, telefono, password, rol) VALUES(?,?,?,?,?,?);");
            try {
                $sql->execute(array($nombre, $apellido, $email, $telefono, $password, $rol));
                return true;
            } catch (PDOException $e) {
                return false;
            } finally {
                $sql = null;
            }
        } else {
            echo '<script> alert("El usuario ya existe")</script>';
        }
    }

    public static function getUsers()
    {
        $conexionDB = BD::crearInstancia();
        $sql = $conexionDB->prepare("SELECT * FROM usuarios");
        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false;
        } finally {
            $sql = null;
        }
    }

    public static function buscarUsuario($id_usuario)
    {
        $conexionDB = BD::crearInstancia();
        $sql = $conexionDB->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        try {
            $sql->execute(array($id_usuario));
            $usuario = $sql->fetchall(PDO::FETCH_OBJ);
            return $usuario[0];
        } catch (PDOException $e) {
            return false;
        } finally {
            $sql = null;
        }
    }

    // actualizar un usuario
    public static function updateUser($id_usuario, $nombre, $apellido, $email, $telefono, $password, $rol)
    {
        $conexionDB = BD::crearInstancia();
        $sql = $conexionDB->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, email = ?, telefono = ?, password = ?, rol = ? WHERE id_usuario = ?");
        try {
            $sql->execute(array($nombre, $apellido, $email, $telefono, $password, $rol, $id_usuario));
            return true;
        } catch (PDOException $e) {
            return false;
        } finally {
            $sql = null;
        }
    }


    //actualizar un usuario comun
    public static function updateCommonUser($id_usuario, $nombre, $apellido, $email, $telefono, $password)
    {
        $conexionDB = BD::crearInstancia();
        $sql = $conexionDB->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, email = ?, telefono = ?, password = ? WHERE id_usuario = ?");
        try {
            $sql->execute(array($nombre, $apellido, $email, $telefono, $password, $id_usuario));
            return true;
        } catch (PDOException $e) {
            return false;
        } finally {
            $sql = null;
        }
    }

    //getUserByEmail
    public static function getUserByEmail($email)
    {
        $conexionDB = BD::crearInstancia();
        $sql = $conexionDB->prepare("SELECT * FROM usuarios WHERE email = ?");
        try {
            $sql->execute(array($email));
            $usuario = $sql->fetchall(PDO::FETCH_OBJ);
            return $usuario[0];
        } catch (PDOException $e) {
            return false;
        } finally {
            $sql = null;
        }
    }
}