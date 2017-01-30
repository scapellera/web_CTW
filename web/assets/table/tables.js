$(document).ready(function() {
    $('#buscador_cliente').DataTable( {
        dom: 'Bfrtip',
        
        "pagingType": "full_numbers",
        lengthMenu: [
      	[ 10, 25, 50, -1 ],
      	[ '10 rows', '25 rows', '50 rows', 'Show all' ]
   		],
        buttons: [
            'excel',
            'pageLength'
        ]
    } );

    $('#buscador_sede').DataTable( {
        dom: 'Bfrtip',
        
        "pagingType": "full_numbers",
        lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
        buttons: [
            'pdf',
            'pageLength'
        ]
    } );

    $('#buscador_contacto').DataTable( {
        dom: 'Bfrtip',
        
        "pagingType": "full_numbers",
        lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
        buttons: [
            'excel',
            'pageLength'
        ]
    } );

    $('#buscador_mayorista').DataTable( {
        dom: 'Bfrtip',
        
        "pagingType": "full_numbers",
        lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
        buttons: [
            'excel',
            'pageLength'
        ]
    } );

    $('#buscador_usuario').DataTable( {
        dom: 'Bfrtip',
        
        "pagingType": "full_numbers",
        lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
        buttons: [
            'excel',
            'pageLength'
        ]
    } );

    $('#buscador_servicio').DataTable( {
        dom: 'Bfrtip',
        
        "pagingType": "full_numbers",
        lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
        buttons: [
            'excel',
            'pageLength'
        ]
    } );

    $('#buscador_articulo').DataTable( {
        dom: 'Bfrtip',
        
        "pagingType": "full_numbers",
        lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
        buttons: [
            'excel',
            'pageLength'
        ]
    } );

    $('#buscador_stock').DataTable( {
        dom: 'Bfrtip',
        
        "pagingType": "full_numbers",
        lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
        buttons: [
            'excel',
            'pageLength'
        ]
    } );
} );