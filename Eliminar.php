<?php

// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', 'Wolf_010205', 'tienda');

if ($conexion->connect_error) {
 die("Error de conexión: " . $conexion->connect_error);
}

// ID del producto que deseas eliminar
$producto_id = 6;

// Consulta SQL para eliminar un producto
$sql = "DELETE FROM Productos WHERE ID_Producto = $producto_id";

if ($conexion->query($sql) === TRUE) {
 echo "Producto eliminado exitosamente.";
} else {
 echo "Error al eliminar el producto: " . $conexion->error;
}

$conexion->close();

?>