var RS = RS || {};

(function($, RS) {
  var DEBUG = false;
  var VERSION = "20120713-v0.0.1";

  var A = RS.Alert = {};
  $.extend(A, {

  });

  var B = RS.Browser = {};
  $.extend(B, {
    isIE: navigator.userAgent.indexOf('MSIE') != -1,
    isIE6 : navigator.userAgent.indexOf('MSIE 6.') != -1,
    isIE7 : navigator.userAgent.indexOf('MSIE 7.') != -1,
    isIE8 : navigator.userAgent.indexOf('MSIE 8.') != -1,
    isIE8 : navigator.userAgent.indexOf('MSIE 8.') != -1,
    isIE9 : navigator.userAgent.indexOf('MSIE 9.') != -1,
    isMozilla: navigator.userAgent.indexOf('Mozilla') != -1 && !/compatible|WebKit/.test(navigator.userAgent),
    isOpera: !!window.opera,
    isSafari: navigator.userAgent.indexOf('WebKit') != -1 && navigator.userAgent.indexOf('Chrome/') == -1,
    isChrome : navigator.userAgent.indexOf('Chrome/') != -1,
    isFirefox : navigator.userAgent.indexOf('Firefox/') != -1,
    isDSi : navigator.userAgent.indexOf('Nintendo DSi') != -1,
    is3DS : navigator.userAgent.indexOf('Nintendo 3DS') != -1,
    isWii : navigator.userAgent.indexOf('Nintendo Wii') != -1,
    isAndroid : navigator.userAgent.indexOf('Android') != -1,
    isIPhone : (navigator.userAgent.indexOf('iPod;') != -1 || navigator.userAgent.indexOf('iPhone;') != -1 || navigator.userAgent.indexOf('iPhone Simulator;') != -1),
    isIPad : navigator.userAgent.indexOf('iPad') != -1,
    version: {
      string: (/(?:Firefox\/|MSIE |Opera\/|Chrome\/|Version\/)([\d.]+)/.exec(navigator.userAgent) || []).pop(),
      valueOf: function() {
        return parseFloat(this.string)
      },
      toString: function() {
        return this.string
      }
    }
  });

  var C = RS.Carousel = {};
  $.extend(C, {
    $controls: null,
    $items: null,
    $length: 0,
    $index: 0,
    $timer: null,
    // 初期化
    init: function() {
      var $carousel = $('.carousel').click(function() {
        RS.Carousel.pause();
      });

      this.$items  = $carousel.children().hide();
      this.$length = $carousel.children().length;
      console.log("length: "+this.$length);

      var $controls = this.createControls().appendTo($carousel);
      this.$controls = $controls.children();

      this.$items.each(function(index, element) {
        var $element = $(element);
      });

      this.go(0);
      this.play();
    },
    createControls: function() {
      var $controls = $('<div>').addClass('controls');
      for (var i = 0; i < this.length; i++) {
        var $control = $('<a>');
        $control.data('index', i).click(
          $.proxy(function(event) {
            this.pause();
            var newIndex = parseInt($(event.target).data('index'));
            this.update(newIndex);
          }, this)
        );
        $control.appendTo($controls);
      }
      return $controls;
    },
    go: function(step) {
      var absoluteIndex = (this.$index + step) % this.$length;
      console.log(absoluteIndex);
      this.update(absoluteIndex);
    },
    update: function(newIndex) {
      var oldIndex = this.$index;
      console.log("oldIndex: "+oldIndex);
      console.log("newIndex: "+newIndex);

      if (oldIndex == newIndex) {
        this.$items.eq(oldIndex).show();
        this.$controls.eq(oldIndex).addClass('selected');
      } else {
        this.updateItems(this.$items.eq(oldIndex), this.$items.eq(newIndex));
      }

      this.$index = newIndex;
    },
    updateItems: function($oldItem, $newItem) {
      this.$items.stop(true, true);

      var newbg = $newItem.css('background-image');
      if (newbg != null && newbg.substr(0, 4) == 'url(') {
        var newbgurl = newbg.substr(4, newbg.length - 5);
        var newImgDiv = $("<div style='position:absolute'>");
        var newImg = $("<img src=" + newbgurl + ">");
        newImg.appendTo(newImgDiv);
        $newItem.css('background-image', '');
        newImgDiv.prependTo($newItem);
      }

      $oldItem.fadeOut(1000);
      $newItem.fadeIn(1000);
    },
    updateControls: function() {

    },
    play: function() {
      if( ! this.$timer) {
        this.$timer = setInterval($.proxy(this.next, this), 7000);
      }
    },
    pause: function() {
      if (this.$timer) {
        clearInterval(this.$timer);
        this.$timer = null;
        console.log(this.$timer);
      }
    },
    previous: function() {
      this.go(-1);
    },
    next: function() {
      this.go(1);
    },
    resize: function() {
      var width = $(window).width(),
          height = $(window).height(),
          aspect = height / width;

      this.$items.each(function(index, element) {
        var $element = $(element);
        console.log($element);
      });
    }
  });

  var O = RS.Overlay = {};
  $.extend(O, {
    $bg: null,
    $popup: null,
    $close: null,

    defaults: {
      
    },

    open: function(blob, type, options) {
      var overlay = this;

      if (type == 'image') {
        var image = document.createElement('img');
        var $image = $(image);
      } else if(type == 'ajax') {
        $('<div>').load(blob, options, function(response, status, xhr) {
          if (xhr.status == 401) {
            overlay.close();
            window.location.href = "/login";
          } else {
            overlay.hideLoading();
            overlay.add($(this));
          }
        });
      } else {
        this.add(blob);
      }

      var $container = $("<div>").attr('id', 'overlay');

      this.$bg = $("<div>").attr('id', 'overlay-bg').appendTo($container);
      this.$popup = $('<div>').attr('id', 'overlay-popup').hide().appendTo($container);

      this.$close = createCloseButton().appendTo(this.$popup);

      $container.appendTo(document.body);

      this.$popup.show();

      function createLoading() {
        return $('<div id="overlay-loading"></div>');
      }

      function createCloseButton() {
        return $('<a href="#"></a>').addClass('close').click(function() {
          overlay.close.call(overlay);
          return false;
        });
      }
    },
    close: function() {},
    create: function() {
      var overlay = this;
      if (this.$content) {
        return false;
      }

      var $container = $('<div>').attr('id', 'overlay');

      this.attachKeydownHandler();
      this.attachResizeHandler();

      this.$bg = $('<div>').attr('id', 'overlay-bg').appendTo($container);
      this.$popup = $('<div>').attr('id', 'overlay-popup').hide().appendTo($container);
    },
    add: function($blob, animate) {
      var $content = this.$content.show();
      var $popup = this.$popup.show();
    },
    center: function() {},
    scale: function() {},
    hide: function() {
      this.$popup.hide();
    },
    // -------------------------------------
    // Event handlers
    // -------------------------------------
    attachResizeHandler: function() {

    },
    attachKeydownHandler: function() {

    },
    attachClickHandlers: function() {

    }
  });
})(jQuery, RS);