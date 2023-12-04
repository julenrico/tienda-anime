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

    <button onclick="window.location.href='index.php'" class="btn-volver">Volver</button>

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
                    echo "<a href='product.php?id=" . $row["ID_Producto"] . "' class='producto'>";
                    echo "<div class='info-producto'>";
                    echo "<h2>" . $row["Nombre"] . "</h2>";
                    echo "<p>" . $row["Descripcion"] . "</p>";
                    echo "<p>Precio: $" . $row["Precio"] . "</p>";
                    echo "</div>";
                    echo "<div class='imagen-producto'>";
                    echo "<img src='" . $row["Imagen"] . "' alt='" . $row["Nombre"] . "'>";
                    echo "</div>";
                    echo "</a>";
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
