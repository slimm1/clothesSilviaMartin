<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Tabla de Datos</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="mainCointainer">
            <div id="title">
                <h1>Tabla de Datos</h1>
            </div>
            <div id="formContainer">
                <form action="post.php" method="post">

                        <label for="nombre">Nombre:</label>
                        <input id ="nombre" name="nombre" type="text" >

                        <label for="temporada">Temporada:</label>
                        <input id ="temporada" name="temporada" type="text">

                        <label for="estilo">Estilo:</label>
                        <input id="estilo" name="estilo" type="text">

                        <label for="talla">Talla:</label>
                        <input id="talla" name="talla" type="text">

                        <label for="precio">Precio:</label>
                        <input id="precio" name="precio" type="text">
                        
                        <input type="submit" name="Enviar" value="ver">
                </form>
            </div>
            <div id="tableContainer">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Temporada</th>
                        <th>Estilo</th>
                        <th>Talla</th>
                        <th>Precio</th>
                    </tr>
                    <?php include('response.php'); ?>
                </table>
            </div>
        </div>
    </body>
</html>