<?php 
// Verificar si la sesión ya está iniciada antes de llamar a session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'config.php';

try {
    // Verifica si la tabla 'usuarios' existe
    $result = $conn->query("SHOW TABLES LIKE 'usuarios'");
    if ($result->num_rows == 0) {
        throw new Exception("La tabla 'usuarios' no existe en la base de datos.");
    }

    // Procesa la solicitud de inicio de sesión si el método de la solicitud es POST 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validar campos vacíos
        if(empty($username) || empty($password)) {
            $_SESSION['error'] = "Por favor, complete ambos campos.";
            header("Location: ../login.php");
            exit();
        }
        
        $sql = "SELECT usuario_id, password, rol FROM usuarios WHERE username = ?";
        
        // Preparar la declaración para evitar inyección SQL
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['usuario_id'] = $row['usuario_id'];
                $_SESSION['username'] = $username;
                $_SESSION['rol'] = $row['rol'];
                header("Location: ../index.php"); // Redirigir a la página principal
                exit();
            } else {
                $_SESSION['error'] = "Contraseña incorrecta.";
                header("Location: ../login.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Usuario no encontrado.";
            header("Location: ../login.php");
        }
    
        $stmt->close();
        $conn->close();
    } else {
        $_SESSION['error'] = "Método no permitido. Método recibido: " . $_SERVER["REQUEST_METHOD"];
        header("Location: ../login.php");
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    header("Location: ../login.php");
    exit();
}