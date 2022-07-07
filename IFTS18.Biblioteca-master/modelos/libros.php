<?php
class Libros
{

    public $id;
    public $titulo;
    public $genero;
    public $editorial;
    public $autor;

    public function __construct($id, $titulo, $genero, $editorial, $autor)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->editorial = $editorial;
        $this->autor = $autor;
    }

    public static function crearLibro($titulo, $id_genero, $id_editorial, $id_autor, $image_name)
    {

        $connectionBD = BD::crearInstancia();



        $sql = $connectionBD->prepare("INSERT INTO libros(titulo, id_genero, id_editorial, id_autor, image_name) VALUES(?,?,?,?,?);");

        $sql->execute([$titulo, $id_genero, $id_editorial, $id_autor, $image_name]);
    }

    public static function listarLibros()
    {

        $connectionBD = BD::crearInstancia();

        $sql = $connectionBD->query("SELECT l.id_libro, l.titulo titulo, concat(a.nombre, ' ',a.apellido) as autor, g.nombre genero, e.nombre editorial, l.image_name FROM autores a
                                        JOIN libros l ON l.id_autor = a.id_autor
                                        JOIN generos g ON l.id_genero = g.id_genero
                                        JOIN editoriales e ON l.id_editorial = e.id_editorial");
        $listaLibros = $sql->fetchAll(PDO::FETCH_OBJ);
        return $listaLibros;
    }


    public static function buscarLibro($id)
    {

        $connectionBD = BD::crearInstancia();
        $sql = $connectionBD->prepare("SELECT Lib.Id_libro id_libro, Lib.titulo titulo, Gen.id_genero id_genero, Gen.nombre gen_nombre, Ed.Id_editorial id_editorial, Ed.nombre ed_nombre, Aut.Id_autor id_autor, concat(Aut.nombre,' ',Aut.apellido) autor, Lib.image_name FROM libros Lib
                                        JOIN generos Gen ON Lib.id_genero = Gen.id_genero
                                        JOIN editoriales Ed ON Lib.id_editorial = Ed.id_editorial
                                        JOIN autores Aut ON Lib.id_autor = Aut.id_autor
                                        WHERE id_libro=?;");
        $sql->execute([$id]);
        $libro = $sql->fetchAll(PDO::FETCH_OBJ);

        return $libro[0];
    }

    public static function editarLibro($id_libro, $titulo, $id_genero, $id_editorial, $id_autor)
    {

        $connectionBD = BD::crearInstancia();
        $sql = $connectionBD->prepare("UPDATE libros SET titulo=?, id_autor=?, id_genero=?, id_editorial=? WHERE id_libro=?;");
        $sql->execute([$titulo, $id_autor, $id_genero, $id_editorial, $id_libro]);
    }

    public static function eliminarLibro($id_libro)
    {

        $connectionBD = BD::crearInstancia();
        $sql = $connectionBD->prepare("DELETE FROM libros WHERE id_libro='$id_libro'");
        $sql->execute();
        $sql = null;
    }
}