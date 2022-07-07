<?php

include_once("modelos/persona.php");


class Autor extends Persona{

    public $id_autor;
    public $nombre;
    public $apellido;


    public function __construct($id_autor, $nombre, $apellido) {
        $this->id_autor = $id_autor;
        $this->titulo = $nombre;
        $this->genero= $apellido;
    }

// Metodos
    public static function crearAutor($nombre, $apellido){
        $conexionDB = BD::crearInstancia();
        $sql= $conexionDB->prepare("INSERT INTO autores(nombre, apellido) VALUES(?,?)");
        $sql->execute([$nombre,$apellido]);
    }

    public static function getAutores(){
        $conexionDB = BD::crearInstancia();
        $sql = $conexionDB->query("SELECT * FROM autores;");
        $listaAutores = $sql->fetchAll(PDO::FETCH_OBJ);

        return $listaAutores;
    }
    public static function buscarAutor($id_autor) {
            
        $connectionBD = BD::crearInstancia();
        $sql = $connectionBD->prepare("SELECT * FROM autores WHERE id_autor=?;");
        $sql->execute([$id_autor]);
        $autor = $sql->fetchAll(PDO::FETCH_OBJ);
        
        return $autor[0];
    }

    public static function editarAutor($id_autor,$nombre,$apellido) {

        $connectionBD = BD::crearInstancia();
        $sql=$connectionBD->prepare("UPDATE autores SET nombre=? , apellido=? WHERE id_autor=?;");
        $sql->execute([$nombre, $apellido, $id_autor]);
    }


    public static function eliminarAutor($id_autor){
        $connectionBD = BD::crearInstancia();
        $sql=$connectionBD->prepare("DELETE FROM autores WHERE id_autor='$id_autor'");
        //$sql->bindParam("s",$id_editorial);
        $sql->execute();
    }



}

?> 


