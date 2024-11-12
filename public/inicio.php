<?php 

require '../models/db/salasdb.php';
require '../models/entity/ingresos.php';
require '../models/queries/ingresosQueries.php';
require '../controllers/controladoresIngreso.php';
require '../views/anadirView.php';

use app\views\anadirViews;

$anadirView = new anadirViews();

date_default_timezone_set('America/Bogota');
$fechaActual = date("Y-m-d");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registro.css">
    <title>Salas de Cómputo</title>
</head>
<body>
    <header>
        <h1>Menú Principal Salas</h1>
        <p>Bienvenido</p>
    </header>

    <main>
        <nav>
        <ul>
        <li><a href="anadir.php" class="button">Añadir ingreso</a></li>
        <br>
        <li><a href="buscar.php" class="button">Consultar ingresos</a></li>
        </ul>
        </nav>

        <section>

            <h2>Lista de Ingresos</h2>
            <?php 
            
            echo $anadirView->getTable($fechaActual); 
            ?>

<h3>Ingresos del Día</h3>
<p>Fecha actual: <?= htmlspecialchars($fechaActual, ENT_QUOTES, 'UTF-8') ?></p>
        </section>
    </main>

</body>
</html>