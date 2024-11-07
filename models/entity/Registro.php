<?php
namespace App\models\entity;

class Registro {
    private $codigo;
    private $nombre;
    private $programa;
    private $fecha_ingreso;
    private $hora_ingreso;
    private $fecha_salida;
    private $hora_salida;
    private $sala;
    private $registrador;

    function set($prop, $value) {
        $this->{$prop} = $value;
    }

    function get($prop) {
        return $this->{$prop};
    }
}
