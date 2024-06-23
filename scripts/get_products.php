<?php 

include 'config.php';

$sql = "SELECT productos.producto_id, productos.nombre,productos.descripcion,productos.precio, categorias.nombre AS categoria 
        FROM productos 
        JOIN categorias ON productos.categoria_id = categorias.categoria_id";
$result = $conn -> query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="menu-item">';
        echo '<img src="img/' . $row["producto_id"] . '.webp" alt="' . $row["nombre"] . '">';
        echo '<h3>' . $row["nombre"] . '</h3>';
        echo '<p>' . $row["descripcion"] . '</p>';
        echo '<p>' . $row["precio"] . 'MXN</p>';
        echo '</div>';
    }
} else {
    echo "No hay productos disponibles.";
}


$conn -> close();
