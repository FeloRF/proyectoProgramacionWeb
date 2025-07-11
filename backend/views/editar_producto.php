<?php

require_once '../../class/autoload.php';

$producto = new Productos();
$db = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $datos = $db->select("SELECT * FROM productos WHERE id = $id");
    $categorias = $db->select("SELECT * FROM categorias");

    if (count($datos) > 0) {
        $prod = $datos[0];
    } else {
        echo "Producto no encontrado.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto->setId($_POST['id']);
    $producto->setNombre($_POST['nombre']);
    $producto->setImagen($_POST['imagen_actual']); // imagen no se modifica en este formulario
    $producto->setDescripcion($_POST['descripcion']);
    $producto->setPrecio($_POST['precio']);
    $producto->setCategoriaId($_POST['categoria']);

    if ($producto->guardar()) {
        header("Location: lista_productos.php");
        exit();
    } else {
        echo "Error al actualizar.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Producto</title>
  <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>
<body>

  <h2 style="text-align: center;">Editar Producto</h2>

  <form action="" method="post" style="width: 400px; margin: auto;">
    <label for="id">ID:</label>
    <input type="number" id="id" name="id" required readonly value="<?= $prod['id'] ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required value="<?= $prod['nombre'] ?>">

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required><?= $prod['descripcion'] ?></textarea>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" step="0.01" required value="<?= $prod['precio'] ?>">

    <label for="categoria">Categoría:</label>
    <select name="categoria" id="categoria" required>
      <?php
        foreach ($categorias as $cat) {
            $selected = $cat['id'] == $prod['categoria_id'] ? 'selected' : '';
            echo "<option value='{$cat['id']}' $selected>{$cat['nombre']}</option>";
        }
      ?>
    </select>

    <input type="hidden" name="imagen_actual" value="<?= $prod['imagen'] ?>">

    <div class="botones">
      <button type="submit">Actualizar</button>
      <a href="lista_productos.php"><button type="button">Cancelar</button></a>
    </div>

    <p class="autor">Felipe Rojas</p>
  </form>

</body>
</html>
