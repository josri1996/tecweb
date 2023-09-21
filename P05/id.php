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

// Consulta SQL para seleccionar todos los productos
$sql = "SELECT * FROM productos";

// Ejecutar la consulta
$result = $conn->query($sql);

// Comprobar si se encontraron resultados
if ($result->num_rows > 0) {
    // Imprimir los productos
    while ($row = $result->fetch_assoc()) {
        echo '<div style="overflow: hidden;">'; // Contenedor para alinear a la derecha
        echo '<div style="float: right; margin-left: 10px; width: 200px;">'; // Contenedor para la imagen
        echo '<img src="' . $row["imagen"] . '" alt="Imagen del producto" width="200" height="200"><br>';
        echo '</div>'; // Cierre del contenedor de la imagen
        echo '<div>'; // Contenedor para el contenido a la izquierda de la imagen
        echo "ID: " . $row["id"] . "<br>";
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "Marca: " . $row["marca"] . "<br>";
        echo "Modelo: " . $row["modelo"] . "<br>";
        echo "Precio: $" . $row["precio"] . "<br>";
        echo "Detalles: " . $row["detalles"] . "<br>";
        echo "Unidades: " . $row["unidades"] . "<br>";
        echo '</div>'; // Cierre del contenedor del contenido a la izquierda de la imagen
        echo '</div>'; // Cierre del contenedor principal

        echo "<hr>";
    }
} else {
    echo "No se encontraron productos.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
