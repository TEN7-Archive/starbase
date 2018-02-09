(function ($) {
  $(document).ready(function () {

    $('.accordion-title').on('click', function(e) {
      e.preventDefault();
      $(this).closest('.accordion-row').toggleClass('accordion-open');
    });

  });
}(jQuery));
