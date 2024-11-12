<?php

namespace App\controllers;

use App\models\entity\Ingreso;
use App\models\queries\ingresosQuerys;

class controladoresIngreso
{
    // Método para obtener todos los ingresos
    function getAllIngresos()
    {
        return Ingreso::all();
    }
    
    // Método para guardar un ingreso
    function saveIngreso($datos)
    {
        // Crear una nueva instancia de Ingreso
        $ingreso = new Ingreso();

        try {
            // Verificar y establecer las propiedades necesarias
            $ingreso->set('nombreEstudiante', $datos['nombreEstudiante'] ?? throw new \Exception("El nombre del estudiante no está definido."));
            $ingreso->set('codigoEstudiante', $datos['codigoEstudiante'] ?? throw new \Exception("El código del estudiante no está definido."));
            $ingreso->set('fechaIngreso', $datos['fechaIngreso'] ?? throw new \Exception("La fecha de ingreso no está definida."));
            $ingreso->set('horaIngreso', $datos['horaIngreso'] ?? throw new \Exception("La hora de ingreso no está definida."));
            $ingreso->set('horaSalida', $datos['horaSalida'] ?? throw new \Exception("La hora de salida no está definida."));
            $ingreso->set('idPrograma', $datos['idPrograma'] ?? throw new \Exception("El ID del programa no está definido."));
            $ingreso->set('idResponsable', $datos['idResponsable'] ?? throw new \Exception("El ID del responsable no está definido."));
            $ingreso->set('idSala', $datos['idSala'] ?? throw new \Exception("El ID de la sala no está definido."));

            // Guardar el ingreso
            return $ingreso->save();

        } catch (\Exception $e) {
            // Manejo de excepciones
            echo "Error al guardar el ingreso: " . $e->getMessage();
            return false; // O maneja el error de otra manera según sea necesario
        }
    }

    // Método para buscar ingresos entre fechas
    function buscador_fechas($fromDate, $toDate)
    {
        try {
            return ingresosQuerys::Between($fromDate, $toDate);
        } catch (\Exception $e) {
            echo "Error al buscar ingresos entre fechas: " . $e->getMessage();
            return false; // O maneja el error de otra manera según sea necesario
        }
    }
}