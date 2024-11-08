<?php
namespace App\views;

use App\controllers\RegistroController;

class IngresoView {
    private $registroController;

    function __construct() {
        $this->registroController = new RegistroController();
    }

    function formularioBusquedaIngresos() {
        return "<form> <!-- Código HTML para el formulario de registro de ingreso --> </form>";
    }

    function tablaIngresos() {
        $registros = $this->registroController->allRegistros();
    
        return "<table> <!-- Generar aquí la tabla HTML --> </table>";
    }
}
