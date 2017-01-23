$(document).ready(function() {
  $.fn.editable.defaults.mode = 'inline'
  $('.nombre').editable({
    type: 'text',
    url: '../assets/php/update_table/update_sede.php',
    name: 'nombre'

  })
  $('.NIF_cliente').editable({
    type: 'text',
    url: '../assets/php/update_table/update_sede.php',
    name: 'NIF_cliente'

  })
  $('.ubicacion').editable({
    type: 'text',
    url: '../assets/php/update_table/update_sede.php',
    name: 'ubicacion'

  })
  $('.ciudad').editable({
    type: 'text',
    url: '../assets/php/update_table/update_sede.php',
    name: 'ciudad'

  })
  $('.codigo_postal').editable({
    type: 'text',
    url: '../assets/php/update_table/update_sede.php',
    name: 'codigo_postal'

  })
  $('.calle').editable({
    type: 'text',
    url: '../assets/php/update_table/update_sede.php',
    name: 'calle'

  })
  $('.numero').editable({
    type: 'text',
    url: '../assets/php/update_table/update_sede.php',
    name: 'numero'

  })
  $('.pais').editable({
    type: 'text',
    url: '../assets/php/update_table/update_sede.php',
    name: 'pais'

  })
  $('.telefono').editable({
    type: 'text',
    url: '../assets/php/update_table/update_sede.php',
    name: 'telefono'

  })
  $('.email').editable({
    type: 'text',
    url: '../assets/php/update_table/update_sede.php',
    name: 'email'

  })
  
  /*$('.lloc_incidencia').editable({
    type: 'text',
    url: 'assets/php/post.php',
    name: 'lloc_incidencia'

      })
  $('.breu_descripcio').editable({
    type: 'text',
    url: 'assets/php/post.php',
    name: 'breu_descripcio'
  })*/
})
