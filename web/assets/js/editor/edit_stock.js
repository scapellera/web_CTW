$(document).ready(function() {
  $.fn.editable.defaults.mode = 'inline'
  $('.cantidad_total').editable({
    type: 'text',
    url: '../assets/php/update_table/update_stock.php',
    name: 'cantidad_total'

  })

})