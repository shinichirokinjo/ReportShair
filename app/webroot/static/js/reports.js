(function($, RS) {
  RS.reports = function() {
    var unload = function() {
      // $(document).off('');
    }

    return {
      init: function() {
        unload();

        $(".toolbar dd a").each(function() {
          // console.log(this);
        });

        $(".createEvent a").on('click', function(e) {
          e.preventDefault();
          RS.overlay.open('/reports/dialog/event', 'ajax');
        });

        $(".reportMeta .about").on('click', function(e) {
          e.preventDefault();
          alert("Click About");
        });
        $(".reportMeta .events").on('click', function(e) {
          e.preventDefault();
          alert("Click Events");
        });
        $(".reportMeta .photos").on('click', function(e) {
          e.preventDefault();
          alert("Click Photos");
        });
        $(".reportMeta .wents").on('click', function(e) {
          e.preventDefault();
          alert("Click Wents");
        });

        $(".typeNav .typeText").on('click', function(e) {
          e.preventDefault();
          RS.overlay.open('/reports/dialog/report', 'ajax');
        });
        $(".typeNav .typePhoto").on('click', function(e) {
          e.preventDefault();
          alert("Click Photo");
        });
      }
    }
  }();

  RS.scrolltop = function() {
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
  }();
}(jQuery, RS));

$(function() {
  RS.reports.init();
  RS.scrolltop.init();
  $('.toolbar').scrollspy({
    min: $('.toolbar').offset().top,
    max: $('.contentFoot').offset().top,
    onEnter: function(element, position) {
      $(".toolbar").addClass('fixed');
    },
    onLeave: function(element, position) {
      $(".toolbar").removeClass('fixed');
    }
  });
});
