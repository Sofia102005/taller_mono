<?php

namespace App\Controllers;

use App\Models\Entity\Ingreso;
use App\Models\Queries\IngresosQuerys;

class ControladoresIngreso 
{
    public function getAllIngresos()
    {
        return Ingreso::all();
    }
    
    public function saveIngreso($datos)
    {
        $ingreso = new Ingreso();

        try {
            // Validación de datos
            $this->validateIngresoData($datos);

            // Asignación de datos al objeto Ingreso
            $ingreso->set('nombreEstudiante', $datos['nombreEstudiante']);
            $ingreso->set('codigoEstudiante', $datos['codigoEstudiante']);
            $ingreso->set('fechaIngreso', $datos['fechaIngreso']);
            $ingreso->set('horaIngreso', $datos['horaIngreso']);
            $ingreso->set('horaSalida', $datos['horaSalida']);
            $ingreso->set('idPrograma', $datos['idPrograma']);
            $ingreso->set('idResponsable', $datos['idResponsable']);
            $ingreso->set('idSala', $datos['idSala']);

            // Guardar el ingreso en la base de datos
            return $ingreso->save();

        } catch (\Exception $e) {
            error_log("Error al guardar el ingreso: " . $e->getMessage());
            return false; 
        }
    }

    private function validateIngresoData($datos)
    {
        // Validación de cada campo requerido
        if (empty($datos['nombreEstudiante'])) {
            throw new \Exception("El nombre del estudiante no está definido.");
        }
        if (empty($datos['codigoEstudiante'])) {
            throw new \Exception("El código del estudiante no está definido.");
        }
        if (empty($datos['fechaIngreso'])) {
            throw new \Exception("La fecha de ingreso no está definida.");
        }
        if (empty($datos['horaIngreso'])) {
            throw new \Exception("La hora de ingreso no está definida.");
        }
        if (empty($datos['horaSalida'])) {
            throw new \Exception("La hora de salida no está definida.");
        }
        if (empty($datos['idPrograma'])) {
            throw new \Exception("El ID del programa no está definido.");
        }
        if (empty($datos['idResponsable'])) {
            throw new \Exception("El ID del responsable no está definido.");
        }
        if (empty($datos['idSala'])) {
            throw new \Exception("El ID de la sala no está definido.");
        }
    }

    public function buscador_fechas($fromDate, $toDate)
    {
        try {
            return IngresosQuerys::Between($fromDate, $toDate);
        } catch (\Exception $e) {
            error_log("Error al buscar ingresos entre fechas: " . $e->getMessage());
            return [];
        }
    }
}