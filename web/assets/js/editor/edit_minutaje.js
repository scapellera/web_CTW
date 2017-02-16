$(document).ready(function() {
  $.fn.editable.defaults.mode = 'inline'
  $('.fecha').editable({
    type: 'text',
    url: '../assets/php/update_table/update_minutaje.php',
    name: 'fecha'

  })

  $('.horas').editable({
    type: 'text',
    url: '../assets/php/update_table/update_minutaje.php',
    name: 'horas'

  })

  $('.ID_servicio').editable({
    type: 'text',
    url: '../assets/php/update_table/update_minutaje.php',
    name: 'ID_servicio'

  })

  $('.ID_usuario').editable({
    type: 'text',
    url: '../assets/php/update_table/update_minutaje.php',
    name: 'ID_usuario'

  })

  $('.ID_sede').editable({
    type: 'text',
    url: '../assets/php/update_table/update_minutaje.php',
    name: 'ID_sede'

  })

  $('.NIF_cliente').editable({
    type: 'text',
    url: '../assets/php/update_table/update_minutaje.php',
    name: 'NIF_cliente'

  })

  $('.facturado').editable({
    type: 'text',
    url: '../assets/php/update_table/update_minutaje.php',
    name: 'facturado'

  })

})