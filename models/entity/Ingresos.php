<?php

namespace App\models\entity;

use App\models\db\salasdb;
use App\models\queries\ingresosQuerys;

class Ingreso
{
    private $id;
    private $codigoEstudiante;
    private $nombreEstudiante;
    private $fechaIngreso;
    private $horaIngreso;
    private $horaSalida;
    private $idPrograma;
    private $idResponsable;
    private $idSala;
    private $created_at;
    private $update_at;
    function set($prop, $value)
    {
        $this->{$prop} = $value;
    }

    function get($prop)
    {
        return $this->{$prop};
    }
    static function all()
    {
        $sql = ingresosQuerys::selectAll();
        $db = new salasdb();
        $result = $db->query($sql);
        $Ingreso = [];
        $aux = '';

        while ($row = $result->fetch_assoc()) {
            $Ingresos = new Ingreso();
            $Ingresos->set('id', $row['id']);
            $Ingresos->set('nombreEstudiante', $row['nombreEstudiante']); 
            $Ingresos->set('codigoEstudiante', $row['codigoEstudiante']);
            $Ingresos->set('fechaIngreso', $row['fechaIngreso']);
            $Ingresos->set('horaIngreso', $row['horaIngreso']);
            $Ingresos->set('horaSalida', $row['horaSalida']);
            $aux = Ingreso :: programa($row['idPrograma']);
            $Ingresos->set('idPrograma', $aux);
            $aux = Ingreso :: Responsable($row['idResponsable']);
            $Ingresos->set('idResponsable', $aux);
            $aux = Ingreso :: salas($row['idSala']);
            $Ingresos->set('idSala', $aux);
            $Ingresos->set('created_at', $row['created_at']);
            $Ingresos->set('updated_at', $row['updated_at']);
            $dato='';
            array_push($Ingreso, $Ingresos);

        }
        $db->close();
        return $Ingreso;
    }
    static function Responsable($dato) 
    {
        $sql = ingresosQuerys::selectResponsables();
        $db = new salasdb();
        $Responsable = $db->query($sql);
        $nombre = '';
        while ($row_2 = $Responsable->fetch_assoc()){
            if ($row_2['id'] == $dato)
            {
                $nombre = $row_2['nombre'];
                return $nombre;
            }
        }
        $db->close();
    }
    static function programa($dato) 
    {
        $sql = ingresosQuerys::selectprograma();
        $db = new salasdb();
        $programas = $db->query($sql);
        $nombre = '';
        while ($row_2 = $programas->fetch_assoc()){
            if ($row_2['id'] == $dato){
                $nombre = $row_2['nombre'];
                return $nombre;
                $db->close();
            }
        }
        $db->close();
    }
    static function salas($dato) 
    {
        $sql = ingresosQuerys::selectsala();
        $db = new salasdb();
        $Salas = $db->query($sql);
        $nombre = '';
        while ($row_2 = $Salas->fetch_assoc()){
            if ($row_2['id'] == $dato){
                $nombre = $row_2['nombre'];
                return $nombre;
                $db->close();
            }
        }
        $db->close();
    }
    function save (){
        $sql = ingresosQuerys::insert($this);
        $db = new salasdb();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }
    static function Between($fromDate, $toDate){
        $sql = ingresosQuerys::Between($fromDate, $toDate);
        $db = new salasdb();
        $result = $db->query($sql);
        $Ingreso = [];
        $aux = '';

        while ($row = $result->fetch_assoc()) {
            $Ingresos = new Ingreso();
            $Ingresos->set('id', $row['id']);
            $Ingresos->set('nombreEstudiante', $row['nombreEstudiante']); 
            $Ingresos->set('codigoEstudiante', $row['codigoEstudiante']);
            $Ingresos->set('fechaIngreso', $row['fechaIngreso']);
            $Ingresos->set('horaIngreso', $row['horaIngreso']);
            $Ingresos->set('horaSalida', $row['horaSalida']);
            $aux = Ingreso :: programa($row['idPrograma']);
            $Ingresos->set('idPrograma', $aux);
            $aux = Ingreso :: Responsable($row['idResponsable']);
            $Ingresos->set('idResponsable', $aux);
            $aux = Ingreso :: salas($row['idSala']);
            $Ingresos->set('idSala', $aux);
            $Ingresos->set('created_at', $row['created_at']);
            $Ingresos->set('updated_at', $row['updated_at']);
            $dato='';
            array_push($Ingreso, $Ingresos);

        }
        $db->close();
        return $Ingreso;
    }

}