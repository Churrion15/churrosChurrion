<?php

session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] != 'admin') {
    header('Location ../login.html');
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_id = $_POST['category_id'];

    $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, categoria_id)
            VALUES ('$name', '$descrption', '$price', '$stock', '$category_id')";
    
    if ($conn ->query($sql) === TRUE) {
        echo "Producto agregado con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn -> error;
    }

    $conn -> close();
} else {
    echo "Metodo no permitido.";
}

