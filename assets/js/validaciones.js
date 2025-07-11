$(document).ready(function () {
  // Función genérica para validar campos vacíos
  function validarFormulario(formulario, campos) {
    let camposVacios = [];

    // Limpiar mensajes anteriores
    $(formulario).find(".mensaje-autor").remove();

    campos.forEach(function (campo) {
      let valor = $(campo.selector).val().trim();
      if (valor === "") {
        camposVacios.push(campo.nombre);

        // Mostrar mensaje debajo del campo vacío
        let mensaje = $("<div class='mensaje-autor'>Michael Belmar</div>");
        $(campo.selector).after(mensaje);
      }
    });

    if (camposVacios.length > 0) {
      alert("Los siguientes campos están vacíos: " + camposVacios.join(", "));
      return false; // detener envío
    }

    return true;
  }

  // Validar formulario de categorías
  $("form[action='#']").on("submit", function (e) {
    // Detectar por ID del formulario si estás en categorías
    if ($("#nombre").length && $("#id").length) {
      e.preventDefault();
      validarFormulario(this, [
        { selector: "#id", nombre: "ID" },
        { selector: "#nombre", nombre: "Nombre" }
      ]);
    }

    // Detectar si estás en productos
    if ($("#id_producto").length && $("#nombre_producto").length) {
      e.preventDefault();
      validarFormulario(this, [
        { selector: "#id_producto", nombre: "ID del Producto" },
        { selector: "#nombre_producto", nombre: "Nombre del Producto" },
        { selector: "#descripcion", nombre: "Descripción" },
        { selector: "#precio", nombre: "Precio" },
        { selector: "#categoria", nombre: "Categoría" }
      ]);
    }
  });
});
