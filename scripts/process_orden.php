<?php 

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $pais = $_POST["pais"];
    $codigo_postal = $_POST["codigo_postal"];
    $producto_id = $_POST["product_id"];
    $cantidad = $_POST["cantidad"];

    // Insertar cliente
    $sql = "INSER INTO clientes (nombre, apellido, email, telefono, direccion, ciudad, pais, codigo_postal)
            VALUES ('$nombre', '', '$email', '$telefono', '$direccion', '$ciudad', '$pais', '$codigo_postal')";
    if ($conn -> query($sql) === TRUE) {
        $cliente_id = $conn -> insert_id;

        // Insertar pedido
        $sql = "INSERT INTO pedidos (cliente_id, fecha_pedido, total, estado)
                VALUES ($cliente_id, NOW(), 0, 'pendiente')";
        
        if ($conn -> query($sql) === TRUE) {
            $pedido_id = $conn -> insert_id;

            // Obtener el presio del producto
            $sql = "SELECT precio FROM productos WHERE productos_id = $producto_id";
            $result = $conn -> query($sql);
            if ($result -> num_rows > 0) {
                $row = $result -> fetch_assoc();
                $precio_unitario = $row["precio"];

                // Insertar detalles del pedido
                $sql = "INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, precio_unitario)
                VALUES ($pedido_id, $producto_id, $contidad, $precio_unitario)";
                if ($conn -> query($sql) === TRUE) {
                    // Actualizar total del pedido
                    $total = $cantidad * $precio_unitario;
                    $sql = "UPDATE pedidos SET total = $total WHERE pedidos_id = $pedidos_id";
                    $conn -> query($sql);

                    echo "Pedido realizado.";
                } else {
                    echo "ERROR" . $sql . "<br>" . $conn -> error;
                }
            } else {
                echo "Producto no encontrado.";
            }
        } else {
            echo "ERROR" . $sql . "<br>" . $conn -> error;
        }
    } else {
        echo "ERROR" . $sql . "<br>" . $conn -> error;
    }

    $conn -> close();
} else {
    echo "Metodo no permitido.";
}