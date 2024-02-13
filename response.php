<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $temporada = $_POST["temporada"];
    $estilo = $_POST["estilo"];
    $talla = $_POST["talla"];
    $precio = $_POST["precio"];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root@localhost";
    $password = "root";
    $dbname = "clothes";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $getAll = "SELECT * FROM nombre_tabla";
    $resultado = $conexion->query($getAll);

    // Creación de la tabla HTML
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Temporada</th>
            <th>Estilo</th>
            <th>Talla</th>
            <th>Precio</th>
        </tr>";

    // Estructura de insercción de datos
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>" . $fila['id'] . "</td>
                <td>" . $fila['nombre'] . "</td>
                <td>" . $fila['temporada'] . "</td>
                <td>" . $fila['estilo'] . "</td>
                <td>" . $fila['talla'] . "</td>
                <td>" . $fila['precio'] . "</td>
                </tr>";
    }

    echo "</table>";
    
    // Insertar nuevo Articulo en la base de datos
    $queryInsert = "INSERT INTO articulos (nombre, temporada, estilo, talla, precio) VALUES ('$nombre', '$temporada','$estilo','$talla','$precio')";

    if ($conn->query($queryInsert) === TRUE) {
        echo "Artículo agregado correctamente";
        <?php include('response.php'); ?>
    } else {
        echo "Error al agregar el artículo: " . $conn->error;
    }

    $conn->close();
}
?>