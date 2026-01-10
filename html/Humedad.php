<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">

<head>
    <link rel="stylesheet" href="estils/default.css">
    <link rel="stylesheet" href="estils/subpaginas.css">
    
    <div class="barranav">
            <a href="index.php">Inicio</a>
            <a href="Temperatura.php">Temperatura</a>
            <a href="Humedad.php">Humedad</a>
            <a href="atmo.php">Datos Atmosfericos</a>
    </div>
    <?php
    $avghumitat = null;
    include_once "bbdd/funcionsbbdd.php";
    if (isset($_POST['enviar'])) {
        $fecha_seleccionada = $_POST['dia'];
        $avghumitat = avaragehumitat($fecha_seleccionada); 
    }
    ?>

</head>

<body>
    <h1>Humedad</h1>
    <p id="fecha"> Consultando fecha: <?php echo htmlspecialchars($fecha_seleccionada) ?> </p>

    <div id="consultafondo">

        <form method="post" id="consultafecha">
            <input type="date" name="dia" id="dia" value="2025-01-01"><br>
            <button id="botonsub" type="submit" name="enviar">Consultar Humedad</button>
        </form>
        
    </div>

    <div>
        <table id="consulta">
            <tr>
                <th colspan="3"> Humedad </th>
            </tr>
            <tr>
                <th> Promedio </th>
                <th> Minimo </th>
                <th> Maximo </th>
            </tr>
            <tr>
                <th> <?php echo isset($avghumitat['promedio']) ? round($avghumitat['promedio']). "%": "---"; ?> </th>
                <th> <?php echo isset($avghumitat['minimo']) ?  $avghumitat['minimo']. "%": "---"; ?> </th>
                <th> <?php echo isset($avghumitat['maximo']) ?  $avghumitat['maximo']. "%": "---"; ?> </th>
            </tr>
        </table>

        <table id="consulta">
            <tr>
                <th colspan="2">Universal Transverse Mercator</th>
            </tr>
            <tr>
                <th>UTMx</th>
                <th>UTMy</th>
            </tr>
            <tr>
                <th><?php echo isset($avghumitat['UTMX']) ? $avghumitat['UTMX']: "---";?></th>
                <th><?php echo isset($avghumitat['UTMY']) ? $avghumitat['UTMY']: "---";?></th>
            </tr>

        </table>



    </div>

</body>