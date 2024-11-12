<?php

namespace App\models\db;

use mysqli;

class salasdb
{
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $name = 'Ingresos_salas_db';
    public $conex;

    function __construct()
    {
        $this->conex = new mysqli(
            $this->host,
            $this->user,
            $this->pwd,
            $this->name
        );

        if ($this->conex->connect_error) {
            die("Connection failed: " . $this->conex->connect_error);
        }
    }

    function close()
    {
        $this->conex->close();
    }

    function query($sql)
    {
        if ($this->conex->connect_error) {
            echo "Error de conexión: " . $this->conex->connect_error;
            return null;
        }

        $result = $this->conex->query($sql);
        
       
        if ($result === false) {
            echo "Error en la consulta: " . $this->conex->error;
            return null;
        }
        
        return $result;
    }
}