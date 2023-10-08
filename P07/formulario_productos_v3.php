<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        ol, ul { 
        list-style-type: none;
        }
    </style>
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>

    <?php
    // Verificar si se proporcionó un ID de producto válido
    if (isset($_GET['id'])) {
        $producto_id = $_GET['id'];
        
        // Conectar a la base de datos
        $link = mysqli_connect("localhost", "root", "1972", "mechastore");

        if ($link === false) {
            die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
        }

        // Consultar la información del producto seleccionado
        $sql = "SELECT * FROM productos WHERE ID = '$producto_id'";
        $result = mysqli_query($link, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                // Mostrar el formulario de edición prellenado
                ?>
                <form id="miFormulario" action="actualizar_producto.php" method="post">
                    <input type="hidden" name="producto_id" value="<?php echo $row['ID']; ?>">
                    <fieldset>
                        <legend>Editar los detalles del producto:</legend>
                        <ul>
                            <li><label>Nombre del producto:</label> <input type="text" name="nuevo_nombre" value="<?php echo $row['Nombre']; ?>"></li>
                            <li><label>Marca:</label> <input type="text" name="nueva_marca" value="<?php echo $row['Marca']; ?>"></li>
                            <li><label>Modelo:</label> <input type="text" name="nuevo_modelo" value="<?php echo $row['Modelo']; ?>"></li>
                            <li><label>Precio:</label> <input type="text" name="nuevo_precio" value="<?php echo $row['Precio']; ?>"></li>
                            <!-- Eliminamos los campos de detalles y unidades -->
                        </ul>
                    </fieldset>
                    <p>
                        <input type="submit" value="Guardar Cambios">
                    </p>
                </form>
                <?php
            } else {
                echo "No se encontró el producto seleccionado.";
            }
        } else {
            echo "Error al consultar la base de datos: " . mysqli_error($link);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($link);
    } else {
        echo "No se proporcionó un ID de producto válido.";
    }
    ?>

</body>
</html>
