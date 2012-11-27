define(["jquery/jquery"], function($) {
  var Scrolltop = function() {
    var windowHeight = $(window).height() / 2;

    return {
      init: function() {
        $(window).on('scroll', function() {
          (window.innerWidth ? window.pageYOffset : document.documentElement.scrollTop) >= windowHeight ? $("#scrollToTop").removeClass("offScreen") : $("#scrollToTop").addClass("offScreen");
        });
        $("#scrollToTop").on('click', function() {
          $("html, body").animate({scrollTop: "0px"}, 400);
          return false;
        });
      }
    }
  }

  return Scrolltop;
});