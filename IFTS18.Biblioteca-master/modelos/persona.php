<?php

class Persona{

    public $nombre;
    public $apellido;
    public $Email;
    public $Telefono;
    // private $nacionalidad;

    public function __construct($nombre, $apellido, $Email, $Telefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->Email = $Email;
        $this->Telefono = $Telefono;
    }

    // function set_nombre($nombre) {
    //     $this->nombre = $nombre;
    // }
    // function get_nombre() {
    //     return $this->nombre;
    // }

    // function set_apellido($apellido) {
    //     $this->apellido = $apellido;
    // }
    // function get_apellido() {
    //     return $this->apellido;
    // }

}
