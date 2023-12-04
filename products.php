<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="cabecera">
        <img src="https://uploads.turbologo.com/uploads/design/hq_preview_image/4551835/draw_svg20211224-8647-1vc0v11.svg.png" alt="Logo">
        <h1>Tienda Anime</h1>
    </div>

    <a href="index.php">Volver</a>

    <div class="contenedor-productos">
    <?php
    if(isset($_GET['categoria'])) {
        $categoria_id = $_GET['categoria'];

        // Conexión a la base de datos
        $conn = new mysqli("localhost", "admin", "admin", "tienda_anime");
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para obtener los productos de la categoría seleccionada
        $sql = "SELECT * FROM productos WHERE ID_Categoria = " . $categoria_id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='producto'>";
                echo "<h2>" . $row["Nombre"] . "</h2>";
                echo "<img src='" . $row["Imagen"] . "' alt='" . $row["Nombre"] . "'>";
                echo "<p>" . $row["Descripcion"] . "</p>";
                echo "<p>Precio: $" . $row["Precio"] . "</p>";
                echo "<button class='btn-cesta'>Añadir a la cesta</button>";
                echo "</div>";
            }
        } else {
            echo "No hay productos en esta categoría";
        }

        $conn->close();
    } else {
        echo "Categoría no especificada.";
    }
    ?>
</div>
</body>
</html>
