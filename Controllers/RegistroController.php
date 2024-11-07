<?php
namespace App\controllers;

use App\models\entity\Registro;
use App\models\queries\RegistroQuery;
use App\models\db\ingreso_salas_db;

class RegistroController {
    private $db;

    public function __construct() {
        $this->db = new ingreso_salas_db();
    }

    function allRegistros() {
        $sql = RegistroQuery::all();
        return $this->db->query($sql);
    }

    function newRegistro($datos) {
        $registro = new Registro();
        $registro->set('codigo', $datos['codigo']);
        $registro->set('nombre', $datos['nombre']);
        $registro->set('programa', $datos['programa']);
        $registro->set('fecha_ingreso', $datos['fecha_ingreso']);
        $registro->set('hora_ingreso', $datos['hora_ingreso']);
        $registro->set('sala', $datos['sala']);
        $registro->set('registrador', $datos['registrador']);

        $sql = RegistroQuery::insert($registro);
        return $this->db->query($sql);
    }
}
