<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de categorias</title>
    <link rel="stylesheet" href="../../assets/css/estilos.css">
</head>
<body>
    <!-- TÍTULO QUE SE MUESTRA EN EL FORMULARIO  -->
    <h2>Agregar categoría</h2>

    <form action="../../backend/categorias.php" method="post">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required>

        <div class="botones">
            <button type="submit">Guardar</button>
            <button type="reset">Cancelar</button>
        </div>
    </form>

    <p style="text-align: center;">Felipe Rojas</p>

    <!-- Scripts requeridos -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../assets/js/validaciones.js"></script>
</body>
</html>
