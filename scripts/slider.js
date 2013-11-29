$(document).ready(function() {
  $('.gallery-slider').bxSlider({
    mode: 'horizontal',
    slideWidth: 100,
    minSlides: 1,
    maxSlides: 6,
    moveSlides: 3,
    slideMargin: 30,
    controls: true,
    pager: false,
    nextText: "N&aelig;ste",
    prevText: "Forrige"
  });
});
