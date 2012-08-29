var RS = RS || {};

(function($, RS) {
  RS.carousel = function() {
    // プライベートメソッド、メンバ
    var index  = 0,
        length = 0,
        items  = null,
        timer  = null;

    var go = function(step) {
      var absoluteIndex = (index + step) % length;
      update(absoluteIndex);
    }
    var play = function() {
      if ( ! timer) {
        timer = setInterval($.proxy(next, this), 7000);
      }
    }
    var pause = function() {
      // 止めることはないので空で一応メソッド定義だけしておく
    }
    var previous = function() {
      go(-1);
    }
    var next = function() {
      go(1);
    }
    var update = function(newIndex) {
      var oldIndex = index;

      if (oldIndex == newIndex) {
        items.eq(oldIndex).show();
      } else {
        updateItems(items.eq(oldIndex), items.eq(newIndex));
      }

      index = newIndex;
    }
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
    }

    // パブリックメソッド
    return {
      initialize: function() {
        var carousel = $('.carousel');

        items  = carousel.children().hide();
        length = carousel.children().length;

        go(0);
        play();
      }
    }
  }();

  RS.overlay = function() {
    // プライベートメソッド、メンバ
    var container = null,
        content = null,
        bg = null,
        popup = null,
        loading = null,
        closeBtn = null;

    var close = function() {
      destroy();
      return false;
    }
    var create = function(type) {
      container = $('<div>').attr('id', 'overlay');

      attachResizeHandler();
      attachKeydownHandler();

      bg = $('<div>').attr('id', 'overlayBG').appendTo(container);
      bg.click(function() {
        close();
        return false;
      });

      popup = $('<div>').attr('id', 'overlayPopup').hide().appendTo(container);
      content = $('<div>').addClass('overlayContent').appendTo(popup);

      if (type == 'image' || type == 'ajax') {
        loading = createLoading().appendTo(container);
      }
      closeBtn = createCloseButton().appendTo(popup);

      container.appendTo(document.body);

      return true;

      function createLoading() {
        return $('<div id="overlayLoading"></div>');
      }
      function createCloseButton() {
        return $('<a href="#"></a>').addClass('overlayClose').click(function() {
          close();
          return false;
        });
      }
    }
    var add = function(blob) {
      // console.log(blob);
      content.show();
      popup.show();

      blob.appendTo(content);

      resize();
    }
    var destroy = function() {
      content = null;
      bg = null;
      popup = null;
      loading = null;
      closeBtn = null;

      $(document).unbind('.overlay');

      $('#overlay').remove();

      container = null;
    }
    var showLoading = function() {
      loading.show();
    }
    var hideLoading = function() {
      loading.hide();
      loading = false;
    }
    var resize = function() {
      var overlayHeight = $("#overlayPopup").height();

      $(".overlayBody").css({height: overlayHeight - 90 + "px"});
    }
    var attachResizeHandler = function() {
      function resizeHandler(event) {
        resize();
      }
      $(window).bind('resize.overlay', $.proxy(resizeHandler, this));
    }
    var attachKeydownHandler = function() {
      function keydownHandler(event) {
        if (event.keyCode == 27) { // Esc
          close();
        }
      }
      $(document).bind('keydown.overlay', $.proxy(keydownHandler, this));
    }

    // パブリックメソッド
    return {
      open: function(blob, type, options) {
        var overlay = this;

        if ( ! create(type)) {
          return;
        }

        if (type == 'image') {
          //
        } else if(type == 'ajax') {
          // Ajaxでコンテンツを取得して表示
          $('<div>').load(blob, options, function(response, status, xhr) {
            if (xhr.status == 401) {
              close();
            } else {
              hideLoading();
              add($(this));
            }
          });
        } else if(type == 'div') {
          // ドキュメント内のコンテンツを取得して表示
          add($(blob));
        } else {
          add(blob);
        }
      }
    }
  }();
})(jQuery, RS);

$(function() {
  $(".createNav a").on('click', function(e) {
    RS.overlay.open('/reports/dialog/report', 'ajax');
    e.preventDefault();
  });
});