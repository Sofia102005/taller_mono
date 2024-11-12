<?php 

require '../models/db/salasdb.php';
require '../models/entity/ingresos.php';
require '../models/queries/ingresosQueries.php';
require '../controllers/controladoresIngreso.php';
require '../views/anadirView.php';

use app\views\anadirViews;

$añadirView = new anadirViews();

date_default_timezone_set('America/Bogota');
$fechaActual = date("Y-m-d");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registro.css">
    <title>Salas de computo</title>
</head>
<body>
    <header>
        <h1>Menú Principal</h1>
        <p>Bienvenido</p>
    </header>

    <main>
        <nav>
            <ul>
                <li><a href="anadir.php">Añadir ingreso</a></li>
                <li><a href="buscar.php">Consultar ingresos</a></li>
            </ul>
        </nav>

        <section>
            <h2>Ingresos del Día</h2>
            <p>Fecha actual: <?= htmlspecialchars($fechaActual) ?></p>
            
        </section>
    </main>

</body>
</html>