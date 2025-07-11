<?php
/* Felipe Rojas*/
require_once '../../class/autoload.php';

if (isset($_GET['id'])) {
    $categoria = new Categorias();
    $categoria->setId($_GET['id']);

    if ($categoria->eliminar()) {
        header("Location: lista_categorias.php");
        exit();
    } else {
        echo "Error al eliminar la categoría.";
    }
} else {
    echo "ID de categoría no especificado.";
}
