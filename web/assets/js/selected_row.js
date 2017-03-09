$(document).ready(function() {
    var table = $('#buscador_articulo').DataTable();

    $('#buscador_articulo tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
        /*alert( $(this).attr('id') );*/

    } );

    $('#test').click( function () {
        $('#buscador_articulo tbody').find('tr').toggleClass('selected')function () {
            
        }; {
            $(this).toggleClass('selected');
            /*alert( $(this).attr('id') );*/

        } );
        table.rows('.selected').(this).attr('id'));
    } );


    } );