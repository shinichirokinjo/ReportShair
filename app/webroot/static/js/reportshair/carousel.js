define(["jquery/jquery"], function($) {
  var Carousel = function() {
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

    return {
      /*!
       * カルーセルを開始する
       *
       * @access public
       */
      init: function() {
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
  }

  return Carousel;
});