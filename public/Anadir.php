<?php 
require '../models/db/salasdb.php';
require '../models/entity/ingresos.php';
require '../models/queries/ingresosQueries.php';
require '../controllers/controladoresIngreso.php';
require '../views/anadirView.php';

use App\views\anadirViews;
use App\Controllers\ControladoresIngreso;

$anadirView = new anadirViews();
$title = empty($_GET['cod']) ? 'Añadir ingreso' : 'Consultar ingreso';
$form = $anadirView->getFormIngresos();
$controladorIngreso = new ControladoresIngreso();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $datos = [
        'nombreEstudiante' => htmlspecialchars($_POST['nombreEstudiante']),
        'codigoEstudiante' => htmlspecialchars($_POST['codigoEstudiante']),
        'idPrograma' => htmlspecialchars($_POST['idPrograma']),
        'fechaIngreso' => htmlspecialchars($_POST['fechaIngreso']),
        'horaIngreso' => htmlspecialchars($_POST['horaIngreso']),
        'horaSalida' => htmlspecialchars($_POST['horaSalida']),
        'idResponsable' => htmlspecialchars($_POST['idResponsable']),
        'idSala' => htmlspecialchars($_POST['idSala']),
    ];

    try {
        $resultado = $controladorIngreso->guardarIngreso($datos);
        if ($resultado) {
            echo '<p>Ingreso guardado exitosamente.</p>';
        } else {
            echo '<p>Error al guardar el ingreso.</p>';
        }
    } catch (\Exception $e) {
        echo '<p>Error inesperado: ' . $e->getMessage() . '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/anadir.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <?php echo $form; ?>

        <h2>Lista de Ingresos</h2>
        <?php 
        $fecha = date('Y-m-d'); 
        echo $anadirView->getTable($fecha); 
        ?>
    </div>
    <script src="js/index.js"></script>
</body>
</html>