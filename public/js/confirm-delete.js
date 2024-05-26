$(document).ready(function() {
    $(".close, #cancelDeleteBtn").click(function () {
        $(".modal").hide();
    });

// Escuchar clic en los botones de eliminación
    $(".deleteBtn").click(function () {
        var formId = $(this).data('target'); // Obtener el ID del formulario correspondiente
        $(".modal").show(); // Mostrar el modal
        $(".modal").attr('data-form-id', formId); // Almacenar el ID del formulario en el atributo data-form-id del modal
    });

// Escuchar clic en "Yes" en el modal
    $("#confirmDeleteBtn").click(function () {
        var formId = $(".modal").attr('data-form-id'); // Obtener el ID del formulario almacenado en el modal
        $("#" + formId).submit(); // Enviar el formulario correspondiente
    });
});
