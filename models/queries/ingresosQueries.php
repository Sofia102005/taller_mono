<?php

namespace App\models\queries;

class ingresosQuerys
{
    static function selectAll()
    {
        return "SELECT * FROM ingresos";
    }
    
    static function selectsala()
    {
        return "SELECT * FROM salas";
    }
    
    static function selectProgramas() // Cambiado a plural para consistencia
    {
        return "SELECT * FROM programas"; // Consulta para obtener todos los programas
    }
    
    static function selectresponsables()
    {
        return "SELECT * FROM responsables";
    }
    
    static function Between($fromDate, $toDate)
    {
        return "SELECT * FROM ingresos WHERE fechaIngreso BETWEEN '$fromDate' AND '$toDate'";
    }

    static function insert($ingresos)
    {
        $nombre = $ingresos->get('nombre');
        $codigoEstudiante = $ingresos->get('codigo');
        $fechaIngreso = $ingresos->get('fechaIngreso');
        $horaIngreso = $ingresos->get('horaIngreso');
        $horaSalida = $ingresos->get('horaSalida');
        $idPrograma = $ingresos->get('idPrograma');
        $idResponsable = $ingresos->get('idResponsable');
        $idSala = $ingresos->get('idSala');
        $created_at = $ingresos->get('created_at');
        
        $sql = "INSERT INTO ingresos (nombre, codigoEstudiante, fechaIngreso, horaIngreso, horaSalida, idPrograma,
                idResponsable, idSala, created_at) VALUES ";
        $sql .= "('$nombre', '$codigoEstudiante', '$fechaIngreso', '$horaIngreso', '$horaSalida', '$idPrograma',
                '$idResponsable', '$idSala', '$created_at')";
                
        return $sql;
    }
}