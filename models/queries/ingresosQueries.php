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
    
    static function selectProgramas() 
    {
        return "SELECT * FROM programas"; 
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

    public function buscador_fechas($fromDate, $toDate)
{
    try {
        
        if (empty($fromDate) || empty($toDate)) {
            throw new \Exception("Las fechas no pueden estar vacías.");
        }

        if ($fromDate > $toDate) {
            throw new \Exception("La fecha 'Desde' debe ser anterior o igual a la fecha 'Hasta'.");
        }

        return IngresosQuerys::Between($fromDate, $toDate);
    } catch (\Exception $e) {
        error_log("Error al buscar ingresos entre fechas: " . $e->getMessage());
        return [];
    }
}
}