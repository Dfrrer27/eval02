<?php
  include ('../../conexion/conexion.php');

  $conexion = conectar();

  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $conexion->prepare("SELECT * FROM producto WHERE id_producto = ?");

    $query->bind_param("i", $id);

    $query->execute();

    $resultado = $query->get_result()->fetch_assoc();

    $msg='';

    if ($resultado) {
      $msg = 'Producto Editado';
    }
    else{
      $msg = 'No se pudo editar el producto';
    }
  }

  desconectar($conexion);

//print_r($resultado); Comando para obtener resultados

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
  <form action="../php/editar.php" method="POST">
    <table>
      <tbody>

        <tr>
          <td>Nombre</td>
          <td>
            <input type="text" name="nombre" value="<?php echo $resultado['nombre']; ?>" required>
          </td>
        </tr>

        <tr>
          <td>Descripción</td>
          <td>
            <input type="text" name="descripcion" value="<?php echo $resultado['descripcion']; ?>">
          </td>
        </tr>

        <tr>
          <td>Stock</td>
          <td>
            <input type="text" name="stock" value="<?php echo $resultado['stock']; ?>" required>
          </td>
        </tr>

        <tr>
          <td>Precio_venta</td>
          <td>
            <input type="text" name="precio_venta" value="<?php echo $resultado['precio_venta']; ?>" required>
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="hidden" name="oculto">
            <input type="hidden" name="id_producto" value="<?php echo $resultado['id_producto']; ?>">
            <button type="submit">Guardar</button>
          </td>
        </tr>

      </tbody>
    </table>
  </form>
</body>
</html>