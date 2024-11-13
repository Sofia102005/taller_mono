<?php

namespace App\views;

use App\controllers\controladoresIngreso;

class anadirViews
{
    private $controller;
    private $ingresos = []; 

    function __construct()
    {
        $this->controller = new controladoresIngreso();
    }


    function mwsBusqueda($fromDate, $toDate)
    {
        $rows = '';
        $ingresos = $this->controller->buscador_fechas($fromDate, $toDate);

        $this->ingresos = $ingresos;

        if (count($this->ingresos) > 0) {
            foreach ($this->ingresos as $ingreso) {
                $rows .= '<tr>';
                $rows .= '   <td>' . htmlspecialchars($ingreso->get('nombreEstudiante')) . '</td>';
                $rows .= '   <td>' . htmlspecialchars($ingreso->get('codigoEstudiante')) . '</td>';
                $rows .= '   <td>' . htmlspecialchars($ingreso->get('fechaIngreso')) . '</td>';
                $rows .= '   <td>' . htmlspecialchars($ingreso->get('horaIngreso')) . '</td>';
                $rows .= '   <td>' . htmlspecialchars($ingreso->get('horaSalida')) . '</td>';
                $rows .= '   <td>' . htmlspecialchars($ingreso->get('idPrograma')) . '</td>';
                $rows .= '   <td>' . htmlspecialchars($ingreso->get('idResponsable')) . '</td>';
                $rows .= '   <td>' . htmlspecialchars($ingreso->get('idSala')) . '</td>';
                $rows .= '   <td>' . htmlspecialchars($ingreso->get('created_at')) . '</td>';
                $rows .= '   <td>' . htmlspecialchars($ingreso->get('updated_at')) . '</td>';
                $rows .= '</tr>';
            }
        } else {
            $rows .= '<tr>';
            $rows .= '   <td colspan="10">No hay datos registrados</td>';
            $rows .= '</tr>';
        }

        return $this->generateTable($rows);
    }

  
    function getBusqueda()
    {
        $fromDate = isset($_GET['from_date']) ? htmlspecialchars($_GET['from_date']) : '';
        $toDate = isset($_GET['to_date']) ? htmlspecialchars($_GET['to_date']) : '';

        $form = '<form action="busque.php" method="get">';
        $form .=     '<div class="form-container">';
        $form .=         '<div class="form-grup">';
        $form .=             '<label>Del día</label>';
        $form .=             '<input type="date" name="from_date" value="' . $fromDate . '">';
        $form .=         '</div>';
        $form .=         '<div class="form-grup">';
        $form .=             '<label>Hasta el día</label>';
        $form .=             '<input type="date" name="to_date" value="' . $toDate . '">';
        $form .=         '</div>';
        $form .=         '<div class="form-grup">';
        $form .=             '<label></label><br>';
        $form .=             '<button type="submit" class="Boton_fecha">Buscar</button>';
        $form .=         '</div>';
        $form .=     '</div>';
        $form .= '</form>';
        return $form;
    }

   
    public function getTable()
    {
        $rows = '';

        if (count($this->ingresos) > 0) {
            foreach ($this->ingresos as $ingreso) {
                $rows .= $this->generateRow($ingreso);
            }
        } else {
            $rows .= '<tr>';
            $rows .= '   <td colspan="10">No hay datos registrados</td>';
            $rows .= '</tr>';
        }

        return $this->generateTable($rows);
    }

   
    function getFormIngresos()
{
    $fechaActual = date('Y-m-d');

    $form = '<form action="inicio.php" method="post">';
    $form .= '<div>';
    $form .= '    <label for="nombreEstudiante">Nombre:</label>';
    $form .= '    <input type="text" id="nombreEstudiante" name="nombreEstudiante" required>';
    $form .= '</div>';
    $form .= '<div>';
    $form .= '    <label for="codigoEstudiante">Código:</label>';
    $form .= '    <input type="text" id="codigoEstudiante" name="codigoEstudiante" required>';
    $form .= '</div>';
    $form .= '<div>';
    $form .= '    <label for="idPrograma">Programas:</label>';
    $form .= '    <select id="idPrograma" name="idPrograma" required>';
    $form .= '        <option value="">Seleccione un programa</option>';
    $form .= '        <option value="Ing. Sistemas">Ing. Sistemas</option>';
    $form .= '        <option value="Ing. Multimedia">Ing. Multimedia</option>';
    $form .= '        <option value="Arquitectura">Arquitectura</option>';
    $form .= '        <option value="Contabilidad">Contabilidad</option>';
    $form .= '    </select>';
    $form .= '</div>';
    $form .= '<div>';
    $form .= '    <label for="fechaIngreso">Fecha de Ingreso:</label>';
    $form .= '    <input type="date" id="fechaIngreso" name="fechaIngreso" value="' . $fechaActual . '" required>';
    $form .= '</div>';
    $form .= '<div>';
    $form .= '    <label for="horaIngreso">Hora de Ingreso:</label>';
    $form .= '    <input type="time" id="horaIngreso" name="horaIngreso" required>';
    $form .= '</div>';
    $form .= '<div>';
    $form .= '    <label for="horaSalida">Hora de Salida:</label>';
    $form .= '    <input type="time" id="horaSalida" name="horaSalida" required>';
    $form .= '</div>';
    $form .= '<div>';
    $form .= '    <label for="responsable">Nombre del Responsable:</label>';
    $form .= '    <select id="responsable" name="idResponsable" required>';
    $form .= '        <option value="">Seleccione un responsable</option>';
    $form .= '        <option value="Juan Perez">Juan Perez</option>';
    $form .= '        <option value="Ana Lopez">Ana Lopez</option>';
    $form .= '    </select>';
    $form .= '</div>';
    $form .= '<div>';
    $form .= '    <label for="idSala">Salas:</label>';
    $form .= '    <select id="idSala" name="idSala" required>';
    $form .= '        <option value="">Seleccione una Sala</option>';
    $form .= '        <option value="Sala 201G">Sala 201G</option>';
    $form .= '        <option value="Sala 202H">Sala 202H</option>';
    $form .= '        <option value="Sala 203I">Sala 203I</option>';
    $form .= '        <option value="Sala 301G">Sala 301G</option>';
    $form .= '        <option value="Sala 302H">Sala 302H</option>';
    $form .= '        <option value="Sala 303I">Sala 303I</option>';
    $form .= '    </select>';
    $form .= '</div>';
    $form .= '<br>';
    $form .= '<div>';
    $form .= '    <button type="submit">Guardar</button>';
    $form .= '</div>';
    $form .= '</form>';

    return $form;
}

    private function generateRow($ingreso)
    {
        $row = '<tr>';
        $row .= '   <td>' . htmlspecialchars($ingreso->get('nombre')) . '</td>';
        $row .= '   <td>' . htmlspecialchars($ingreso->get('codigoEstudiante')) . '</td>';
        $row .= '   <td>' . htmlspecialchars($ingreso->get('fechaIngreso')) . '</td>';
        $row .= '   <td>' . htmlspecialchars($ingreso->get('horaIngreso')) . '</td>';
        $row .= '   <td>' . htmlspecialchars($ingreso->get('horaSalida')) . '</td>';
        $row .= '   <td>' . htmlspecialchars($ingreso->get('idPrograma')) . '</td>';
        $row .= '   <td>' . htmlspecialchars($ingreso->get('idResponsable')) . '</td>';
        $row .= '   <td>' . htmlspecialchars($ingreso->get('idSala')) . '</td>';
        $row .= '   <td>' . htmlspecialchars($ingreso->get('created_at')) . '</td>';
        $row .= '   <td>' . htmlspecialchars($ingreso->get('updated_at')) . '</td>';
        $row .= '</tr>';

        return $row;
    }

    private function generateTable($rows)
    {
        $table = '<table>';
        $table .= '  <thead>';
        $table .= '     <tr>';
        $table .= '         <th>Nombre</th>';
        $table .= '         <th>Código</th>';
        $table .= '         <th>Fecha Ingreso</th>';
        $table .= '         <th>Hora Ingreso</th>';
        $table .= '         <th>Hora Salida</th>';
        $table .= '         <th>Programa</th>';
        $table .= '         <th>Responsable</th>';
        $table .= '         <th>Sala</th>';
        $table .= '         <th>Creado</th>';
        $table .= '         <th>Modificado</th>';
        $table .= '     </tr>';
        $table .= '  </thead>';
        $table .= ' <tbody>';
        $table .=  $rows;
        $table .= ' </tbody>';
        $table .= '</table>';

        return $table;
    }
}
