<?php 
require '../models/db/salasdb.php';
require '../models/entity/ingresos.php';
require '../models/queries/ingresosQueries.php';
require '../Controllers/controladoresIngreso.php';
require '../views/anadirView.php';

use App\views\anadirViews;
use App\Controllers\ControladoresIngreso;

$anadirView = new anadirViews();
$title = empty($_GET['cod']) ? 'Consultar ingreso' : 'Consultar ingreso'; // Título de la página

$controladorIngreso = new ControladoresIngreso();
$registros = [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/buscar.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="container">
        <h1><?php echo $title; ?></h1>

        <p>No hay formulario para buscar ingresos.</p> 

        <?php 
        ?>
    </div>
    <script src="js/index.js"></script>
</body>
</html>