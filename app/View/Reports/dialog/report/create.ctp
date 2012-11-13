<header id="overlayHead">
  <h1>レポートの新規作成</h1>
</header>
<form action="" method="POST" accept-charset="utf-8">
<div id="overlayContent">
  <fieldset class="dialogReportBoard">
    <div class="dialogCoverImage">
      <div class="dialogCoverWrap">
        <div id="uploader" style="height: 300px;">
          <a id="uploadCoverPhotoHandler" href="#">画像をアップロードする</a>
        </div>
      </div>
    </div>
    <div class="dialogReportInfo">
      <div class="dialogName">
        <div class="dialogReportThumb">
          <span class="dialogReportImage">
            <a id="uploadIconPhotoHandler" href="#">アイコンをアップロードする</a>
          </span>
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
var pluploadCoverConfig = {
  runtimes: "html5,flash,html4",
  browse_button: "uploadCoverPhotoHandler",
  container: "uploader",
  url: "/reports/dialog/upload/cover",
  flash_swf_url: "/static/js/plupload/plupload.flash.swf",
  filters: [
    {title: "Image files", extensions: "jpg,gif,png"}
  ],
  max_file_size: "3mb",
  multi_selection: false,
  multipart_params: {
    "_method": "POST",
    "data[_Token][key]": "<?php print_r($this->Form->request->params['_Token']['key'])?>",
  }
};

$(function() {
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

  var plupload_cover_init = function() {
    var uploader = new plupload.Uploader(pluploadCoverConfig);

    uploader.bind('Init', function(up, params) {
      // アップローダーが初期化する際に一度実行される
      // 具体的にuploader.init()で実行される
    });

    uploader.init();

    uploader.bind('FilesAdded', function(up, files) {
      // ファイルを追加した後に呼び出される
      console.log("Added files");
      // console.log(up);
      // console.log(files);
      up.refresh();
      up.start();
    });

    uploader.bind('BeforeUpload', function(up, file) {
      // アップロード処理の直前に実行される
    });

    uploader.bind('UploadFile', function(up, file) {
      console.log(up);
      console.log(file);
    });

    uploader.bind('UploadProgress', function(up, file) {
      // アップロード中のプログレス処理
      console.log('Now uploading...');
    });

    uploader.bind('Error', function(up, err) {
      // エラーが発生した時に呼び出される
    });

    uploader.bind('FileUploaded', function(up, file, response) {
      // ファイルのアップロードが完了した時に呼び出される
      var parsedData = $.parseJSON(response.response);
      console.log(parsedData);

      console.log($('#uploadCoverPhotoHandler').text());
      $('#uploadCoverPhotoHandler').text("");
      $('#uploadCoverPhotoHandler').append('<img src="' + parsedData.cover_url +'" width="" height="" alt="" />');
    });

    uploader.bind('UploadComplete', function(up, files) {
      // 一連のアップロード処理がすべて終了した時に呼び出される
    });
  }

  if (typeof(pluploadCoverConfig) == 'object') {
    plupload_cover_init();
    resizeOverlayContent();
  }
});

// Pluploadの設定
var pluploadIconConfig = {
  runtimes: "html5,flash,html4",
  browse_button: "uploadIconPhotoHandler",
  container: "uploader",
  url: "/reports/dialog/upload/icon",
  flash_swf_url: "/static/js/plupload/plupload.flash.swf",
  filters: [
    {title: "Image files", extensions: "jpg,gif,png"}
  ],
  max_file_size: "3mb",
  multi_selection: false,
  multipart_params: {
    "_method": "POST",
    "data[_Token][key]": "<?php print_r($this->Form->request->params['_Token']['key'])?>",
  }
};

$(function() {
  var plupload_icon_init = function() {
    var uploader = new plupload.Uploader(pluploadIconConfig);

    uploader.bind('Init', function(up, params) {
      // アップローダーが初期化する際に一度実行される
      // 具体的にuploader.init()で実行される
    });

    uploader.init();

    uploader.bind('FilesAdded', function(up, files) {
      // ファイルを追加した後に呼び出される
      console.log("Added files");
      // console.log(up);
      // console.log(files);
      up.refresh();
      up.start();
    });

    uploader.bind('BeforeUpload', function(up, file) {
      // アップロード処理の直前に実行される
    });

    uploader.bind('UploadFile', function(up, file) {
      console.log(up);
      console.log(file);
    });

    uploader.bind('UploadProgress', function(up, file) {
      // アップロード中のプログレス処理
      console.log('Now uploading...');
    });

    uploader.bind('Error', function(up, err) {
      // エラーが発生した時に呼び出される
    });

    uploader.bind('FileUploaded', function(up, file, response) {
      // ファイルのアップロードが完了した時に呼び出される
      var parsedData = $.parseJSON(response.response);
      console.log(parsedData);
    });

    uploader.bind('UploadComplete', function(up, files) {
      // 一連のアップロード処理がすべて終了した時に呼び出される
    });
  }

  if (typeof(pluploadIconConfig) == 'object') {
    plupload_icon_init();
  }
});
</script>
