$(document).ready(function() {
  $('.gallery-slider').bxSlider({
    mode: 'horizontal',
    slideWidth: 100,
    minSlides: 2,
    maxSlides: 6,
    slideMargin: 30,
    controls: true,
    pager: false,
    nextText: "N&aelig;ste",
    prevText: "Forrige"
  });
});
