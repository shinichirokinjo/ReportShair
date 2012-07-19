var RS = RS || {};

(function($, RS) {
  var ENV = 'develop', // production
      DEBUG = false,
      VERSION = "20120713-v0.0.1";

  var A = RS.Alert = {};
  $.extend(A, {
    // アラート
    showMsg: function(msg) {
      console.log(msg);
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
    type: null,

    $bg: null,
    $popup: null,
    $close: null,
    $elements: null,
    $loading: null,
    $blob: null,

    open: function(blob, type, options) {
      var overlay = this;
      overlay.busy = true;

      this.type = type;

      if ( ! this.create(type)) {
        return;
      }

      if (type == 'image') {
        //
      } else if(type == 'ajax') {
        $('<div>').load(blob, options, function(response, status, xhr) {
          if (xhr.status == 401) {
            overlay.close();
            return;
          } else {
            overlay.hideLoading();
            overlay.add($(this));
          }
        });
      } else if(type == 'div') {
        this.$blob = $(blob);
        overlay.add(this.$blob);
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
    add: function($blob) {
      var $content = this.$content.show();
      var $popup = this.$popup.show();

      $blob.appendTo($content.empty()).show();
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

      if (type == 'image' || type == 'ajax') {
        this.$loading = createLoading().appendTo($container);
      }

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
      if (this.type == 'div') {
        this.$blob.css({display: 'none'});
        this.$blob.appendTo(document.body);
      }
      this.$bg = null;
      this.$popup = null;
      this.$content = null;
      this.$close = null;
      this.$elements = null;
      this.$loading = null;

      this.type = null;
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