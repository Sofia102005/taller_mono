<?php

namespace App\models\entity;

use App\models\db\salasdb;
use App\models\queries\ingresosQuerys;

class Ingreso
{
    public $id;
    public $codigoEstudiante;
    public $nombreEstudiante; 
    public $fechaIngreso;
    public $horaIngreso;
    public $horaSalida;
    public $idPrograma;
    public $idResponsable;
    public $idSala;
    public $created_at;
    public $updated_at;

    // Método para establecer propiedades
    public function set($prop, $value)
    {
        if (property_exists($this, $prop)) {
            $this->{$prop} = $value;
        } else {
            throw new \Exception("Property {$prop} no existe."); 
        }
    }
    
    // Método para obtener propiedades
    public function get($prop)
    {
        if (property_exists($this, $prop)) {
            return $this->{$prop};
        } else {
            throw new \Exception("Property {$prop} no existe."); 
        }
    }

    // Método para obtener el nombre del estudiante
    public function getNombre()
    {
        return $this->nombreEstudiante;
    }

    // Método para obtener todos los ingresos
    public static function all()
    {
        $sql = ingresosQuerys::selectAll();
        $db = new salasdb();
        $result = $db->query($sql);
        $IngresosList = []; 

        while ($row = $result->fetch_assoc()) {
            $Ingresos = new Ingreso();
            $Ingresos->set('id', $row['id']);
            $Ingresos->set('nombreEstudiante', $row['nombreEstudiante']); 
            $Ingresos->set('codigoEstudiante', $row['codigoEstudiante']);
            $Ingresos->set('fechaIngreso', $row['fechaIngreso']);
            $Ingresos->set('horaIngreso', $row['horaIngreso']);
            $Ingresos->set('horaSalida', $row['horaSalida']);
            $Ingresos->set('idPrograma', Ingreso::programa($row['idPrograma'])); 
            $Ingresos->set('idResponsable', Ingreso::Responsable($row['idResponsable']));
            $Ingresos->set('idSala', Ingreso::salas($row['idSala'])); 
            $Ingresos->set('created_at', $row['created_at']);
            $Ingresos->set('updated_at', $row['updated_at']);
            $IngresosList[] = $Ingresos; 
        }

        $db->close();
        return $IngresosList;
    }

    public function save()
    {
        $db = new salasdb(); 
    
        $sql = "INSERT INTO ingresos (codigoEstudiante, nombreEstudiante, fechaIngreso, horaIngreso, horaSalida, idPrograma, idResponsable, idSala, created_at, updated_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

        $stmt = $db->conex->prepare($sql);
        if ($stmt === false) {
            throw new \Exception("Error en la preparación de la consulta: " . $db->conex->error);
        }   
    
        $stmt->bind_param("ssssssss", 
            $this->codigoEstudiante, 
            $this->nombreEstudiante, 
            $this->fechaIngreso, 
            $this->horaIngreso, 
            $this->horaSalida, 
            $this->idPrograma, 
            $this->idResponsable, 
            $this->idSala
        );

        if ($stmt->execute()) {
            $stmt->close(); 
            $db->close(); 
            return true; 
        } else {
            throw new \Exception("Error al guardar: " . $stmt->error);
        }
    }

    public static function Responsable($dato) 
    {
        $sql = ingresosQuerys::selectResponsables();
        $db = new salasdb();
        $Responsable = $db->query($sql);
        $nombre = '';

        while ($row_2 = $Responsable->fetch_assoc()) {
            if ($row_2['id'] == $dato) {
                $nombre = $row_2['nombre'];
                break; 
            }
        }

        $db->close();
        return $nombre; 
    }

    public static function programa($dato) 
    {
        $sql = ingresosQuerys::selectProgramas();
        $db = new salasdb();
        $Programa = $db->query($sql);
        $nombre = '';

        while ($row_2 = $Programa->fetch_assoc()) {
            if ($row_2['id'] == $dato) {
                $nombre = $row_2['nombre'];
                break; 
            }
        }

        $db->close();
        return $nombre; 
    }

    public static function salas($dato) 
    {
        $sql = ingresosQuerys::selectSala(); 
        $db = new salasdb();
        $Sala = $db->query($sql);
        $nombre = '';

        while ($row_2 = $Sala->fetch_assoc()) {
            if ($row_2['id'] == $dato) {
                $nombre = $row_2['nombre'];
                break; 
            }
        }

        $db->close();
        return $nombre; 
    }
}
