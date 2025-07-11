<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Categorías</title>
  <link rel="stylesheet" href="../../assets/css/estilos.css">
  <style>
    .boton {
      display: inline-block;
      padding: 10px 15px;
      background-color: #ddd;
      border: none;
      border-radius: 4px;
      text-decoration: none;
      color: #000;
      margin: 5px;
      cursor: pointer;
    }

    .boton:hover {
      background-color: #ccc;
    }
  </style>
</head>
<body>

  <h2 style="text-align: center;">Listado de Categorías</h2>

  <!-- Navegación -->
  <div style="text-align: center; margin-bottom: 20px;">
    <a href="../../views/home.html"><button>Inicio</button></a>
    <a href="lista_productos.php"><button>Productos</button></a>
    <a href="lista_categorias.php"><button>Categorías</button></a>
  </div>

  <form style="width: 600px; margin: auto;">
    <?php
      /* @autor Felipe Rojas */
      require_once '../../class/autoload.php';

      $db = new Database();
      $categorias = $db->select("SELECT * FROM categorias");

      echo "<table style='width: 100%; border-collapse: collapse; text-align: center;'>";
      echo "<tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr>";

      foreach ($categorias as $categoria) {
        echo "<tr>";
        echo "<td>{$categoria['id']}</td>";
        echo "<td>{$categoria['nombre']}</td>";
        echo "<td>
                <a href='editar_categoria.php?id={$categoria['id']}' class='boton'>Editar</a>
                <a href='eliminar_categoria.php?id={$categoria['id']}' class='boton' onclick='return confirm(\"¿Estás seguro?\")'>Eliminar</a>
              </td>";
        echo "</tr>";
      }

      echo "</table>";
    ?>
  </form>

  <div style="text-align: center; margin-top: 30px;">
    <a href="categorias.php"><button>Agregar</button></a>
    <p class="autor">Felipe Rojas</p>
  </div>

</body>
</html>
