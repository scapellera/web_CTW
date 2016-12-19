$(document).ready(function() {
  $.fn.editable.defaults.mode = 'inline'
  $('.ID').editable({
    type: 'text',
    url: 'assets/php/post.php',
    name: 'ID'

  })
  $('.lloc_incidencia').editable({
    type: 'text',
    url: 'assets/php/post.php',
    name: 'lloc_incidencia'

      })
  $('.breu_descripcio').editable({
    type: 'text',
    url: 'assets/php/post.php',
    name: 'breu_descripcio'
  })
})
