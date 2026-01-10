
<?php
// Creado con la ayuda de Gemini 3 esto solo se ha usado para meter dummy data.
// Configuración de la conexión
$host = "localhost";
$user = "intermerium";
$pass = "TuContraPixa";
$db   = "meteorologia";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Coordenadas fijas de la estación (Requisito UTM) [cite: 10, 32]
$utmx = 419234.50;
$utmy = 4582312.10;

// Bucle para cada día del año 2025
$inicio = new DateTime('2025-01-01 00:00:00');
$fin    = new DateTime('2025-12-31 23:59:59');
$intervalo = new DateInterval('PT3H'); // Inserta un registro cada 3 horas
$periodo = new DatePeriod($inicio, $intervalo, $fin);

foreach ($periodo as $fecha) {
    $fechaStr = $fecha->format('Y-m-d H:i:s');
    $mes = (int)$fecha->format('m');

    // Simulación lógica de temperatura según el mes (Estacionalidad)
    if ($mes >= 6 && $mes <= 8) { // Verano
        $temp = rand(25, 38) + (rand(0, 9) / 10);
    } elseif ($mes == 12 || $mes <= 2) { // Invierno
        $temp = rand(2, 12) + (rand(0, 9) / 10);
    } else { // Primavera/Otoño
        $temp = rand(13, 24) + (rand(0, 9) / 10);
    }

    $humedad = rand(30, 90);
    $presion = rand(1000, 1025);
    $viento  = rand(0, 50);

    $sql = "INSERT INTO registros (fecha_hora, utmx, utmy, temperatura, humedad, presion, viento) 
            VALUES ('$fechaStr', $utmx, $utmy, $temp, $humedad, $presion, $viento)";
    
    $conn->query($sql);
}

echo "Datos de 2025 insertados correctamente.";
$conn->close();
?>