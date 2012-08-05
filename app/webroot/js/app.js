var RS = RS || {};

(function($, RS) {
  var DEBUG = true;

  // トップページの背景画像のギャラリー
  RS.Carousel = function() {
    // プライベートメソッド、メンバ
    var index  = 0,
        length = 0,
        items  = null,
        timer  = null;

    var go = function(step) {
      var absoluteIndex = (index + step) % length;
      if (DEBUG) {
        console.log(absoluteIndex + "枚目の写真を表示");
      };
      update(absoluteIndex);
    };
    var play = function() {
      if ( ! timer) {
        timer = setInterval($.proxy(next, this), 7000);
      }
    };
    var pause = function() {
      
    };
    var previous = function() {
      go(-1);
    };
    var next = function() {
      go(1);
    };
    var update = function(newIndex) {
      var oldIndex = index;

      if (oldIndex == newIndex) {
        items.eq(oldIndex).show();
      } else {
        updateItems(items.eq(oldIndex), items.eq(newIndex));
      }

      index = newIndex;
    };
    var updateItems = function(oldItem, newItem) {
      items.stop(true, true);

      var newbg = newItem.css('background-image');
      if (newbg != null && newbg.substr(0, 4) == 'url(') {
        var newbgurl  = newbg.substr(4, newbg.length - 5);
        var newImgDiv = $("<div style='position:absolute'>");
        var newImg    = $("<img src=" + newbgurl + ">");

        newImg.appendTo(newImgDiv);
        newItem.css('background-image', '');
        newImgDiv.prependTo(newItem);
      }

      oldItem.fadeOut(1000);
      newItem.fadeIn(1000);
    };

    // パブリックメソッド
    return {
      /*!
       * 初期化
       */
      initialize: function() {
        var carousel = $('.carousel');

        items  = carousel.children().hide();
        length = carousel.children().length;

        go(0);
        play();
      }
    }
  }();

  // モーダルビュー
  RS.Overlay = function() {
    // プライベートメソッド、メンバ
    var container,
        content,
        close,
        loading = null,
        popup,
        bg;

    var close = function() {
      destroy();
      return false;
    };
    var create = function(type) {
      if (content) {
        return false;
      }

      container = $('<div>').attr('id', 'overlay');

      attachKeydownHandler();

      bg = $('<div>').attr('id', 'overlay-bg').appendTo(container);
      bg.click(function() {
        close();
        return false;
      });

      popup = $('<div>').attr('id', 'overlay-popup').hide().appendTo(container);
      content = $('<div>').addClass('overlay-content').appendTo(popup);

      if (type == 'image' || type == 'ajax') {
        loading = createLoading().appendTo(container);
      }

      close = createCloseButton().appendTo(popup);

      container.appendTo(document.body);

      return true;

      function createLoading() {
        return $('<div id="overlay-loading"></div>');
      }
      function createCloseButton() {
        return $('<a href="#"></a>').addClass('close').click(function() {
          close();
          return;
        });
      }
    };
    var destroy = function() {
      loading = null;

      $(document).unbind('.overlay');

      $('#overlay').remove();
    };
    var showLoading = function() {
      loading.show();
    };
    var hideLoading = function() {
      loading.hide();
      loading = null;
    };
    var attachKeydownHandler = function() {
      function keydownHandler(event) {
        // Esc
        if (event.keyCode == 27) {
          close();
        }
      }

      $(document).bind('keydown.overlay', $.proxy(keydownHandler, this));
    };

    // パブリックメソッド
    return {
      /*!
       * モーダルボックスを表示する
       *
       * blob: 
       * type: 
       * options:
       */
      open: function(blob, type, options) {
        this.type = type;

        if ( ! create(type)) {
          return;
        }

        popup.show();
      }
    }
  }();
})(jQuery, RS);