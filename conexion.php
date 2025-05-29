<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "yessman_db";

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>