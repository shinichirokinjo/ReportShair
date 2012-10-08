<header id="overlayHead">
  <h1>レポートの新規作成</h1>
</header>
<form action="" method="POST" accept-charset="utf-8">
<div id="overlayContent">
  <fieldset class="dialogReportBoard">
    <div class="dialogCoverImage">
      <div class="dialogCoverWrap">
        <div id="uploader" style="height: 300px;">
          <a id="uploadCoverPhotoHandler" href="">画像をアップロードする</a>
        </div>
      </div>
    </div>
    <div class="dialogReportInfo">
      <div class="dialogName">
        <div class="dialogReportThumb">
          <span class="dialogReportImage"></span>
        </div>
        <h2 class="dialogReportName">WOMB (Official)</h2>
      </div>
    </div>
  </fieldset>
</div>
<footer id="overlayFoot">
  <button type="submit">作成</button>
  <button type="cancel">キャンセル</button>
</footer>
</form>
<script type="text/javascript" src="/static/js/plupload/plupload.js"></script>
<script type="text/javascript" src="/static/js/plupload/plupload.flash.js"></script>
<script type="text/javascript" src="/static/js/plupload/plupload.html5.js"></script>
<script type="text/javascript" src="/static/js/plupload/plupload.html4.js"></script>
<script type="text/javascript">
// Pluploadの設定
var pluploadConfig = {
  runtimes: "html5,flash,html4",
  browse_button: "uploadCoverPhotoHandler",
  container: "uploader",
  url: "",
  flash_swf_url: "/static/js/plupload/plupload.flash.swf",
  filters: [
    {title: "Image files", extensions: "jpg,gif,png"}
  ],
  max_file_size: "3mb",
  multi_selection: false
};

$(function() {
  var uploader;

  var resizeOverlayContent = function() {
    var containerHeight,
        contentHeight;

    containerHeight = $("body").height();
    contentHeight = containerHeight - 92;

    $("#overlayContent").css({height: contentHeight + "px"});
  }

  $(window).bind('resize.overlayContent', function() {
    resizeOverlayContent();
  });

  plupload_init = function() {
    uploader = new plupload.Uploader(pluploadConfig);

    uploader.bind('Init', function(up, params) {
      // アップローダーが初期化する際に一度実行される
      // 具体的にuploader.init()で実行される
    });

    uploader.init();

    uploader.bind('FilesAdded', function(up, files) {
      // ファイルを追加した後に呼び出される
      // console.log("Added files");
      // console.log(up);
      // console.log(files);
    });

    uploader.bind('BeforeUpload', function(up, file) {
      // アップロード処理の直前に実行される
    });

    uploader.bind('UploadFile', function(up, file) {
      //
    });

    uploader.bind('UploadProgress', function(up, file) {
      // アップロード中のプログレス処理
    });

    uploader.bind('Error', function(up, err) {
      // エラーが発生した時に呼び出される
    });

    uploader.bind('FileUploaded', function(up, file, response) {
      // ファイルのアップロードが完了した時に呼び出される
    });

    uploader.bind('UploadComplete', function(up, files) {
      // 一連のアップロード処理がすべて終了した時に呼び出される
    });
  }

  if (typeof(pluploadConfig) == 'object') {
    plupload_init();
    resizeOverlayContent();
  }
});
</script>