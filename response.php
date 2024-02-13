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

    $consulta = "SELECT * FROM nombre_tabla";
    $resultado = $conexion->query($consulta);

    // Insertar nuevo Articulo en la base de datos
    $sql = "INSERT INTO articulos (nombre, temporada, estilo, talla, precio) VALUES ('$nombre', '$temporada','$estilo','$talla','$precio')";

    if ($conn->query($sql) === TRUE) {
        echo "Artículo agregado correctamente";
    } else {
        echo "Error al agregar el artículo: " . $conn->error;
    }

    $conn->close();
}
?>