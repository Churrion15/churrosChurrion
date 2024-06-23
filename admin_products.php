<?php 
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] != 'admin') {
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar productos</title>
</head>
<body>
    <section id="add-product">
        <h2>Agregar productos</h2>
        <form action="scripts/add_product.php" method="post">
            <label for="name">Nombre del producto</label>
            <input type="text" id="name" name="name" required />

            <label for="description">descripción</label>
            <textarea name="description" id="description" required></textarea>

            <label for="price">Precio</label>
            <input type="text" step="0.01" id="price" name="price" required />

            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" required />

            <label for="category_id">Categoría</label>
            <select name="category_id" id="category_id">
                <?php
                include 'scripts/config.php';
                $sql = "SELECT categoria_id, nombre FROM categorias";
                $result = $conn -> query($sql);

                if ($result -> num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        echo '<option value="' . $row["categoria_id"] . '">' . $row["nombre"] . '</option>';
                    }
                }
                $conn -> close();
                ?>
            </select>

            <button type="submit">Agregar</button>
        </form>
    </section>
</body>
</html>