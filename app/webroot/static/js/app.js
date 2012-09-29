var RS = RS || {};

(function($, RS) {
  RS.carousel = function() {
    // プライベートメソッド、メンバ
    var index = 0,
        itemLength = 0,
        controllerArea = null,
        controls = null,
        items = null,
        timer = null;

    var go = function(step) {
      var absoluteIndex = (index + step) % itemLength;
      update(absoluteIndex);
    }
    var play = function() {
      // ローテーションを開始する
      if ( ! timer) {
        timer = setInterval($.proxy(next, this), 7000);
      }
    }
    var pause = function() {
      // ローテーションを止める
      if (timer) {
        clearInterval(timer);
      }
      timer = null;
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
        controls.eq(oldIndex).addClass('selected');
      } else {
        updateItems(items.eq(oldIndex), items.eq(newIndex));
        updateControls(controls.eq(oldIndex), controls.eq(newIndex));
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
    var createController = function() {
      var controller = $('<div>').addClass('controller');

      for (var i = 0; i < itemLength; i++) {
        console.log("loop");
        var control = $('<a>');

        control.data('index', i).click($.proxy(function(e) {
          pause();

          var newIndex = parseInt($(e.target).data('index'));
          update(newIndex);
        }, this));

        control.appendTo(controller);
      }

      return controller;
    }
    var updateControls = function(oldControl, newControl) {
      function animate(control, add) {
        if (add) {
          control.addClass('selected');
        } else {
          control.removeClass('selected');
        }
      }

      controls.stop(true, true);
      animate(oldControl, false);
      animate(newControl, true);
    }

    // パブリックメソッド
    return {
      initialize: function() {
        var carousel = $('.carousel');

        items = carousel.children().hide();
        itemLength = carousel.children().length;

        // コントローラーを作成してカルーセルボックスに追加する
        controllerArea = createController().appendTo(carousel);
        controls = controllerArea.children();

        go(0);
        play();
      }
    }
  }();

  RS.overlay = function() {
    // プライベートメソッド、メンバ
    var overlay,
        content,
        bg,
        popup,
        loading,
        closeBtn,
        blobData,
        iframe,
        iframeOptions = {};

    var close = function() {
      destroy();
      return false;
    }
    var create = function(type) {
      overlay = $('<div>').attr('id', 'overlay');

      attachResizeHandler();
      attachKeydownHandler();

      bg = $('<div>').attr('id', 'overlayBG').appendTo(overlay);
      bg.click(function(e) {
        close();
        e.preventDefault();
      });

      if (type == 'image' || type == 'ajax') {
        loading = createLoading().appendTo(overlay);
      }

      if (type == 'ajax') {
        content = $('<div>').attr('id', 'overlayBody').hide().appendTo(overlay);
        iframe = createIframe(blobData).appendTo(content);
      } else {
        // console.log("other");
        content = $('<div>').attr('id', 'overlayBody').hide().appendTo(overlay);
      }

      closeBtn = createCloseButton().appendTo(content);

      overlay.appendTo(document.body);

      return true;

      function createLoading() {
        return $('<div id="overlayLoading"></div>');
      }
      function createIframe(blob) {
        return $('<iframe>').attr({
          'id': 'eventIframe',
          'src': blob,
          'frameborder': '0'
        });
      }
      function createCloseButton() {
        return $('<a href=""></a>').addClass('overlayClose').click(function(e) {
          close();
          e.preventDefault();
        });
      }
    }
    var add = function(blob) {
      content.show();
      blob.appendTo(content);
      resize();
    }
    var destroy = function() {
      content = null;
      bg = null;
      popup = null;
      loading = null;
      closeBtn = null;
      blob = null;

      $(document).unbind('.overlay');

      $('#overlay').remove();

      container = null;
    }
    var showLoading = function() {
      loading.show();
    }
    var hideLoading = function() {
      loading.hide();
      loading.remove();
    }
    var resize = function() {
      var iframe = $('#eventIframe');
      if (iframe) {
        // iframe.css({});
      }

      var overlayBodyHeight = $("#overlayBody").height();
      $("#overlayBody").css({height: overlayBodyHeight - 90 + "px"});
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
      open: function(blob, type) {
        if (type == 'ajax') {
          blobData = blob;
        }
        if ( ! create(type)) {
          close();
          return;
        }

        if (type == 'ajax') {
          
        } else if(type == 'div') {
          // ドキュメント内のコンテンツを取得して表示する
          add($(blob));
        } else if(type == 'iframe') {
          // iframeをダイアログ内に表示する
          add($('#eventIframe'));
        } else if(type == 'image') {
          // 画像のスライドショーを表示する
        } else {
          // typeが判定できない場合は処理せずにダイアログを閉じる
          close();
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
  $(".tips").tipsy({html: true});
});