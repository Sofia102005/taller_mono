<?php
namespace App\models\db;

use mysqli;

class ingreso_salas_db
{
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $name = 'ingreso_salas_db';
    private $conex;

    public function __construct() {
        $this->conex = new mysqli($this->host, $this->user, $this->pwd, $this->name);
        
        if ($this->conex->connect_error) {
            die("Error de conexión: " . $this->conex->connect_error);
        }
    }

    function close() {
        $this->conex->close();
    }

    function query($sql) {
        if ($this->conex->connect_error) {
            echo $this->conex->connect_error;
            return null;
        }
        return $this->conex->query($sql);
    }
}