requirejs.config({
  baseUrl: "/static/js",
  paths: {
    jquery: [
      'jquery'
    ],
    vendor: [
      'vendor'
    ]
  },
  shim: {
    'jquery/jquery': {
      exports: 'jQuery'
    },
    'vendor/underscore': {
      deps: ['jquery/jquery'],
      exports: '_'
    },
    'vendor/backbone': {
      deps: ['jquery/jquery', 'vendor/underscore'],
      exports: 'Backbone'
    },
    'jquery/scrollspy': {
      deps: ['jquery/jquery'],
      exports: 'jQuery.fn.scrollspy'
    },
    'jquery/tipsy': {
      deps: ['jquery/jquery'],
      exports: 'jQuery.fn.tipsy'
    },
    'reportshair': {
      deps: ['jquery/jquery', 'vendor/backbone'],
      exports: 'RS'
    }
  }
});

requirejs(
  [
    "jquery/jquery",
    "vendor/underscore",
    "vendor/backbone",
    "reportshair",
    "jquery/scrollspy",
    "jquery/tipsy"
  ],
  function($, _, Backbone, RS) {
    $(function() {
      console.log(RS);
      if ($('.carousel').length) {
        RS.carousel.init();
      }

      $(".createNav a").on('click', function() {
        RS.overlay.open('/reports/dialog/report/select', 'iframe', {class: 'selectDialog'});
        return false;
      });

      if ($('.toolbar').length) {
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
      }

      if ($('#scrollToTop').length) {
        RS.scrolltop.init();
      }

      if ($('.timeline').length) {
        RS.timeline.init();
      }

      $(".tips").tipsy({html: true});
    });
  }
);
