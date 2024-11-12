<?php
require '../models/db/salasdb.php';
require '../models/entity/ingresos.php';
require '../models/queries/ingresosQueries.php';
require '../controllers/controladoresIngreso.php';
require '../views/anadirView.php';

use  app\views\AnadirViews;

$AnadirViews = new anadirViews ();
$datosFormulario = $_POST;
$smg = $AñadirViews->getMsgNewIngresos($datosFormulario);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
        <h1>Estado de acción</h1>
    </header>
    <section>
        <?php echo $smg;?>
        <br>
        <a href="inicio.php">Volver al inicio</a>
    </section>
</body>
</html>