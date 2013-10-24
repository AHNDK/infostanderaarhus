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

  var topLink = $('.top-link').hide();

  // Show or hide top link when scrolling
  $(window).scroll(function() {
    if ($(document).scrollTop() > 250) {
      $(topLink).show('fast');
    } else {
      $(topLink).hide('fast');
    }
  });
});
