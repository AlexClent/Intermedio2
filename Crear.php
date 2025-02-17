<?php

// Conexión a la base de datos (reemplaza los valores con los tuyos)
$conexion = new mysqli('localhost', 'root', 'Wolf_010205', 'tienda');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $imagen = $_POST['imagen']; // Si no se carga una imagen, puedes manejarla como NULL

    // Consulta SQL para insertar un nuevo producto
    $sql = "INSERT INTO Productos (Nombre, Descripcion, Precio, Stock, Categoria, Imagen)
            VALUES ('$nombre', '$descripcion', $precio, $stock, '$categoria', '$imagen')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        echo "Producto creado exitosamente.";
    } else {
        echo "Error al crear el producto: " . $conexion->error;
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>


<form method="post" action="Crear.php">
    Nombre: <input type="text" name="nombre" required><br>
    Descripción: <input type="text" name="descripcion" required><br>
    Precio: <input type="number" step="0.01" name="precio" required><br>
    Stock: <input type="number" name="stock" required><br>
    Categoría: <input type="text" name="categoria" required><br>
    Imagen (URL): <input type="text" name="imagen"><br>
    <input type="submit" value="Crear Producto">
</form>
