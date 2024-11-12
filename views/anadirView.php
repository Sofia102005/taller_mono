<?php

namespace App\views;

use App\controllers\controladoresIngreso;

class anadirViews
{
    private $controller;

    function __construct()
    {
        $this->controller = new controladoresIngreso();
    }

    function mwsBusqueda($fromDate, $toDate)
    {
        $rows = '';
        $ingresos = $this->controller->buscador_fechas($fromDate, $toDate);
        if (count($ingresos) > 0) {
            foreach ($ingresos as $ingreso) {
                $rows .= '<tr>';
                $rows .= '   <td>' . $ingreso->get('nombre') . '</td>';
                $rows .= '   <td>' . $ingreso->get('codigoEstudiante') . '</td>';
                $rows .= '   <td>' . $ingreso->get('fechaIngreso') . '</td>';
                $rows .= '   <td>' . $ingreso->get('horaIngreso') . '</td>';
                $rows .= '   <td>' . $ingreso->get('horaSalida') . '</td>';
                $rows .= '   <td>' . $ingreso->get('idPrograma') . '</td>';
                $rows .= '   <td>' . $ingreso->get('idResponsable') . '</td>';            
                $rows .= '   <td>' . $ingreso->get('idSala') . '</td>'; 
                $rows .= '   <td>' . $ingreso->get('created_at') . '</td>'; 
                $rows .= '   <td>' . $ingreso->get('updated_at') . '</td>'; 
                $rows .= '</tr>';
            }
        } else {
            $rows .= '<tr>';
            $rows .= '   <td colspan="10">No hay datos registrados</td>';
            $rows .= '</tr>';
        }

        $table = '<table>';
        $table .= '  <thead>';
        $table .= '     <tr>';
        $table .= '         <th>Nombre</th>';
        $table .= '         <th>Codigo</th>';
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

    function getBusqueda()
    {
        $form = '<form action="busque.php" method="get">';
        $form .=     '<div class="form-container">';
        $form .=         '<div class="form-grup">';
        $form .=             '<label>Del día</label>';
        $form .=             '<input type="date" name="from_date" value="<?php if(isset($_GET[\'from_date\'])) {echo $_GET[\'from_date\']; }?>">';
        $form .=         '</div>';
        $form .=         '<div class="form-grup">';
        $form .=             '<label>Hasta el día</label>';
        $form .=             '<input type="date" name="to_date" value="<?php if(isset($_GET[\'to_date\'])) {echo $_GET[\'to_date\']; }?>">';
        $form .=         '</div>';
        $form .=         '<div class="form-grup">';
        $form .=             '<label></label><br>';
        $form .=             '<button type="submit" class="Boton_fecha">Buscar</button>';
        $form .=         '</div>';
        $form .=     '</div>';
        $form .= '</form>';
        return $form;
    }

    function getTable($fecha)
    {   
        $rows = '';
        $ingresos = $this->controller->getAllIngresos();
        if ($fecha != '1') {
            foreach ($ingresos as $ingreso) {
                if ($fecha == $ingreso->get('fechaIngreso')) {
                    $rows .= '<tr>';
                    $rows .= '   <td>' . $ingreso->get('nombre') . '</td>';
                    $rows .= '   <td>' . $ingreso->get('codigoEstudiante') . '</td>';
                    $rows .= '   <td>' . $ingreso->get('fechaIngreso') . '</td>';
                    $rows .= '   <td>' . $ingreso->get('horaIngreso') . '</td>';
                    $rows .= '   <td>' . $ingreso->get('horaSalida') . '</td>';
                    $rows .= '   <td>' . $ingreso->get('idPrograma') . '</td>';
                    $rows .= '   <td>' . $ingreso->get('idResponsable') . '</td>';            
                    $rows .= '   <td>' . $ingreso->get('idSala') . '</td>'; 
                    $rows .= '   <td>' . $ingreso->get('created_at') . '</td>'; 
                    $rows .= '   <td>' . $ingreso->get('updated_at') . '</td>'; 
                    $rows .= '</tr>';
                }
            }
        } else if (count($ingresos) > 0) {
            foreach ($ingresos as $ingreso) {
                $rows .= '<tr>';
                $rows .= '   <td>' . $ingreso->get('nombre') . '</td>';
                $rows .= '   <td>' . $ingreso->get('codigoEstudiante') . '</td>';
                $rows .= '   <td>' . $ingreso->get('fechaIngreso') . '</td>';
                $rows .= '   <td>' . $ingreso->get('horaIngreso') . '</td>';
                $rows .= '   <td>' . $ingreso->get('horaSalida') . '</td>';
                $rows .= '   <td>' . $ingreso->get('idPrograma') . '</td>';
                $rows .= '   <td>' . $ingreso->get('idResponsable') . '</td>';            
                $rows .= '   <td>' . $ingreso->get('idSala') . '</td>'; 
                $rows .= '   <td>' . $ingreso->get('created_at') . '</td>'; 
                $rows .= '   <td>' . $ingreso->get('updated_at') . '</td>'; 
                $rows .= '</tr>';
            }
        } else {
            $rows .= '<tr>';
            $rows .= '   <td colspan="10">No hay datos registrados</td>';
            $rows .= '</tr>';
        }

        $table = '<table>';
        $table .= '  <thead>';
        $table .= '     <tr>';
        $table .= '         <th>Nombre</th>';
        $table .= '         <th>Codigo</th>';
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
    function getFormIngresos()
    {
        $form = '<form action="guardar_ingreso.php" method="post">';
        $form .= '<div>';
        $form .= '    <label for="nombre">Nombre del Estudiante:</label>';
        $form .= '    <input type="text" id="nombreEstudiante" name="nombreEstudiante" required>';
        $form .= '</div>';
        $form .= '<div>';
        $form .= '    <label for="codigoEstudiante">Código del Estudiante:</label>';
        $form .= '    <input type="text" id="codigoEstudiante" name="codigoEstudiante" required>';
        $form .= '</div>';
        $form .= '<div>';
        $form .= '    <label for="fechaIngreso">Fecha de Ingreso:</label>';
        $form .= '    <input type="date" id="fechaIngreso" name="fechaIngreso" required>';
        $form .= '</div>';
        $form .= '<div>';
        $form .= '    <label for="horaIngreso">Hora de Ingreso:</label>';
        $form .= '    <input type="time" id="horaIngreso" name="horaIngreso" required>';
        $form .= '</div>';
        $form .= '<div>';
        $form .= '    <button type="submit">Guardar Ingreso</button>';
        $form .= '</div>';
        $form .= '</form>';

        return $form;
    }

}