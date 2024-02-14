<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST["nombre"];
    $temporada = $_POST["temporada"];
    $estilo = $_POST["estilo"];
    $talla = $_POST["talla"];
    $precio = $_POST["precio"];
    
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "clothes";
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // Preparar la consulta SQL de inserción
    $sql = "INSERT INTO articulos (nombre, temporada, estilo, talla, precio) VALUES ('$nombre', '$temporada', '$estilo', '$talla', '$precio')";
    
    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        mostrarDatosArticulos();
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
    
    // Cerrar la conexión
    $conn->close();
}

function mostrarDatosArticulos() {
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "clothes";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para seleccionar los datos
    $sql = "SELECT id, nombre, temporada, estilo, talla, precio FROM articulos";
    $result = $conn->query($sql);

    // Generar filas de tabla con datos recuperados
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["temporada"] . "</td>";
            echo "<td>" . $row["estilo"] . "</td>";
            echo "<td>" . $row["talla"] . "</td>";
            echo "<td>" . $row["precio"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No hay resultados</td></tr>";
    }

    // Cerrar la conexión
    $conn->close();
}
?>