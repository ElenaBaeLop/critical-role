// Array para almacenar las respuestas AJAX
let respuestaAjax;

//Solicitud AJAX
$.ajax({
    url: 'http://127.0.0.1:8000/api/category',
    method: 'GET',
    success: function(response) {
        respuestaAjax = [...response];
    },
    error: function(xhr, status, error) {
        console.error("Error en la solicitud AJAX:", status, error);
    }
});

// Controlador de eventos para mostrar la lista de elementos
$('#search_campaign').click(function(e) {
            // Limpia la lista de elementos
            $('#categorias').empty();

            // Controlador de eventos para filtrar la lista de elementos
            $('#search_campaign').keyup(function() {
                let search = $(this).val().trim();
                let filteredCategories = respuestaAjax.filter(function(element) {
                    return element.name.toLowerCase().startsWith(search.toLowerCase());
                });
                // Limpia la lista de elementos
                $('#categorias').empty();

                // Si no se encuentran elementos, muestra un mensaje
                if (filteredCategories.length > 0) {
                    pintarLista(filteredCategories);
                } else {
                    $('#categorias').append('<div>No result.</div>');
                }

            });

            // Agrega cada elemento a la lista en evento click
           pintarLista(respuestaAjax);

            // Obtiene la posición del elemento search_campaign
            var searchCampaignPosition = $('#search_campaign').position();

            // Establece la posición de la lista
            $('#listado_categorias').css({
                top: searchCampaignPosition.top + $('#search_campaign').outerHeight() + 'px',
                left: searchCampaignPosition.left + 'px'
            });

            // Muestra la lista
            $('#listado_categorias').slideDown();
});

// Controlador de eventos para cerrar la lista cuando se hace click fuera de ella
$(document).on('click', function(e) {
    if (!$(e.target).closest('#search_campaign_form').length) {
        $('#listado_categorias').slideUp();
        $('#search_campaign').val('');
    }
});

//Controlador de evento para eliminar el input hidden y el div del formulario
$(document).on('click', '.search-choice', function() {
    let id = parseInt($(this).attr('id').split('_')[1]);//id="elemento.name + '_' + elemento.id"
    let name = $(this).text();
    $('#category_input_' + id).remove();
    $(this).remove();
    //Agregar el elemento eliminado al array respuestaAjax
    respuestaAjax.push({id: id, name: name});
});

function pintarLista(categorias) {
    //Ordenar el array de categorias
    categorias.sort(function(a, b) {
        return a.name.localeCompare(b.name);
    });
    // Agrega cada elemento a la lista
    $.each(categorias, function(index, elemento) {
        // Crea un elemento de lista y agrega el evento de clic
        let div = $('<div>').text(elemento.name).addClass('category-element');
        div.on('click', function() {
            // Agregar el elemento seleccionado al formulario como un input hidden
            let inputHidden = $('<input>').attr({
                type: 'hidden',
                name: 'category[]',
                value: elemento.id,
                id: 'category_input_' + elemento.id
            });
            $('#search_campaign_form').append(inputHidden);
            //Agregar el elemento seleccionado al formulario para visualizarlo
            let div = $('<div>').text(elemento.name).addClass('search-choice').attr('id', elemento.name + '_' + elemento.id);
            $('#chosen-choices').append(div);

            // Eliminar el elemento seleccionado del array respuestaAjax para que no vuelva a salir como opcion
            respuestaAjax = respuestaAjax.filter(function(item) {
                return item.id !== elemento.id;
            });
        });
        $('#categorias').append(div);
    });
}
