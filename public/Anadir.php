<?php 
require '../models/db/salasdb.php';
require '../models/entity/ingresos.php';
require '../models/queries/ingresosQueries.php';
require '../controllers/controladoresIngreso.php';
require '../views/anadirView.php';

use App\Controllers\ControladoresIngreso;
use App\views\anadirViews;

$anadirView = new anadirViews();
$form = $anadirView->getFormIngresos();

$controladorIngreso = new ControladoresIngreso();
$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $datos = [
        'nombreEstudiante' => $_POST['nombreEstudiante'],
        'codigoEstudiante' => $_POST['codigoEstudiante'],
        'fechaIngreso' => $_POST['fechaIngreso'],
        'horaIngreso' => $_POST['horaIngreso'],
        'horaSalida' => $_POST['horaSalida'],
        'idPrograma' => $_POST['idPrograma'],
        'idResponsable' => $_POST['idResponsable'],
        'idSala' => $_POST['idSala'],
    ];

    $resultado = $controladorIngreso->saveIngreso($datos);

    if ($resultado) {
        $message = "<p>Ingreso guardado exitosamente.</p>";
    } else {
        $message = "<p>Error al guardar el ingreso.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Añadir ingreso</title> 
</head>
<body>
    <div class="container">
        <h1>Añadir ingreso</h1> 
        <?php echo $form; ?>
        
        <?php if (!empty($message)) echo $message; ?>

        <h2>Lista de Ingresos</h2>
        <?php 
        $fecha = date('Y-m-d'); 
        echo $anadirView->getTable($fecha); 
        ?>
    </div>
    <script src="js/index.js"></script>
</body>
</html>