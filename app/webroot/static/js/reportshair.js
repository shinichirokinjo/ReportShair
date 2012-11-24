define(["jquery/jquery"], function($) {
  var carousel = function() {
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

  var overlay = function() {
    // プライベートメソッド、メンバ
    var overlay,
        container,
        content,
        bg,
        popup,
        loading,
        blobData,
        iframe,
        options = {};

    var close = function() {
      destroy();
      return false;
    }
    var create = function(type) {
      // コンテナを作成
      overlay = $('<div>').attr('id', 'overlay');
      if ('class' in options) {
        overlay.attr('class', options['class']);
      }

      // 各種イベントハンドラーを登録
      attachResizeHandler();
      attachKeydownHandler();

      // 背景を追加して、その部分がクリックされるとダイアログが閉じるようにする
      bg = $('<div>').attr('id', 'overlayBG').appendTo(overlay);
      bg.click(function(e) {
        close();
        return false;
      });

      // 何らかの通信が発生するタイプの場合は通信に時間がかかる場合もあるので
      // ローディング中を表示しておく。add()するタイミングでhideLoading()で非表示にする。
      if (type == 'image' || type == 'ajax' || type == 'iframe') {
        loading = createLoading().appendTo(overlay);
      }

      container = $('<div>').attr('id', 'overlayContainer').hide().appendTo(overlay);

      if (type == 'iframe') {
        iframe = createIframe(blobData).appendTo(container);
      }

      // 右上の閉じるボタンを作成してコンテンツに追加する
      createCloseButton().appendTo(container);

      overlay.appendTo(document.body);

      // trueを返すと、open()で以降の処理に進む
      return true;

      function createLoading() {
        return $('<div id="overlayLoading"></div>');
      }
      function createIframe(blob) {
        return $('<iframe>').attr({
          id: 'dialogIframe',
          src: blob,
          scrolling: 0,
          frameborder: 0
        });
      }
      function createCloseButton() {
        return $('<a href=""></a>').addClass('overlayClose').click(function() {
          close();
          return false;
        });
      }
    }
    var add = function(blob) {
      blob.appendTo(container);

      // ダイアログのコンテナを表示する
      container.show();

      resize();

      // ローディング中を非表示にする
      hideLoading();
    }

    /*!
     * ダイアログを閉じた時に破棄する
     */
    var destroy = function() {
      // 全て空にする
      container = null;
      content = null;
      bg = null;
      popup = null;
      loading = null;
      blobData = null;
      options = {};

      $(document).unbind('.overlay');

      $('#overlay').remove();
      overlay = null;
    }

    /*!
     * ダイアログのコンテンツをロード中に表示する
     * ローダーを表示する
     */
    var showLoading = function() {
      loading.show();
    }
    /*!
     * ダイアログのコンテンツをロードが終わった時に
     * ローダーを非表示にする
     */
    var hideLoading = function() {
      loading.hide();
      loading.remove();
    }

    /*!
     * ダイアログのサイズをリサイズする
     */
    var resize = function() {
      var overlayContentMargin = 37;
      if ($("#overlayFoot")) {
        overlayContentMargin = 92;
      }

      var dialogIframeHeight = $("#dialogIframe").height();
      $("#overlayContent").css({height: dialogIframeHeight - overlayContentMargin + "px"});
    }
    var attachResizeHandler = function() {
      function resizeHandler(event) {
        resize(); // ダイアログをリサイズする
      }
      $(window).bind('resize.overlay', $.proxy(resizeHandler, this));
    }
    var attachKeydownHandler = function() {
      function keydownHandler(event) {
        if (event.keyCode == 27) {
          close(); // Escでダイアログを閉じる
        }
      }
      $(document).bind('keydown.overlay', $.proxy(keydownHandler, this));
    }

    return {
      /*!
       * ダイアログをオープンする
       *
       * @access public
       * @param  blob    ダイアログ内に表示するデータ
       * @param  type    ダイアログのタイプ
       * @param  options オプション(任意)
       */
      open: function(blob, type, settings) {
        // create()で操作する場合もあるので一度変数に入れておく
        blobData = blob;
        options = settings;

        // ダイアログのコンテナを作成できてtrueが返ってこなかったらダイアログを閉じる
        if ( ! create(type)) {
          close();
          return;
        }

        if (type == 'ajax') {
          $('<div>').load(blobData, options, function(response, status, xhr) {
            if (xhr.status == 401) {
              close();
            } else {
              add($(this));
            }
          });
        } else if(type == 'div') {
          // ドキュメント内のコンテンツを取得して表示する
          add($(blobData));
        } else if(type == 'iframe') {
          // iframeをダイアログ内に表示する
          add(iframe);
        } else if(type == 'image') {
          // 画像のスライドショーを表示する
        } else {
          // typeが判定できない場合は処理せずにダイアログを閉じる
          close();
        }
      },
      closeDialog: function() {
        close();
      }
    }
  }

  var scrolltop = function() {
    var windowHeight = $(window).height() / 2;

    return {
      init: function() {
        $(window).on('scroll', function() {
          (window.innerWidth ? window.pageYOffset : document.documentElement.scrollTop) >= windowHeight ? $("#scrollToTop").removeClass("offScreen") : $("#scrollToTop").addClass("offScreen");
        });
        $("#scrollToTop").on('click', function() {
          $("html, body").animate({scrollTop: "0px"}, 400);
          return false;
        });
      }
    }
  }

  var timeline = function() {
    return {
      init: function() {
        $(".createEvent a").on('click', function(e) {
          e.preventDefault();
          RS.overlay.open('/reports/dialog/event', 'ajax');
        });

        $(".reportMeta .about").on('click', function(e) {
          e.preventDefault();
          alert("Click About: 文章のテキストフォームを表示させる予定");
        });
        $(".reportMeta .events").on('click', function(e) {
          e.preventDefault();
          alert("Click Events: 最初に表示されるタイムラインが表示される。最初はこれが表示させるためにページ遷移後ローダーが回って取得表示できたら、このエリアが色等が変わって今はこれを見ているということがわかるようにする。");
        });
        $(".reportMeta .photos").on('click', function(e) {
          e.preventDefault();
          alert("Click Photos: 下のタイムラインのところに写真の一覧をグリッドレイアウトで表示させる予定");
        });
        $(".reportMeta .wents").on('click', function(e) {
          e.preventDefault();
          alert("Click Wents: レポートの応援？しているユーザーの一覧をリストレイアウトで表示させる予定(TwitterのFollowerの一覧みたいなのを考えている)");
        });

        $(".typeNav .typeText").on('click', function(e) {
          e.preventDefault();
          alert("Click Photo: テキストの投稿フォームを表示させる予定");
        });
        $(".typeNav .typePhoto").on('click', function(e) {
          e.preventDefault();
          alert("Click Photo: 写真のアップロードフォームを表示させる予定");
        });
        $(".typeNav .typeVideo").on('click', function(e) {
          e.preventDefault();
          alert("Click Video: ビデオのアップロードフォームを表示させる予定");
        });
        $(".typeNav .typeFile").on('click', function(e) {
          e.preventDefault();
          alert("Click File: ファイルのアップロードフォームを表示させる予定");
        });
        $(".typeNav .typeLink").on('click', function(e) {
          e.preventDefault();
          alert("Click Link: リンクの投稿フォームを表示させる予定");
        });
      }
    }
  }

  return {
    carousel: carousel(),
    overlay: overlay(),
    scrolltop: scrolltop(),
    timeline: timeline()
  }
});
