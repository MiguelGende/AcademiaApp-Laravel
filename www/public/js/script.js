$(document).ready(function () {
    console.log('jQuery funciona desde consola');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.toggle-status').click(function () {

        const $btn = $(this);
        const sliderId = $btn.data('id');

        $.ajax({
            url: `/private/sliders/${sliderId}/toggle`,
            type: 'PATCH',
            success: function (response) {
                console.log('Estado cambiado con éxito:', response);

                // Actualizar texto y clases según el nuevo estado
                if (response.new_status) {
                    $btn.text('Activo');
                    $btn.removeClass('btn-danger').addClass('btn-success');
                } else {
                    $btn.text('Inactivo');
                    $btn.removeClass('btn-success').addClass('btn-danger');
                }
            },
            error: function (xhr) {
                console.error('Error al cambiar estado del slider: ', xhr.responseJSON || xhr);
            }
        });
    });
});
