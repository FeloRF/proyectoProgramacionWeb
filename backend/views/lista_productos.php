<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Productos</title>
  <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>
<body>

  <h2 style="text-align: center;">Listado de Productos</h2>

  <!-- Navegación -->
  <div style="text-align: center; margin-bottom: 20px;">
    <a href="../../views/home.html"><button>Inicio</button></a>
    <a href="lista_productos.php"><button>Productos</button></a>
    <a href="lista_categorias.php"><button>Categorías</button></a>
  </div>

  <div class="contenedor-productos">
    <?php
    /* @autor Felipe Rojas*/
    require_once '../../class/autoload.php';

    $db = new Database();
    $productos = $db->select("SELECT p.*, c.nombre AS categoria FROM productos p INNER JOIN categorias c ON p.categoria_id = c.id");

    foreach ($productos as $producto) {
        echo "<div class='tarjeta-producto'>";
        echo "<img src='../../assets/img/{$producto['imagen']}' alt='Imagen'>";
        echo "<h3>{$producto['nombre']}</h3>";
        echo "<p><strong>Categoría:</strong> {$producto['categoria']}</p>";
        echo "<p><strong>Precio:</strong> \${$producto['precio']}</p>";
        echo "<p>{$producto['descripcion']}</p>";
        echo "<div style='margin-top: 10px;'>
                <a href='editar_producto.php?id={$producto['id']}'><button>Editar</button></a>
                <a href='eliminar_producto.php?id={$producto['id']}' onclick='return confirm(\"¿Estás seguro?\")'><button>Eliminar</button></a>
              </div>";
        echo "</div>";
    }
    ?>
  </div>

  <div style="text-align: center; margin-top: 30px;">
    <a href="productos.php"><button>Agregar nuevo producto</button></a>
</div>


  <div style="text-align: center; margin-top: 30px;">
    <a href="productos.php"><button>Agregar</button></a>
    <p class="autor">Felipe Rojas</p>
  </div>

</body>
</html>
