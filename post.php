<?php
// Verificar si se ha enviado el formulario a través del input en html con tipo post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST["nombre"];
    $temporada = $_POST["temporada"];
    $estilo = $_POST["estilo"];
    $talla = $_POST["talla"];
    $precio = $_POST["precio"];
    
    // Credenciales de acceso a la bd
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "clothes";

    //esta linea de código es para que se conecte a la base de datos
    $conn = new mysqli($servername, $username, $password, $database);
    
    // si la conexión falla, mostrar el error
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // Preparar la consulta SQL de inserción
    $sql = "INSERT INTO articulos (nombre, temporada, estilo, talla, precio) VALUES ('$nombre', '$temporada', '$estilo', '$talla', '$precio')";
    
    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        //actualizar la página, ejecuta response.php
        header("Location: index.php");
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
    
    // Cerrar la conexión
    $conn->close();
}
?>