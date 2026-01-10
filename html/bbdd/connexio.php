<?php 

$servername = "localhost";
$username = "intermerium";
$password = "TuContraPixa";

try {
  $conn = new PDO("mysql:host=$servername;dbname=meteorologia", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "error";
}

?>