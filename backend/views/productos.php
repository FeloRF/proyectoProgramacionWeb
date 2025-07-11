<?php /* @autor Felipe Rojas */ ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Alta de Productos</title>
  <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>
<body>
  
  <h2>Alta de Productos</h2>
  <form action="../../backend/productos.php" method="post" enctype="multipart/form-data">
    <label for="id_producto">ID del Producto:</label>
    <input type="number" id="id_producto" name="id_producto" required>

    <label for="nombre_producto">Nombre del Producto:</label>
    <input type="text" id="nombre_producto" name="nombre_producto" required>

    <label for="imagen_producto">Imagen del Producto:</label>
    <input type="file" id="imagen_producto" name="imagen_producto" required>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" required></textarea>

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" step="0.01" required>

    <label for="categoria">Categoría:</label>
    <select id="categoria" name="categoria" required>
      <option value="">Seleccione una categoría</option>
      <?php
        require_once '../../class/autoload.php';
        $db = new Database();
        $categorias = $db->select("SELECT * FROM categorias");

        foreach ($categorias as $categoria) {
            echo "<option value='{$categoria['id']}'>{$categoria['nombre']}</option>";
        }
      ?>
    </select>


    <div class="botones">
      <button type="reset">Cancelar</button>
      <button type="submit">Guardar</button>
    </div>
    

    <p class="autor">Desarrollado por Felo_RF</p>
  </form>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../assets/js/validaciones.js"></script>
</body>
</html>
