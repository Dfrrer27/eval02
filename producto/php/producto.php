<?php

include('../../conexion/conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Consultamos a la base de datos
$query = $conexion->prepare("SELECT * FROM producto");

$query->execute();

$resultado = $query->get_result();

// print_r($resultado);

// Cerramos la conexion a la base de datos
desconectar($conexion);
 
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Producto</title>
</head>
<body>
  <h1>Producto</h1>
  <a href="../html/agregar.html">Nuevo Producto</a>
  <table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>NOMBRES</th>
        <th>DESCRIPCIÓN</th>
        <th>STOCK</th>
        <th>PRECIO_VENTA</th>
        <th>EDITAR</th>
        <th>ELIMINAR</th>
      </tr>
    </thead>
    <tbody>
      <?php
        //Recorremos el set de registros obtenidos
        while ($producto = $resultado->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $producto['id_producto'] . '</td>';
          echo '<td>' . $producto['nombre'] . '</td>';
          echo '<td>' . $producto['descripcion'] . '</td>';
          echo '<td>' . $producto['stock'] . '</td>';
          echo '<td>' . $producto['precio_venta'] . '</td>';
          echo '<td> <a href="../php/editar_producto.php?id=' . $producto['id_producto'] . '">Editar</a> </td>';
          echo '<td> <a href="../php/eliminar_producto.php?id=' . $producto['id_producto'] . '">Eliminar</a> </td>';
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>
</body>
</html>