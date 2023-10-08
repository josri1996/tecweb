<?php
// Verificar si se ha enviado un formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados desde el formulario
    $producto_id = $_POST['producto_id'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nueva_marca = $_POST['nueva_marca'];
    $nuevo_modelo = $_POST['nuevo_modelo'];
    $nuevo_precio = $_POST['nuevo_precio'];

    // Conectar a la base de datos
    $link = mysqli_connect("localhost", "root", "1972", "mechastore");

    if ($link === false) {
        die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
    }

    // Ejecutar la actualización del registro
    $sql = "UPDATE productos SET Nombre='$nuevo_nombre', Marca='$nueva_marca', Modelo='$nuevo_modelo', Precio='$nuevo_precio' WHERE ID='$producto_id'";
    if (mysqli_query($link, $sql)) {
        echo "Registro actualizado correctamente. <a href='lista_productos.php'>Volver a la lista de productos</a>";
    } else {
        echo "ERROR: No se ejecutó $sql. " . mysqli_error($link);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($link);
} else {
    echo "No se enviaron datos del formulario de edición.";
}
?>
