<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
          background-color: #d9534f;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header .logo img {
            height: 40px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        .hero {
            position: relative;
            text-align: center;
            padding: 50px 20px;
            background: url('img/gatita-negra-comiendo-churros-con-brigadeiros-.png') no-repeat center center;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .hero .title {
            font-size: 4em;
            margin-bottom: 10px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .hero p {
            font-size: 1.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .cta-button {
            background-color: #d9534f;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 1.2em;
        }

        .cta-button:hover {
            background-color: #c9302c;
        }

        section {
            padding: 20px;
            background-color: #fff;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 2em;
            margin-bottom: 10px;
            color: #d9534f;
        }

        .menu-container, #map {
            padding: 20px;
        }

        .menu-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 10px;
  padding: 20px;
}

.menu-item {
  position: relative;
  width: 300px;
  height: 450px; /* Ajusta la altura según tu preferencia */
  overflow: hidden;
  margin: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  cursor: pointer;
}

.menu-item img {
  width: 100%;
  height: auto;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.menu-item:hover img {
  transform: scale(1.1) translateY(-10%);
}

.menu-item-content {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  background-color: rgba(0, 0, 0, 0.7);
  color: white;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.menu-item:hover .menu-item-content {
  opacity: 1;
}


        form label {
            display: block;
            margin: 10px 0 5px;
        }

        form input, form select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            background-color: #d9534f;
            color: #fff;
            width: 100%;
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #c9302c;
        }

        footer {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }

        footer .social-media a {
            text-decoration: none;
            color: #d9534f;
            margin: 0 10px;
        }
    </style>
    <title>Churros Churrion</title>
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="img/14x28.jpg" alt="Churros Churrion" />
      </div>
      <nav id="main-nav">
        <ul class="nav-left">
          <li><a href="#home">Inicio</a></li>
          <li><a href="#menu">Menú</a></li>
          <li><a href="#order">Pedidos en línea</a></li>
          <li><a href="#locations">Ubicaciones</a></li>
          <li><a href="#contact">Contacto</a></li>
        </ul>
        <ul>
          <?php if (isset($_SESSION['usuario_id'])): ?>
            <li><a href="scripts/logout.php">Cerrar Sesión</a></li>
            <li><a href="#">Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
          <?php else: ?>
            <li><a href="scripts/Slogin.php">Inicar Sesión</a></li>
            <li><a href="scripts/register.php">Registrarse</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>

    <section id="home">
      <div class="hero">
        <div class="fading-effect">
          <div class="title">CHURROS CHURRION</div>
        </div>
        <h1>¡Los mejores churros en tu ciudad!</h1>
        <p>Crujientes por fuera, suaves por dentro. ¡Pruébalos hoy!</p>
        <a href="#order" class="cta-button">Haz tu pedido ahora</a>
      </div>
    </section>

    <section id="menu">
      <h2>Menú</h2>
      <div class="menu-container">
        <?php include 'scripts/get_products.php'; ?>
      </div>
    </section>

    <section id="order">
      <h2>Pedidos en línea</h2>
      <p>
        En Churros Churrion, hacemos que ordenar tus churros favoritos sea rápido y fácil. Simplemente completa nuestro formulario de pedido en línea con tus detalles y preferencias, y estaremos listos para preparar tus churros frescos y deliciosos. ¡Haz tu pedido ahora y disfruta de la experiencia de Churros Churrion en la comodidad de tu hogar!
      </p>
      <!-- Formulario de pedido -->
    </section>

    <section id="locations">
      <h2>Ubicaciones</h2>
      <div id="map">
        Con múltiples ubicaciones convenientes en toda la ciudad, Churros Churrion está siempre cerca para satisfacer tus antojos de churros. Desde el corazón del centro hasta los barrios más alejados, nuestras tiendas te esperan con los mejores churros crujientes. Consulta nuestro mapa a continuación para encontrar la ubicación más cercana a ti y ven a visitarnos para disfrutar de una experiencia de churros única.
      </div>
      <!-- Información de ubicaciones -->
    </section>

    <section id="order">
    <h2>Pedidos en línea</h2>
    <?php if (isset($_SESSION['usuario_id'])): ?>
        <form action="scripts/process_orden.php" method="post">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" required />

            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" required />

            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" required />

            <label for="direccion">Dirección</label>
            <input type="text" id="direccion" name="direccion" required />

            <label for="ciudad">Ciudad</label>
            <input type="text" id="ciudad" name="ciudad" required />

            <label for="pais">País</label>
            <input type="text" id="pais" name="pais" required />

            <label for="codigo_postal">Código Postal</label>
            <input type="text" id="codigo_postal" name="codigo_postal" required />

            <label for="product_id">Producto</label>
            <select id="product_id" name="product_id" required>
                <?php
                include 'scripts/config.php';
                $sql = "SELECT producto_id, nombre FROM productos";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["producto_id"] . '">' . $row["nombre"] . '</option>';
                    }
                }
                $conn->close();
                ?>
            </select>

            <label for="cantidad">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" required />

            <button type="submit">Enviar</button>
        </form>
    <?php else: ?>
        <p>Por favor, <a href="login.php">inicia sesión</a> para realizar un pedido.</p>
    <?php endif; ?>
</section>

    <footer>
      <div class="social-media">
        <a href="docs/doc.html">Documentación</a>
        <a href="#">Facebook</a>
        <a href="#">Instagram</a>
        <a href="#">Twitter</a>
    </footer>

    <script src="js/script.js"></script>
  </body>
</html>
