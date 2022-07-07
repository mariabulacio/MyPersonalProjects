<?php

class Editorial{

    public $id_editorial;
    public $nombre;


    public function __construct($id_editorial, $nombre) {
        $this->id_editorial = $id_editorial;
        $this->nombre = $nombre;
    }

// Metodos
    public static function crearEditorial($nombre){
        $conexionDB = BD::crearInstancia();
        $sql= $conexionDB->prepare("INSERT INTO editoriales(nombre) VALUES(?);");
        $sql->execute([$nombre]);
    }

    public static function getEditoriales(){
        $conexionDB = BD::crearInstancia();
        $sql = $conexionDB->query("SELECT * FROM editoriales;");
        $listaeditoriales = $sql->fetchAll(PDO::FETCH_OBJ);

        return $listaeditoriales;
    }

    public static function buscarEditorial($id_editorial) {
            
        $connectionBD = BD::crearInstancia();
        $sql = $connectionBD->prepare("SELECT * FROM editoriales WHERE id_editorial=?;");
        $sql->execute([$id_editorial]);
        $editorial = $sql->fetchAll(PDO::FETCH_OBJ);
        
        return $editorial[0];
    }

    public static function editarEditorial($id_editorial,$nombre) {

        $connectionBD = BD::crearInstancia();
        $sql=$connectionBD->prepare("UPDATE editoriales SET nombre=? WHERE id_editorial=?;");
        $sql->execute([$nombre, $id_editorial]);
    }


    public static function eliminarEditorial($id_editorial){
        $connectionBD = BD::crearInstancia();
        $sql=$connectionBD->prepare("DELETE FROM editoriales WHERE id_editorial='$id_editorial'");
        //$sql->bindParam("s",$id_editorial);
        $sql->execute();
    }
    // public static function ListarEditoriales(array $editoriales) {
            
    //     $connectionBD = BD::crearInstancia();

    //     $sql = $connectionBD->query("select * from editoriales");
    //     $sql->execute();
    //     $editorialesAretornar = $sql->fetchAll(PDO::FETCH_OBJ);
    //     return $editorialesAretornar;
    // }



}

?> 


