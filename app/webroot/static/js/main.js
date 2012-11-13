requirejs.config({
  baseUrl: "static/js",
  paths: {
    jquery: [
      // 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min',
      'jquery/jquery'
    ],
    underscore: [
      'vendor/underscore'
    ],
    backbone: [
      'vendor/backbone'
    ],
    tipsy: [
      'jquery/jquery.tipsy'
    ],
    app: 'app'
  },
  shim: {
//    'jquery': {
//      exports: '$'
//    },
    'underscore': {
      deps: ['jquery'],
      exports: '_'
    },
    'backbone': {
      deps: ['jquery', 'underscore'],
      exports: 'Backbone'
    }
  }
});
requirejs(["jquery", "backbone", "underscore", "tipsy", "app"], function($, _, Backbone, RS) {
  $(function() {
    $(".createNav a").on('click', function() {
      RS.overlay.open('/reports/dialog/report/select', 'iframe', {class: 'selectDialog'});
      return false;
    });
    $(".tips").tipsy({html: true});
  });
});