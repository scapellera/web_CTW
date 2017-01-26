$(document).ready(function() {
  $.fn.editable.defaults.mode = 'inline'
  $('.nombre_empresa').editable({
    type: 'text',
    url: '../assets/php/update_table/update_mayorista.php',
    name: 'nombre_empresa'

  })
  $('.nombre_comercial').editable({
    type: 'text',
    url: '../assets/php/update_table/update_mayorista.php',
    name: 'nombre_comercial'

  })
  $('.telefono_empresa').editable({
    type: 'text',
    url: '../assets/php/update_table/update_mayorista.php',
    name: 'telefono_empresa'

  })
  $('.telefono_comercial').editable({
    type: 'text',
    url: '../assets/php/update_table/update_mayorista.php',
    name: 'telefono_comercial'

  })
  $('.extension_telefono_comercial').editable({
    type: 'text',
    url: '../assets/php/update_table/update_mayorista.php',
    name: 'extension_telefono_comercial'

  })
  $('.email_empresa').editable({
    type: 'text',
    url: '../assets/php/update_table/update_mayorista.php',
    name: 'email_empresa'

  })
  $('.email_comercial').editable({
    type: 'text',
    url: '../assets/php/update_table/update_mayorista.php',
    name: 'email_comercial'

  })

  
})
