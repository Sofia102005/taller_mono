<?php 
require '../models/db/salasdb.php';
require '../models/entity/ingresos.php';
require '../models/queries/ingresosQueries.php';
require '../controllers/controladoresIngreso.php';
require '../views/anadirView.php';

use App\views\anadirViews;

$anadirView = new anadirViews();
$title = empty($_GET['cod']) ? 'Añadir ingreso' : 'Consultar ingreso';
$form = $anadirView->getFormIngresos();

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