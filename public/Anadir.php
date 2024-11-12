<?php 
require '../models/db/salasdb.php';
require '../models/entity/ingresos.php';
require '../models/queries/ingresosQueries.php';
require '../controllers/controladoresIngreso.php';
require '../views/anadirView.php';


use app\views\anadirViews;

$AnadirViews = new  anadirViews();
$title = empty($_GET['cod'])?'Añadir ingreso':'';
$form = $AnadirViews->getFormIngresos();


$anadirView = new anadirViews();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Añadir Ingreso de Estudiante</title>
   
</head>
<body>
    <div class="container">
        <h1>Añadir Ingreso de Estudiante</h1>
        <?php echo $anadirView->getFormIngresos(); ?>

        <h2>Lista de Ingresos</h2>
        <?php 
        $fecha = '1';
        echo $anadirView->getTable($fecha); ?>
    </div>
    <script src="js/index.js"></script>
</body>
