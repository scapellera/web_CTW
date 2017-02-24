/*******************************
 * ACTIVAR/DESACTIVAR CHECKBOX BUSACDOR
 *******************************/

function onchange_cliente($pk, $activo) {
    if ($activo == 0) {

        $.ajax({
            type: 'post',
            url: '../assets/php/activar_desactivar_buscador.php',
            data: {
                pk: $pk,
                para: 'cliente',
                accion: 'activar'
            }
        });
    } else {
        $.ajax({
            type: 'post',
            url: '../assets/php/activar_desactivar_buscador.php',
            data: {
                pk: $pk,
                para: 'cliente',
                accion: 'desactivar'
            }
        });
    }
}
