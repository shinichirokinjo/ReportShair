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
      console.log($('.footer').offset().bottom);
      // console.log(position);
      $(".toolbar").addClass('fixed');
    },
    onLeave: function(element, position) {
      $(".toolbar").removeClass('fixed');
    }
  });
});
