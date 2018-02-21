(function ($) {
  $(document).ready(function () {
    $('.color').each(function( index ) {
      var color = '--' + $(this).attr('data-color');
      var hex = getComputedStyle(this).getPropertyValue(color);
      $(this).text(hex);
    });
  });
}(jQuery));
