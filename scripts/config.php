<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "churroschurrion";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection falied". $conn->connect_error);
}

// Habilitar reporte de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);