<?php
session_start();
if (isset($_SESSION['error'])) {
    echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']);
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}
  
main {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}
  
section h2 {
    font-size: 2em;
    margin-bottom: 20px;
    color: #d9534f;
    text-align: center;
}
  
form label {
    display: block;
    margin: 10px 0 5px;
}
  
form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
  
form button {
    background-color: #d9534f;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s;
}
  
form button:hover {
    background-color: #c9302c;
}
  
p {
    text-align: center;
    margin-top: 10px;
}
  
p a {
    color: #d9534f;
    text-decoration: none;
    transition: color 0.3s;
}
  
p a:hover {
    color: #c9302c;
} 
    </style>
    <title>Iniciar Sesión</title>
</head>
<body>
    <main>
        <section id="login">
            <h2>Iniciar sesión</h2>
            <form action="scripts/Slogin.php" method="post">
              <label for="username">Nombre de usuario</label>
              <input type="text" id="username" name="username" required />

              <label for="password">Contraseña</label>
              <input type="password" id="password" name="password" required />

              <button type="submit">Iniciar Sesión</button>
            </form>
            <p>¿No tienes una cuenta? <a href="register.html">Regístrate aquí</a></p>
        </section>
    </main>
</body>
</html>