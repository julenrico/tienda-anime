<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="cabecera">
        <img src="https://uploads.turbologo.com/uploads/design/hq_preview_image/4551835/draw_svg20211224-8647-1vc0v11.svg.png" alt="Logo">
        <h1>Tienda Anime</h1>
    </div>

    <button onclick="window.history.back()='products.php'" class="btn-volver">Volver</button>

    <?php
    if(isset($_GET['id'])) {
        $producto_id = $_GET['id'];

        // Conexión a la base de datos
        $conn = new mysqli("localhost", "admin", "admin", "tienda_anime");
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para obtener los detalles del producto
        $sql = "SELECT * FROM productos WHERE ID_Producto = " . $producto_id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div class='detalle-producto'>";
            echo "<h2>" . $row["Nombre"] . "</h2>";
            echo "<img src='" . $row["Imagen"] . "' alt='" . $row["Nombre"] . "'>";
            echo "<p>" . $row["Descripcion"] . "</p>";
            echo "<p>Precio: $" . $row["Precio"] . "</p>";
            echo "<button class='btn-cesta'>Añadir a la cesta</button>";
            echo "</div>";
        } else {
            echo "Producto no encontrado";
        }

        $conn->close();
    } else {
        echo "No se especificó el producto.";
    }
    ?>

</body>
</html>
