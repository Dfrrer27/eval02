<?php

  include ('../../conexion/conexion.php');

  $conexion = conectar();

  if (isset($_POST['oculto'])){
    
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $precio_venta = $_POST['precio_venta'];

    $query = $conexion->prepare("UPDATE producto SET nombre = ?, descripcion = ?, stock = ?, precio_venta = ? WHERE id_producto = ?");

    $query->bind_param('ssiii', $nombre, $descripcion, $stock, $precio_venta, $id_producto);

    $msg = '';

    if ($query->execute()) {
      $msg = 'Producto Registrado';
    }
    else{
      $msg = 'No se pudo registrar el producto';
    }
  }

  desconectar($conexion);


 // print_r($query); comando para obtener resultados
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Producto</title>
</head>
<body>
  <h1>Editar Producto</h1>
  <h3><?php echo $msg ?></h3>
  <a href="./producto.php">Regresar</a>
</body>
</html>