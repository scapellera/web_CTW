$(document).ready(function () {
    $('#buscador_articulo tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
    });

    $('#buscador_minutaje tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
    });

});