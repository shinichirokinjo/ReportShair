define(["jquery/jquery"], function($) {
  var Timeline = function() {
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

  return Timeline;
});