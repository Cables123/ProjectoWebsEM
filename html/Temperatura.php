<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estils/default.css">
    <link rel="stylesheet" href="estils/subtemp.css">
</head>

<body>
    <div class="barranav">
        <a href="index.php">Inicio</a>
        <a href="Temperatura.php">Temperatura</a>
        <a href="Humedad.php">Humedad</a>
        <a href="atmo.php">Datos Atmosfericos</a>
    </div>

    <?php
    include_once "bbdd/funcionsbbdd.php";
    $avgtemperatura = null;
    $avgtempmes = null;


    if (isset($_POST['enviar'])) {
        $fecha_seleccionada = $_POST['dia'];
        $avgtempmes = avaragemestemperatura($fecha_seleccionada);
        $avgtemperatura = avaragetemperatura($fecha_seleccionada); 
    }
    ?>
    <h1>Temperatura</h1>
    <p id="fecha"> Consultando fecha: <?php echo htmlspecialchars($fecha_seleccionada) ?> </p>

    <div id="consultafondo">
        <form method="post" id="consultafecha">
            <input type="date" name="dia" id="dia" value="2025-01-01"><br>
            <button id="botonsub" type="submit" name="enviar">Consultar Temperatura</button>
        </form>
    </div>

    <div class="contenedor-tablas">

        <table id="consulta">
            <tr><th colspan="3"> Temperatura Diaria </th></tr>
            <tr>
                <th> Promedio </th>
                <th> Minimo </th>
                <th> Maximo </th>
            </tr>
            <tr>
                <th> <?php echo isset($avgtemperatura['promedio']) ? round($avgtemperatura['promedio']) . "ºC" : "---"; ?> </th>
                <th> <?php echo isset($avgtemperatura['minimo']) ? $avgtemperatura['minimo'] . "ºC" : "---"; ?> </th>
                <th> <?php echo isset($avgtemperatura['maximo']) ? $avgtemperatura['maximo'] . "ºC" : "---"; ?> </th>
            </tr>
        </table>

        <table id="consulta">
            <tr><th colspan="2">UTM (Día)</th></tr>
            <tr>
                <th>UTMx</th>
                <th>UTMy</th>
            </tr>
            <tr>
                <th><?php echo isset($avgtemperatura['UTMX']) ? $avgtemperatura['UTMX'] : "---"; ?></th>
                <th><?php echo isset($avgtemperatura['UTMY']) ? $avgtemperatura['UTMY'] : "---"; ?></th>
            </tr>
        </table>

        <table id="consulta" class="tabla-mensual">
            <tr><th colspan="2">Resumen del Mes</th></tr>
            <tr>
                <th>Baja del Mes</th>
                <th>Alta del Mes</th>
            </tr>
            <tr>
                <th><?php echo isset($avgtempmes['minimo']) ? $avgtempmes['minimo'] . "ºC" : "---"; ?></th>
                <th><?php echo isset($avgtempmes['maximo']) ? $avgtempmes['maximo'] . "ºC" : "---"; ?></th>
            </tr>
        </table>

    </div> 
</body>
</html>