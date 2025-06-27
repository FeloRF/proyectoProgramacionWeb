$(document).ready(function () {
    $("form").on("submit", function (e) {
        let errores = [];
        let formulario = $(this);
        let campos = formulario.find("input[type='text'], textarea");

        campos.each(function () {
            let campo = $(this);
            let valor = campo.val().trim();

            campo.next(".firma").remove();

            if (valor === "") {
                errores.push(campo.attr("name"));
                campo.after("<span class='firma' style='color:red; font-size:12px;'>Felipe Rojas</span>");
            }
        });

        if (errores.length > 0) {
            e.preventDefault();
            alert("Los siguientes campos están vacíos o tienen solo espacios:\n" + errores.join("\n"));
        }
    });
});
