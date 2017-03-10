$(document).ready(function () {
    var table = $('#buscador_articulo').DataTable();
    var manipular =
        $('#buscador_articulo tbody').on('click', 'tr', function () {
            $(this).toggleClass('selected');
            return this;
        });

    $('#test').click(function () {
        var x = document.getElementById("buscador_articulo").rows.length;
        var ID_ARTICULO = ""
        for (var $i = 0; $i <= x - 1; $i++) {
            var div = "#div" + $i;
            if ($(div).hasClass("selected")) {
                ID_ARTICULO = ID_ARTICULO + ($(div).attr('value')) + ",";
            }
        }
        if (ID_ARTICULO.length >0) {
            document.getElementById('articulo_array_string').value = ID_ARTICULO;

        }
    });
});