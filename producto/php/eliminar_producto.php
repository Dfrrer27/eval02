<?php

  include ('../../conexion/conexion.php');

  $conexion = conectar();

  if (isset($_GET['id'])){

    $id = $_GET['id'];

    $query = $conexion->prepare("DELETE FROM producto WHERE id_producto = ?");

    $query->bind_param('i', $id);

    $msg = '';

    if ($query->execute()) {
      $msg = 'Producto Eliminado';
    }
    else{
      $msg = 'No se pudo eliminar el producto';
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar Producto</title>
</head>
<body>
  <h1>Eliminar Producto</h1>
  <h3><?php echo $msg ?></h3>
  <a href="./producto.php">Regresar</a>
</body>
</html>
