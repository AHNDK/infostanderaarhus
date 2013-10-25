$(document).ready(function() {
  // Attach click event on links starting with #
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') || location.hostname === this.hostname) {
      var target = $(this.hash);

      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 125
        }, 1000);
        return false;
      }
    }
  });

  var topLink = $('.top-link');

  // Show or hide top link when scrolling
  $(window).scroll(function() {
    if (!$('body').hasClass('js-scrolling') && $(document).scrollTop() > 250) {
      // Add class to body
      $('body').addClass('js-scrolling');

      // Show arrow link
      $(topLink).show();
    } else if (!$('body').hasClass('js-scrolling')) {
      // Remove class to body
      $('body').removeClass('js-scrolling');

      // Hide arrow link
      $(topLink).hide();
    }
  });
});
