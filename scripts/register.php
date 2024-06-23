<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] ==  "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Verifica si la contraseñas coinciden
    if ($password != $password_confirm) {
        echo "Las contraseñas no coinciden";
        exit();
    }

    // Verifica si las contraseñas cumples con los criterios de seguridad (por ejemplo, logitud mínima)
    if (strlen($password) < 8) {
        echo "La contraseña debe tener al menos 8 caracteres";
        exit();
    }

    // Verificar si el nombre de usuaruo ya esta en uso
    $stmt = $conn -> prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt -> bind_param("s", $username);
    $stmt -> execute();
    $result = $stmt -> get_result();

    if ($result->num_rows > 0) {
        echo "El nombre de ususario ya esta en uso.";
        exit();
    }

    // HAsh de la contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar usuario a las base de datos
    $stmt = $conn->prepare("INSERT INTO usuarios (username, password, rol) VALUES (?, ?, 'cliente')");
    $stmt->bind_param("ss", $username, $password_hash);

    if ($stmt -> execute()) {
        echo "Registro exitoso.";
        header('Location: ../login.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn -> error;
    }

    $stmt -> close();
    $conn -> close();
} else {
    echo "Metodo no permitido.";
}
