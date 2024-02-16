<?php
// Credenciales de acceso a la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$database = "clothes";

//crea la conexion a traves de mysqli
$conn = new mysqli($servername, $username, $password, $database);

// si la conexion falla, mostrar el error
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// recoge los datos de la tabla articulos
$sql = "SELECT id, nombre, temporada, estilo, talla, precio FROM articulos";
$result = $conn->query($sql);

// si el numero de filas es mayor a 0, mostrar los datos
if ($result->num_rows > 0) {
    // salida de cada fila. fetch_assoc() recoge una fila de resultados como un array asociativo
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
