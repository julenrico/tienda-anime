<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Figuritas de Anime</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="cabecera">
        <img src="https://uploads.turbologo.com/uploads/design/hq_preview_image/4551835/draw_svg20211224-8647-1vc0v11.svg.png" alt="Logo">
        <h1>Tienda Anime</h1>
    </div>

    <div class="contenedor-categorias">
        <?php
        // Conectar a la base de datos
        $servername = "localhost";
        $username = "admin";
        $password = "admin";
        $dbname = "tienda_anime";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consultar las categorías
        $sql = "SELECT * FROM categorias";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<a href='products.php?categoria=" . $row["ID_Categoria"] . "' class='categoria'>";
                echo "<img src='" . $row["Imagen"] . "' alt='" . $row["Nombre"] . "'>";
                echo "<h2>" . $row["Nombre"] . "</h2>";
                echo "</a>";
            }
        } else {
            echo "0 resultados";
        }

        $conn->close();
        ?>
    </div>

</body>
</html>
