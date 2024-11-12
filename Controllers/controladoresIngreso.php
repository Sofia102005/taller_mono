<?php

namespace App\controllers;

use App\models\entity\Ingreso;
use App\models\queries\ingresosQuerys;

class controladoresIngreso
{
    function getAllIngresos()
    {
        return Ingreso::all();
    }
    
    function saveContacto($datos)
    {
        $Ingresos = new Ingreso();
        $Ingresos->set('nombreEstudiante', $datos['nombreEstudiante']);
        $Ingresos->set('codigoEstudiante',$datos['codigoEstudiante']);
        $Ingresos->set('fechaIngreso', $datos['fechaIngreso']);
        $Ingresos->set('horaIngreso', $datos['horaIngreso']);
        $Ingresos->set('horaSalida', $datos['horaSalida']);
        $Ingresos->set('idPrograma', $datos['idPrograma']);
        $Ingresos->set('idResponsable', $datos['idResponsable']);
        $Ingresos->set('idSala', $datos['idSala']);
        return $Ingresos->save();
    }
    function buscador_fechas($fromDate, $toDate){
        return Ingreso::Between($fromDate, $toDate);
    }
}