    $('input[name=session_frequency]:radio').change(function() {
        if ($('#session_frequency_weekly').is(":checked")){
            $('#session_frequency_days').show();
        }else {
            $('#session_frequency_days').hide();
        }
    });
    // Solo para que se muestre el dropdown si el radio button esta seleccionado al cargar la pagina
    if ($('#session_frequency_weekly').is(":checked")){
        $('#session_frequency_days').show();
    }

