<?php

require_once '../../class/autoload.php';

$categoria = new Categorias();
$db = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $datos = $db->select("SELECT * FROM categorias WHERE id = $id");

    if (count($datos) > 0) {
        $categoriaInfo = $datos[0];
    } else {
        echo "Categoría no encontrada.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria->setId($_POST['id']);
    $categoria->setNombre($_POST['nombre']);

    if ($categoria->guardar()) {
        header("Location: lista_categorias.php");
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
  <title>Editar Categoría</title>
  <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>
<body>

  <h2 style="text-align: center;">Editar Categoría</h2>

  <form action="" method="post" style="width: 400px; margin: auto;">
    <label for="id">ID:</label>
    <input type="number" id="id" name="id" required readonly value="<?= $categoriaInfo['id'] ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required value="<?= $categoriaInfo['nombre'] ?>">

    <div class="botones">
      <button type="submit">Actualizar</button>
      <a href="lista_categorias.php"><button type="button">Cancelar</button></a>
    </div>

    <p class="autor">Felipe Rojas</p>
  </form>

</body>
</html>
