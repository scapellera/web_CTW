$(document).ready(function() {
  $.fn.editable.defaults.mode = 'inline'
  $('.nombre').editable({
    type: 'text',
    url: '../assets/php/update_table/update_usuario.php',
    name: 'nombre'

  })

  $('.user').editable({
    type: 'text',
    url: '../assets/php/update_table/update_usuario.php',
    name: 'user'

  })

  $('.rol').editable({
    type: 'text',
    url: '../assets/php/update_table/update_usuario.php',
    name: 'rol'

  })

})