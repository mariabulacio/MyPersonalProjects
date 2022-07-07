<?php
include_once('modelos/libros.php');
include_once('modelos/usuario.php');
class stockLibros
{


    public static function crearLibroUsuario($titulo, $id_genero, $id_editorial, $id_autor, $id_usuario, $image_name)
    {
        $id_usuario = $_SESSION['id_usuario'];
        $id_libro = "";
        try {
            $connectionBD = BD::crearInstancia();
            $sql = $connectionBD->prepare("INSERT INTO libros(titulo, id_genero, id_editorial, id_autor, image_name) VALUES(?,?,?,?,?);");

            $sql->execute([$titulo, $id_genero, $id_editorial, $id_autor, $image_name]);
            $id_libro = $connectionBD->lastInsertId();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $connectionBD = null;
        }

        try {
            $connectionBD = BD::crearInstancia();
            $isDisponible = 1;
            $sql = $connectionBD->prepare("INSERT INTO usuarios_libros (id_libro, id_usuario, is_venta) VALUES(?,?,?);");
            $sql->execute([$id_libro, $id_usuario, $isDisponible]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $connectionBD = null;
        }
    }

    public static function getMisLibros($id_usuario)
    {
        $misLibros = array();
        try {
            $connectionBD = BD::crearInstancia();
            $sql = $connectionBD->prepare("SELECT libros.id_libro FROM libros INNER JOIN usuarios_libros ON libros.id_libro = usuarios_libros.id_libro WHERE usuarios_libros.id_usuario = ?;");
            $sql->execute([$id_usuario]);
            $id_libros = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($id_libros as $id_libro) {
                $misLibros[] = Libros::buscarLibro($id_libro['id_libro']);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $connectionBD = null;
        }
        return $misLibros;
    }

    public static function setVendido($id_libro)
    {
        //update usuarios_libros set is_venta = 0 where id_libro = ?;
        try {
            $connectionBD = BD::crearInstancia();
            $sql = $connectionBD->prepare("UPDATE usuarios_libros SET is_venta = 0 WHERE id_libro = ?;");
            $sql->execute([$id_libro]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $connectionBD = null;
        }
    }

    // obtener los datos del usuario que vende el id_libro
    public static function getVendedor($id_libro)
    {
        $vendedor = array();
        try {
            $connectionBD = BD::crearInstancia();
            $sql = $connectionBD->prepare("SELECT id_usuario FROM usuarios_libros WHERE id_libro = ?;");
            $sql->execute([$id_libro]);
            $busqueda = $sql->fetchAll(PDO::FETCH_OBJ);
            $user = $busqueda[0]->id_usuario;
            if (!$busqueda) {
                echo "no hay nada";
            } else {
                $vendedor = Usuario::buscarUsuario($user);
            }
            // $id_usuario = $busqueda[0]->id_usuario;
            // $vendedor = Usuario::buscarUsuario($id_usuario);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $connectionBD = null;
        }
        return $vendedor;
    }

    //obtener todos los libros
    public static function getLibros()
    {
        $libros = array();
        try {
            $connectionBD = BD::crearInstancia();
            $sql = $connectionBD->prepare("SELECT * FROM libros
                                            INNER JOIN usuarios_libros ON libros.id_libro = usuarios_libros.id_libro
                                            WHERE usuarios_libros.is_venta = 1;");
            $sql->execute();
            $id_libros = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($id_libros as $id_libro) {
                $libros[] = Libros::buscarLibro($id_libro['id_libro']);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $connectionBD = null;
        }
        return $libros;
    }
}