$(document).ready(function() {
    var table = $('#buscador_contacto').DataTable();

    $('#buscador_contacto tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');


    } );



    } )