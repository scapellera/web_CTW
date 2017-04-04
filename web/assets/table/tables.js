$(document).ready(function () {
    $('#buscador_cliente').DataTable({
        dom: 'Bfrtip',
        "order": [[0, "desc"], [1, "asc"]],

        "pagingType": "full_numbers",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'excel',
            'pageLength'
        ]
    });

    $('#buscador_sede').DataTable({
        dom: 'Bfrtip',
        "order": [[0, "desc"], [1, "asc"], [2, "asc"]],

        "pagingType": "full_numbers",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'pdf',
            'pageLength'
        ]
    });
    $('#exemple').DataTable({
        dom: 'Bfrtip',
        "order": [[0, "desc"], [2, "asc"], [1, "asc"]],

        "pagingType": "full_numbers",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'excel',
            'pageLength'
        ]
    });

    $('#buscador_contacto').DataTable({
        dom: 'Bfrtip',
        "order": [[0, "desc"], [2, "asc"], [1, "asc"]],

        "pagingType": "full_numbers",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'excel',
            'pageLength'
        ]
    });

    $('#buscador_mayorista').DataTable({
        dom: 'Bfrtip',
        "order": [[0, "desc"], [1, "asc"], [2, "asc"]],

        "pagingType": "full_numbers",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'excel',
            'pageLength'
        ]
    });

    $('#buscador_usuario').DataTable({
        dom: 'Bfrtip',
        "order": [[0, "desc"], [1, "asc"]],

        "pagingType": "full_numbers",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'excel',
            'pageLength'
        ]
    });

    $('#buscador_stock').DataTable({
        dom: 'Bfrtip',
        "order": [[0, "asc"]],

        "pagingType": "full_numbers",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'excel',
            'pageLength'
        ]
    });

    $('#buscador_servicio').DataTable({
        dom: 'Bfrtip',
        "order": [[0, "desc"], [1, "asc"]],

        "pagingType": "full_numbers",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'excel',
            'pageLength',
            {
                text: 'Facturar',
                action: function () {
                    var x = document.getElementById("buscador_servicio").rows.length;
                    var ID_SERVICIO = "";
                    for (var $i = 0; $i <= x - 1; $i++) {
                        var div = "#div" + $i;
                        if ($(div).hasClass("selected")) {
                            ID_SERVICIO = ID_SERVICIO + ($(div).attr('value')) + ",";
                        }
                    }
                    if (ID_SERVICIO.length > 0) {
                        ID_SERVICIO="servicio,"+ID_SERVICIO;
                        var res = ID_SERVICIO.substring(0, ID_SERVICIO.length-1);
                        document.getElementById('id_string').value = res;
                        document.getElementById("send_servicios").submit();


                    }
                }


            }
        ]
    });

    $('#buscador_articulo').DataTable({

        dom: 'Bfrtip',

        "pagingType": "full_numbers",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'excel',
            'pageLength',
            {
                text: 'Facturar',
                action: function () {
                    var x = document.getElementById("buscador_articulo").rows.length;
                    var ID_ARTICULO = "";
                    for (var $i = 0; $i <= x - 1; $i++) {
                        var div = "#div" + $i;
                        if ($(div).hasClass("selected")) {
                            ID_ARTICULO = ID_ARTICULO + ($(div).attr('value')) + ",";
                        }
                    }
                    if (ID_ARTICULO.length > 0) {
                        ID_ARTICULO="articulo,"+ID_ARTICULO;
                        var res = ID_ARTICULO.substring(0, ID_ARTICULO.length-1);
                        document.getElementById('id_string').value = res;
                        document.getElementById("send_articulos").submit();


                    }
                }


            }
        ]
    });


    $('#buscador_minutaje').DataTable({
        dom: 'Bfrtip',
        "order": [[5, "desc"],[1, "asc"], [6, "asc"]],

        "pagingType": "full_numbers",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'pdf',
            'pageLength',
            {
                text: 'Facturar',
                action: function () {
                    var x = document.getElementById("buscador_minutaje").rows.length;
                    var ID_MINUTAJE = "";
                    for (var $i = 0; $i <= x - 1; $i++) {
                        var div = "#div" + $i;
                        if ($(div).hasClass("selected")) {
                            ID_MINUTAJE = ID_MINUTAJE + ($(div).attr('value')) + ",";
                        }
                    }
                    if (ID_MINUTAJE.length > 0) {
                        ID_MINUTAJE="minutaje,"+ID_MINUTAJE;
                        var res = ID_MINUTAJE.substring(0, ID_MINUTAJE.length-1);
                        document.getElementById('id_string').value = res;
                        document.getElementById("send_minutaje").submit();


                    }
                }


            }
        ]
    });

});