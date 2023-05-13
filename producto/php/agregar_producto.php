<?php
include('../../conexion/conexion.php'); 

// Obtenemos los valores del formulario
$nombre = $_POST['nombre'];
$descripcion= $_POST['descripcion'];
$stock = $_POST['stock'];
$precio_venta = $_POST['precio_venta'];

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Consulta a la base de datos
$query = $conexion->prepare("INSERT INTO producto (nombre, descripcion, stock, precio_venta) VALUES (?, ?, ?, ?)");

$query->bind_param('ssid', $nombre, $descripcion, $stock, $precio_venta);

$msg = '';

if ($query->execute()) {
  $msg = 'Producto Registrado';
}
else{
  $msg = 'No se pudo registrar el producto';
}

// Cerramos la conexion a la base de datos
desconectar($conexion);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Producto</title>
</head>
<body>
  <h1>Agregar Producto</h1>
  <h3><?php echo $msg ?></h3>
  <a href="./producto.php">Regresar</a>
</body>
</html>