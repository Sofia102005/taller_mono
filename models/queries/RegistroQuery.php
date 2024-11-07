<?php
namespace App\models\queries;

class RegistroQuery {
    static function all() {
        return "SELECT * FROM registros WHERE DATE(fecha_ingreso) = CURDATE()";
    }

    static function insert($registro) {
        $codigo = $registro->get('codigo');
        $nombre = $registro->get('nombre');
        $programa = $registro->get('programa');
        $fecha_ingreso = $registro->get('fecha_ingreso');
        $hora_ingreso = $registro->get('hora_ingreso');
        $sala = $registro->get('sala');
        $registrador = $registro->get('registrador');

        return "INSERT INTO registros (codigo, nombre, programa, fecha_ingreso, hora_ingreso, sala, registrador)
                VALUES ('$codigo', '$nombre', '$programa', '$fecha_ingreso', '$hora_ingreso', '$sala', '$registrador')";
    }

    static function update($registro) {
        $codigo = $registro->get('codigo');
        $nombre = $registro->get('nombre');

        return "UPDATE registros SET nombre = '$nombre' WHERE codigo = '$codigo'";
    }
}
