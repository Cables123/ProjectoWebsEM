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
    $avgatmo = null;
    include_once "bbdd/funcionsbbdd.php";
    if (isset($_POST['enviar'])) {
        $fecha_seleccionada = $_POST['dia'];
        $avgatmo = avarageatmo($fecha_seleccionada); 
    }
    ?>

</head>

<body>
    <h1>Datos Atmosfericos</h1>
    <p id="fecha"> Consultando fecha: <?php echo htmlspecialchars($fecha_seleccionada) ?> </p>

    <div id="consultafondo">

        <form method="post" id="consultafecha">
            <input type="date" name="dia" id="dia" value="2025-01-01"><br>
            <button id="botonsub" type="submit" name="enviar">Consultar Datos Atmosfericos</button>
        </form>

    </div>

    <div>
        <table id="consulta">
            <tr>
                <th colspan="3">Velocidad del viento</th>
            </tr>
            
            <tr>
                <th> Promedio </th>
                <th> Minimo </th>
                <th> Maximo </th>
            </tr>

            <tr>
                <th> <?php echo isset($avgatmo['airpromedio']) ? round($avgatmo['airpromedio']). " km/h" : "---"; ?> </th>
                <th> <?php echo isset($avgatmo['airminimo']) ? $avgatmo['airminimo']. " km/h" : "---"; ?> </th>
                <th> <?php echo isset($avgatmo['airmaximo']) ? $avgatmo['airmaximo']. " km/h" : "---"; ?> </th>
            </tr>
        </table>
        <table id="consulta">
            <tr>
                <th colspan="3"> Presion Atmosferica </th>
            </tr>
            <tr>
                <th> Promedio </th>
                <th> Minimo </th>
                <th> Maximo </th>
            </tr>
            <tr>
                <th> <?php echo isset($avgatmo['atmopromedio']) ? round($avgatmo['atmopromedio']). " hPa": "---"; ?> </th>
                <th> <?php echo isset($avgatmo['atmominimo']) ? $avgatmo['atmominimo']. " hPa": "---"; ?> </th>
                <th> <?php echo isset($avgatmo['atmomaximo']) ? $avgatmo['atmomaximo']. " hPa": "---"; ?> </th>
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
                <th><?php echo isset($avgatmo['UTMX']) ? $avgatmo['UTMX']: "---"?></th>
                <th><?php echo isset($avgatmo['UTMY']) ? $avgatmo['UTMY']: "---"?></th>
            </tr>

        </table>


    </div>

</body>
