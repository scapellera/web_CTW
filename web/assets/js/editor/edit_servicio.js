$(document).ready(function() {
  $.fn.editable.defaults.mode = 'inline'
  $('.nombre').editable({
    type: 'text',
    url: '../assets/php/update_table/update_servicio.php',
    name: 'nombre'

  })
  $('.descripcion').editable({
    type: 'text',
    url: '../assets/php/update_table/update_servicio.php',
    name: 'descripcion'

  })
  $('.precio').editable({
    type: 'text',
    url: '../assets/php/update_table/update_servicio.php',
    name: 'precio'

  })
  
})