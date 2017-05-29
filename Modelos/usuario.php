<?php

class Usuario {

    private $correo;
    private $contraseña;
    private $nombre;
    private $fecha_de_nacimiento;
    private $foto;
    private $descripcion;
    private $genero_musical;
    private $grupo;
    private $tipo;

    public function __construct($correo, $contraseña, $nombre, $fecha_de_nacimiento, $foto, $descripcion, $genero_musical, $grupo, $tipo) {
        $this->correo              = $correo;
        $this->contraseña          = $contraseña;
        $this->nombre              = $nombre;
        $this->fecha_de_nacimiento = $fecha_de_nacimiento;
        $this->foto                = $foto;
        $this->descripcion         = $descripcion;
        $this->genero_musical      = $genero_musical;
        $this->grupo               = $grupo;
        $this->tipo                = $tipo;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFecha() {
        return $this->fecha_de_nacimiento;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getGenero() {
        return $this->genero_musical;
    }

    public function getGrupo() {
        return $this->grupo;
    }

    public function getTipo() {
        return $this->tipo;
    }
}

?>
