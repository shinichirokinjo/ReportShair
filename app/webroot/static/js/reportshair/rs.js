define(
  [
    "jquery/jquery",
    "reportshair/carousel",
    "reportshair/overlay",
    "reportshair/scrolltop",
    "reportshair/timeline"
  ],
  function($, Carousel, Overlay, Scrolltop, Timeline) {
    var RS = {};

    RS.overlay = new Overlay();

    if ($('.carousel').length) {
      RS.carousel = new Carousel();
    }

    if ($('#scrollToTop').length) {
      RS.scrolltop = new Scrolltop();
    }
    if ($('.timeline').length) {
      RS.timeline = new Timeline();
    }

    return RS;
  }
);