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
    
   
    function saveIngreso($datos)
    {
        $ingreso = new Ingreso();

        try {

            if (empty($datos['nombreEstudiante'])) {
                throw new \Exception("El nombre del estudiante no está definido.");
            }
            $ingreso->set('nombreEstudiante', $datos['nombreEstudiante']);

            if (empty($datos['codigoEstudiante'])) {
                throw new \Exception("El código del estudiante no está definido.");
            }
            $ingreso->set('codigoEstudiante', $datos['codigoEstudiante']);

            if (empty($datos['fechaIngreso'])) {
                throw new \Exception("La fecha de ingreso no está definida.");
            }
            $ingreso->set('fechaIngreso', $datos['fechaIngreso']);

            if (empty($datos['horaIngreso'])) {
                throw new \Exception("La hora de ingreso no está definida.");
            }
            $ingreso->set('horaIngreso', $datos['horaIngreso']);

            if (empty($datos['horaSalida'])) {
                throw new \Exception("La hora de salida no está definida.");
            }
            $ingreso->set('horaSalida', $datos['horaSalida']);

            if (empty($datos['idPrograma'])) {
                throw new \Exception("El ID del programa no está definido.");
            }
            $ingreso->set('idPrograma', $datos['idPrograma']);

            if (empty($datos['idResponsable'])) {
                throw new \Exception("El ID del responsable no está definido.");
            }
            $ingreso->set('idResponsable', $datos['idResponsable']);

            if (empty($datos['idSala'])) {
                throw new \Exception("El ID de la sala no está definido.");
            }
            $ingreso->set('idSala', $datos['idSala']);

            return $ingreso->save();

        } catch (\Exception $e) {
        
            error_log("Error al guardar el ingreso: " . $e->getMessage());
            return false; 
        }
    }

   
    function buscador_fechas($fromDate, $toDate)
    {
        try {
            return ingresosQuerys::Between($fromDate, $toDate);
        } catch (\Exception $e) {
            error_log("Error al buscar ingresos entre fechas: " . $e->getMessage());
            return []; // Retorna un array vacío en lugar de false
        }
    }
}