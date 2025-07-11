<?php
/*Felipe Rojas */
require_once '../../class/autoload.php';

if (isset($_GET['id'])) {
    $producto = new Productos();
    $producto->setId($_GET['id']);

    if ($producto->eliminar()) {
        header("Location: lista_productos.php");
        exit();
    } else {
        echo "Error al eliminar el producto.";
    }
} else {
    echo "ID de producto no especificado.";
}
