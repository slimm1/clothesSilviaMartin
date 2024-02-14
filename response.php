<?php
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
?>
