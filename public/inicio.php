<?php
require '../Models/db/salasdb.php';
require '../Models/queries/RegistroQuery.php';
require '../Models/entity/Registro.php';
require '../Controllers/RegistroController.php';
require '../Views/IngresoView.php';

use App\views\IngresoView;

$ingresoView = new IngresoView();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ingresos a Salas</title>
    <link rel="stylesheet" href="css/registro.css"> 
</head>
<body>
    <header> 
        <h1>Registro de Ingresos</h1>
    </header>
    <section>
        <?php
            echo $ingresoView->formularioBusquedaIngresos();  
            echo $ingresoView->tablaIngresos();    
        ?>           
    </section>
</body>
</html>