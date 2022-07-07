<?php

// validar Switcg para verificar controladores?
// acceso default
$controlador="welcome";
$accion="inicio";


//Un poco mas linda
if( (isset($_GET['controlador']) && isset($_GET['accion'])) && (!empty($_GET['controlador']) && (!empty($_GET['accion'] !="")))) {

        $controlador = $_GET["controlador"];
        $accion = $_GET["accion"];
}

        // Si no hay una sesion activa la inicia
        if(!isset($_SESSION)){session_start();}
        require_once("vistas/template.php");

?>