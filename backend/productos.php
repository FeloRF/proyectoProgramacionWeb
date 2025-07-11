<?php
/* @autor  Felipe Rojas */

require_once '../class/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar campos obligatorios
    if (
        !empty(trim($_POST['id_producto'])) &&
        !empty(trim($_POST['nombre_producto'])) &&
        !empty(trim($_POST['descripcion'])) &&
        !empty(trim($_POST['precio'])) &&
        !empty(trim($_POST['categoria']))
    ) {
        // Procesar imagen si se subió
        $nombreImagen = "";
        if (isset($_FILES['imagen_producto']) && $_FILES['imagen_producto']['error'] === UPLOAD_ERR_OK) {
            $nombreImagen = basename($_FILES['imagen_producto']['name']);
            $rutaDestino = '../assets/img/' . $nombreImagen;
            move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $rutaDestino);
        }

        $producto = new Productos();
        $producto->setId($_POST['id_producto']);
        $producto->setNombre($_POST['nombre_producto']);
        $producto->setImagen($nombreImagen);
        $producto->setDescripcion($_POST['descripcion']);
        $producto->setPrecio($_POST['precio']);
        $producto->setCategoriaId($_POST['categoria']);

        if ($producto->guardar()) {
            header("Location: views/lista_productos.php");
            exit();
        } else {
            echo "Error al guardar el producto.";
        }

    } else {
        echo "Todos los campos obligatorios deben estar completos.";
    }
    
}
