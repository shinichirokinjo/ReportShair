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
}(jQuery, RS));

$(function() {
  RS.reports.init();
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
