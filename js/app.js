var RS = RS || {};

(function($, RS) {
  var ENV = 'develop', // production
      DEBUG = false,
      VERSION = "20120713-v0.0.1";

  var A = RS.Alert = {};
  $.extend(A, {
    // アラート
  });

  var B = RS.Browser = {}; // ユーティリティに持っていく
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
    // トップページの背景画像のギャラリー
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

  var D = RS.Dropdown = {};
  $.extend(D, {

  });

  var O = RS.Overlay = {};
  $.extend(O, {
    // モーダルビュー
    busy: false,
    closeCallback: null,

    $bg: null,
    $popup: null,
    $close: null,
    $elements: null,
    $loading: null,

    open: function(blob, type, options) {
      var overlay = this;
      overlay.busy = true;

      var created = this.create(type);

      if (type == 'image') {
        //
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
      } else if(type == 'div') {
        overlay.add($(blob));
      } else {
        this.add(blob);
      }

      this.$popup.show();
    },
    close: function() {
      var cb = this.closeCallback;
      if (cb && !cb()) {
        return;
      }

      this.destroy();

      return false;
    },
    add: function(blob) {
      var $content = this.$content.show();
      var $popup = this.$popup.show();

      blob.appendTo($content.empty()).show();
    },
    create: function(type) {
      var overlay = this;
      if (this.$content) {
        return false;
      }

      var $container = $('<div>').attr('id', 'overlay');

      this.attachKeydownHandler();
      this.attachResizeHandler();

      this.$bg = $('<div>').attr('id', 'overlay-bg').appendTo($container);
      this.$bg.click(function() {
        overlay.close.call(overlay);
      });

      this.$popup = $('<div>').attr('id', 'overlay-popup').hide().appendTo($container);

      this.$content = $('<div>').addClass('overlay-content').appendTo(this.$popup);

      this.$close = createCloseButton().appendTo(this.$popup);

      $container.appendTo(document.body);

      return true;

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
    destroy: function() {
      this.$bg = null;
      this.$popup = null;
      this.$content = null;
      this.$close = null;
      this.$elements = null;
      this.$loading = null;

      this.closeCallback = null;

      $(document).unbind('.overlay');
      $(window).unbind('.overlay');

      $('#overlay').remove();
    },
    center: function() {
      // 現段階ではCSS側で制御する
    },
    scale: function() {
      // 現段階ではCSS側で制御する
    },
    hide: function() {
      this.$popup.hide();
    },
    go: function(step) {
      if (this.busy) {
        return;
      }

      var newIndex = (this.currentIndex + step) % this.$elements.length;
      var $element = this.$elements.eq(newIndex);
      $element.trigger('click');
    },
    previous: function() {
      this.go(-1);
      return false;
    },
    next: function() {
      this.go(1);
      return false;
    },
    showLoading: function() {
      this.$loading.show();
    },
    hideLoading: function() {
      this.$loading.hide();
    },
    // -------------------------------------
    // Event handlers
    // -------------------------------------
    attachResizeHandler: function() {
      function resizeHandler(event) {
        this.scale(event);
        this.center(event);
      }

      $(window).bind('resize.overlay', $.proxy(resizeHandler, this));
    },
    attachKeydownHandler: function() {
      function keydownHandler(event) {
        if (event.keyCode == 27) {
          this.close();
        }
      }

      $(document).bind('keydown.overlay', $.proxy(keydownHandler, this));
    },
    attachClickHandlers: function($elements, optionsArray, fn) {
      this.$elements = $elements;

      $elements.click($.proxy(clickHandler, this));

      function clickHandler(event) {
        var target = event.currentTarget;
      }
    }
  });
})(jQuery, RS);