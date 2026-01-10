<?php

function ultimatemperatura() {
    include_once "connexio.php";

    $stmt = $conn->prepare("SELECT temperatura FROM meteorologia.datos ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    
    $temperatura = $stmt->fetchColumn();

    return $temperatura;
} 

function ultimahumitat() {
    include_once "connexio.php";

    $stmt = $conn->prepare("SELECT humedad FROM meteorologia.datos ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    
    $humedad = $stmt->fetchColumn();

    return $humedad;
} 

function avaragehumitat($fecha) {
    include_once "connexio.php";
    $stmt = $conn->prepare("SELECT AVG(`humedad`) as promedio, MIN(`humedad`) as minimo, MAX(`humedad`) as maximo, MIN(`utmx`) as UTMX, MAX(`utmy`) as UTMY FROM `datos` WHERE `fecha_hora` >= CONCAT(?, ' 00:00:00') AND `fecha_hora` <= CONCAT(?, ' 23:59:59')");
    $stmt->execute([$fecha, $fecha]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function avaragetemperatura($fecha) {
    include "connexio.php";

    $stmt = $conn->prepare("SELECT AVG(`temperatura`) as promedio, MIN(`temperatura`) as minimo, MAX(`temperatura`) as maximo, MIN(`utmx`) as UTMX, MAX(`utmy`) as UTMY FROM `datos` WHERE `fecha_hora` >= CONCAT(?, ' 00:00:00') AND `fecha_hora` <= CONCAT(?, ' 23:59:59')");
    $stmt->execute([$fecha, $fecha]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function avaragemestemperatura($fecha) {
    include "connexio.php";
    
    $fechatratada = strtotime($fecha);
    $primer_dia = date("Y-m-01", $fechatratada);
    $ultimo_dia = date("Y-m-t", $fechatratada);
    
    $stmt = $conn->prepare("SELECT MIN(`temperatura`) as minimo, MAX(`temperatura`) as maximo FROM `datos` WHERE `fecha_hora` >= CONCAT(?, ' 00:00:00') AND `fecha_hora` <= CONCAT(?, ' 23:59:59')");
    $stmt->execute([$primer_dia, $ultimo_dia]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function avarageatmo($fecha) {
    include_once "connexio.php";
    $stmt = $conn->prepare("SELECT AVG(`presion`) as atmopromedio, MIN(`presion`) as atmominimo, MAX(`presion`) as atmomaximo, AVG(`viento`) as airpromedio, MIN(`viento`) as airminimo, MAX(`viento`) as airmaximo, MIN(`utmx`) as UTMX, MAX(`utmy`) as UTMY  FROM `datos` WHERE `fecha_hora` >= CONCAT(?, ' 00:00:00') AND `fecha_hora` <= CONCAT(?, ' 23:59:59')");
    $stmt->execute([$fecha, $fecha]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
 
function temperaturareciente() {
    include "connexio.php";

    $stmt = $conn->prepare("SELECT * FROM `datos` ORDER BY id DESC LIMIT 5");
    $stmt->execute();

    return $stmt->fetchall(PDO::FETCH_ASSOC);

}

?>