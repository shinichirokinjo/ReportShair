<header id="overlayHead">
  <ul>
    <li><a href="/reports/dialog/report/select">ステップ1</a></li>
    <li>レポートの新規作成</li>
  </ul>
</header>
<form action="" method="">
<div id="overlayContent">
  <fieldset>
    <div class="coverImageField">
      <div class="coverWrapField">
        <div id="uploader" style="height: 300px;">
          <a id="uploadCoverPhotoHandler" href="" style="width: 100px; height: 100px; background-color: #000;">画像をアップロードする</a>
        </div>
      </div>
    </div>
    <div class="field">
      <div class="fieldHead">レポートのアイコン</div>
      <div class="fieldBody">
        <input type="image" name="" value="" />
      </div>
      <div class="filedFoot"></div>
    </div>
    <div class="field">
      <div class="fieldHead">レポート名</div>
      <div class="fieldBody">
        <input type="text" name="" value="" />
      </div>
      <div class="filedFoot"></div>
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

  plupload_init = function() {
    uploader = new plupload.Uploader(pluploadConfig);

    uploader.bind('Init', function(up, params) {
      //
    });

    uploader.init();

    uploader.bind('FilesAdded', function(up, files) {
      console.log("Added files");
      console.log(up);
      console.log(files);
    });

    uploader.bind('BeforeUpload', function(up, file) {
      //
    });

    uploader.bind('UploadFile', function(up, file) {
      //
    });

    uploader.bind('UploadProgress', function(up, file) {
      //
    });

    uploader.bind('Error', function(up, err) {
      //
    });

    uploader.bind('FileUploaded', function(up, file, response) {
      // ファイルのアップロードが完了した時に呼び出される
    });

    uploader.bind('UploadComplete', function(up, files) {
      //
    });
  }

  if (typeof(pluploadConfig) == 'object') {
    plupload_init();
  }
});
</script>