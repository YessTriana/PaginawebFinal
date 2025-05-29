<?php
$host = "localhost";
$db = "yessman_db";
$user = "root";
$pass = "Jaztri20.";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>