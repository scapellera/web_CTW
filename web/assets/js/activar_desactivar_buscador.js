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

function onchange_mayorista($pk, $activo) {
    if ($activo == 0) {

        $.ajax({
            type: 'post',
            url: '../assets/php/activar_desactivar_buscador.php',
            data: {
                pk: $pk,
                para: 'mayorista',
                accion: 'activar'
            }
        });
    } else {
        $.ajax({
            type: 'post',
            url: '../assets/php/activar_desactivar_buscador.php',
            data: {
                pk: $pk,
                para: 'mayorista',
                accion: 'desactivar'
            }
        });
    }
}

function onchange_sede($pk, $activo) {
    if ($activo == 0) {

        $.ajax({
            type: 'post',
            url: '../assets/php/activar_desactivar_buscador.php',
            data: {
                pk: $pk,
                para: 'sede',
                accion: 'activar'
            }
        });
    } else {
        $.ajax({
            type: 'post',
            url: '../assets/php/activar_desactivar_buscador.php',
            data: {
                pk: $pk,
                para: 'sede',
                accion: 'desactivar'
            }
        });
    }
}

function onchange_contacto($pk, $activo) {
    if ($activo == 0) {

        $.ajax({
            type: 'post',
            url: '../assets/php/activar_desactivar_buscador.php',
            data: {
                pk: $pk,
                para: 'contacto',
                accion: 'activar'
            }
        });
    } else {
        $.ajax({
            type: 'post',
            url: '../assets/php/activar_desactivar_buscador.php',
            data: {
                pk: $pk,
                para: 'contacto',
                accion: 'desactivar'
            }
        });
    }
}
