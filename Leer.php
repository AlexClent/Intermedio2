<?php

// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', 'Wolf_010205', 'tienda');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta SQL para obtener todos los productos
$sql = "SELECT * FROM Productos";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Mostrar todos los detalles del producto
        echo "ID: " . $fila["ID_Producto"] . "<br>";
        echo "Nombre: " . $fila["Nombre"] . "<br>";
        echo "Descripción: " . $fila["Descripcion"] . "<br>";
        echo "Precio: " . $fila["Precio"] . "<br>";
        echo "Stock: " . $fila["Stock"] . "<br>";
        echo "Categoría: " . $fila["Categoria"] . "<br>";
        echo "Imagen: <img src='" . $fila["Imagen"] . "' alt='Imagen del Producto' width='100'><br>";
        echo "<hr>"; // Separador visual entre productos
    }
} else {
    echo "No se encontraron productos.";
}

// Cerrar la conexión a la base de datos
$conexion->close();

?>
