<?php

// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', 'Wolf_010205', 'tienda');

if ($conexion->connect_error) {
 die("Error de conexión: " . $conexion->connect_error);
}

// Datos actualizados del producto
$producto_id = 6; // ID del producto que deseas actualizar
$nuevo_precio = 40000.00;

// Consulta SQL para actualizar el precio del producto
$sql = "UPDATE Productos SET Precio = $nuevo_precio WHERE ID_Producto = $producto_id";

if ($conexion->query($sql) === TRUE) {
 echo "Producto actualizado exitosamente.";
} else {
 echo "Error al actualizar el producto: " . $conexion->error;
}

$conexion->close();

?>