
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Creado con la ayuda de Gemini 3 esto solo se ha usado para meter dummy data.
// Configuracion de la conexion
$host = "localhost";
$user = "usuario"; // el usuario tiene que tener permisos de insert recuerda! el intermerarium no funcionara!
$pass = "contra";
$db   = "meteorologia";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexion: " . $conn->connect_error);
}

// Coordenadas fijas de la estacion (Requisito UTM) [cite: 10, 32]
$utmx = 419234.50;
$utmy = 4582312.10;

// Bucle para cada dia del ano 2025
$inicio = new DateTime('2025-01-01 00:00:00');
$fin    = new DateTime('2025-12-31 23:59:59');
$intervalo = new DateInterval('PT3H'); // Inserta un registro cada 3 horas
$periodo = new DatePeriod($inicio, $intervalo, $fin);

foreach ($periodo as $fecha) {
    $fechaStr = $fecha->format('Y-m-d H:i:s');
    $mes = (int)$fecha->format('m');

    // Simulacion logica de temperatura según el mes (Estacionalidad)
    if ($mes >= 6 && $mes <= 8) { // Verano
        $temp = rand(25, 38) + (rand(0, 9) / 10);
    } elseif ($mes == 12 || $mes <= 2) { // Invierno
        $temp = rand(2, 12) + (rand(0, 9) / 10);
    } else { // Primavera/Otono
        $temp = rand(13, 24) + (rand(0, 9) / 10);
    }

    $humedad = rand(30, 90);
    $presion = rand(1000, 1025);
    $viento  = rand(0, 50);

    $sql = "INSERT INTO datos (fecha_hora, utmx, utmy, temperatura, humedad, presion, viento) 
            VALUES ('$fechaStr', $utmx, $utmy, $temp, $humedad, $presion, $viento)";
    
    if (!mysqli_query($conn,$sql)) {
    echo("Error description: " . mysqli_error($conn));
    
    $conn->query($sql);

}
}

echo "Datos de 2025 insertados correctamente.";
$conn->close();
?>