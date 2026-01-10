<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">

<head>
    <link rel="stylesheet" href="estils/default.css">
    <link rel="stylesheet" href="estils/carrusel.css">
    
    <div class="barranav">
            <a href="index.php">Inicio</a>
            <a href="Temperatura.php">Temperatura</a>
            <a href="Humedad.php">Humedad</a>
            <a href="atmo.php">Datos Atmosfericos</a>
    </div>
    <?php
        include_once "bbdd/funcionsbbdd.php";
        if (isset($_POST['ejecutartemp'])) {
        $ultitemp = ultimatemperatura();
        } elseif (isset($_POST['ejecutarhumitat'])) {
        $ultihumitat = ultimahumitat();
        }
    ?>
<h1>Estacion Meteorológica Sa Palomera</h1>

</head>

<body>
    <h2>QuickLook</h2>

    <div id="mainbody">

    <table id="quicklook">
    <tr>
        <th colspan="3">QuickLook™</th>
    </tr>
    <tr>
        <th>
            <form method="post">
                <button type="submit" name="ejecutartemp">Ultima Temperatura</button>
            </form>
        </th>

        <th id="resultadoholder">
            <?php
                if (isset($_POST['ejecutartemp'])) {
                    echo $ultitemp . " ºC";

                } elseif (isset($_POST['ejecutarhumitat'])) {
                    echo $ultihumitat . " %";
                }   
            ?>
        </th>

        <th>
            <form method="post">
                <button type="submit" name="ejecutarhumitat">Ultima Humitat</button>
            </form>
        </th>

    </tr>
    </table>

    </div>

    <h2>Acerca del Proyecto</h2>
    <div id="relleno">

        <p id="muchotexto">
        ¡Bienvenidos a la página meteorológica de Victor Redel!  <br>
        Esta página es parte del proyecto de webs de CFGS ASIR del Sa Palomera, una web hecha con PHP + HTML5 + CSS + SQL. <br>

        Tenemos un Apache con los módulos de PHP que hostea el servidor web, HTML lo usamos para la estructura, mientras que PHP es nuestro procesador de texto, que interpreta los arrays que sacamos de la base de datos MySQL para mostrar la información.

        Yo he optado por un diseño modular que permite adaptar las funciones a lo que sea necesario, ya que al final solo sacamos la parte de array que nos interese. <br>

        No sé qué más poner, viva el Girona, supongo.
        </p>


        <div class="slider">
        
        <a href="#slide-1">1</a>
        <a href="#slide-2">2</a>
        <a href="#slide-3">3</a>

        <div class="slides">
            <div id="slide-1">
            <img src="/imatges/html5.png" alt="HTML5 Logo">
            
            </div>
            <div id="slide-2">
            <img src="/imatges/php.png" alt="PHP Logo">
            
            </div>
            <div id="slide-3">
            <img src="/imatges/mysql.png" alt="MySQL Logo">
            
            </div>
        </div>
        </div>


        
    </div>

    <h2>Ultimos Registros</h2>
    <div id="mainbody">
        <table id="tablarecientes">
            <tr>
                <th>Fecha/Hora</th>
                <th>Temperatura</th>
                <th>Humedad</th>
                <th>Presión Atm</th>
                <th>Viento</th>
            </tr>
            <?php 
            include_once "bbdd/funcionsbbdd.php";
            $recientes = temperaturareciente();

            for($i = 0; $i < count($recientes); ++$i) {
                echo "<tr>";
                echo "<td>" . $recientes[$i]['fecha_hora'] . "</td>";
                echo "<td>" . $recientes[$i]['temperatura'] . " ºC</td>";
                echo "<td>" . $recientes[$i]['humedad'] . " %</td>";
                echo "<td>" . $recientes[$i]['presion'] . " hPa</td>";
                echo "<td>" . $recientes[$i]['viento'] . " km/h</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>




</body>