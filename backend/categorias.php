<?php
/* @autor Felipe Rojas */

// Cargar clases automáticamente
require_once '../class/autoload.php';

// Verificar si llegan datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar que los campos no estén vacíos
    if (!empty(trim($_POST['id'])) && !empty(trim($_POST['nombre']))) {
        $categoria = new Categorias();
        $categoria->setId($_POST['id']);
        $categoria->setNombre($_POST['nombre']);
        
        if ($categoria->guardar()) {
            // Redirigir al listado de categorías
            header("Location: views/lista_categorias.php");
            exit();
        } else {
            echo "Error al guardar la categoría.";
        }

    } else {
        echo "Todos los campos son obligatorios.";
    }
}
