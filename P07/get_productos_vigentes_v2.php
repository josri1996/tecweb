<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "1972"; 
$dbname = "marketzone"; 

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se proporcionó el parámetro "tope"
if (isset($_GET['tope'])) {
    $tope = $_GET['tope'];

    // Validar que "tope" sea un número
    if (!is_numeric($tope)) {
        die('El parámetro "tope" debe ser un número válido.');
    }

    // Consulta SQL para seleccionar productos que cumplan con el "tope"
    $sql = "SELECT * FROM productos WHERE unidades <= $tope";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    // Comprobar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Encabezado del documento XHTML
        echo '<?xml version="1.0" encoding="UTF-8"?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Productos</title>
        </head>
        <body>';

        // Crear una tabla XHTML para mostrar los productos
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Nombre</th>';
        echo '<th>Marca</th>';
        echo '<th>Modelo</th>';
        echo '<th>Precio</th>';
        echo '<th>Detalles</th>';
        echo '<th>Unidades</th>';
        echo '<th>Imagen</th>';
        echo '</tr>';

        // Imprimir los productos en la tabla XHTML
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["nombre"] . '</td>';
            echo '<td>' . $row["marca"] . '</td>';
            echo '<td>' . $row["modelo"] . '</td>';
            echo '<td>' . $row["precio"] . '</td>';
            echo '<td>' . $row["detalles"] . '</td>';
            echo '<td>' . $row["unidades"] . '</td>';
            echo '<td><img src="' . $row["imagen"] . '" alt="Imagen del producto" width="100" height="100"></td>';
            echo '</tr>';
        }

        echo '</table>';

        // Cierre del documento XHTML
        echo '</body></html>';
    } else {
        echo "No se encontraron productos que cumplan con el criterio de tope.";
    }
} else {
    echo 'El parámetro "tope" no ha sido proporcionado.';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
