<?php

namespace App\models\queries;

class ingresosQuerys
{
    static function selectAll()
    {
        return "select * from ingresos";
    }
    static function selectsala()
    {
        return "select * from salas";
    }
    static function selectprograma()
    {
        return "select * from programas";
    }
    static function selectresponsables()
    {
        return "select * from responsables";
    }
    static function Between($fromDate, $toDate)
    {
        

        return "select * from ingresos where fechaIngreso between '$fromDate' and '$toDate'";
    }

    static function insert($ingresos){
        $nombre = $ingresos->get('nombre');
        $codigoEstudiante = $ingresos->get('codigo');
        $fechaIngreso = $ingresos->get('fechaIngreso');
        $horaIngreso = $ingresos->get('horaIngreso');
        $horaSalida = $ingresos->get('horaSalida');
        $idPrograma = $ingresos->get('idPrograma');
        $idResponsable = $ingresos->get('idResponsable');
        $idSala = $ingresos->get('idSala');
        $created_at = $ingresos->get('created_at');
        $sql = "insert into ingresos (nombre,codigoEstudiante,fechaIngreso,horaIngreso,horaSalida,idPrograma,
        idResponsable,idSala,created_at) values ";
        $sql .= "('$nombre','$codigoEstudiante','$fechaIngreso','$horaIngreso','$horaSalida','$idPrograma'
        ,'$idResponsable','$idSala','$created_at')";
        return $sql;
    }
}