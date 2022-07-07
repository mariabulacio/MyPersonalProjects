<?php

class BD
{
    private static $instancia = NULL;

    public static function crearInstancia()
    {

        include_once('env.php');
        if (!isset(self::$instancia)) {

            $opcionesPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

            try {
                //Instancia MySQL en ServerCloud
                self::$instancia = new PDO("mysql:host=$DB_HOST;dbname=$DB_DATABASE", $DB_USERNAME, $DB_PASSWORD, $opcionesPDO);
            } catch (PDOException $e) {
                echo "Falló la conexión: " . $e->getMessage();
            }
        }
        return self::$instancia;
    }
}