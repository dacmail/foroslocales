(function($) {
  $(document).ready(function() {
    $(".navbar-nav a[href^='#']").on('click', function(event) {
      event.preventDefault();
      $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top - $('.navbar-aidee').height()
      }, 500);
    });
  });
  $(window).on('load', function() {
    //JS
  });
})(jQuery);
