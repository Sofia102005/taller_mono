<?php
namespace App\views;

use App\controllers\RegistroController;

class IngresoView {
    private $registroController;

    function __construct() {
        $this->registroController = new RegistroController();
    }

    function formularioRegistro() {
        return "<form> <!-- Código HTML para el formulario de registro de ingreso --> </form>";
    }

    function tablaRegistros() {
        $registros = $this->registroController->allRegistros();
    
        return "<table> <!-- Generar aquí la tabla HTML --> </table>";
    }
}
