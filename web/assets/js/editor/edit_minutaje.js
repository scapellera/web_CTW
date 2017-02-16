$(document).ready(function() {
  $.fn.editable.defaults.mode = 'inline'
  $('.fecha').editable({
    type: 'text',
    url: '../assets/php/update_table/update_minutaje.php',
    name: 'fecha'

  })

  $('.hora_entrada').editable({
    type: 'text',
    url: '../assets/php/update_table/update_minutaje.php',
    name: 'hora_entrada'

  })

  $('.hora_salida').editable({
    type: 'text',
    url: '../assets/php/update_table/update_minutaje.php',
    name: 'hora_salida'

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