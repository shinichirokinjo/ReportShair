define(["jquery/jquery"], function($) {
  var Overlay = function() {
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

  return Overlay;
});