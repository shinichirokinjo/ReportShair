<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>ダイアログ</title>
<!-- STYLE -->
<link rel="stylesheet" href="../css/screen.css" media="screen" />
<!-- SCRIPT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
<script src="../js/plupload/plupload.js"></script>
<script src="../js/plupload/plupload.gears.js"></script>
<script src="../js/plupload/plupload.silverlight.js"></script>
<script src="../js/plupload/plupload.flash.js"></script>
<script src="../js/plupload/plupload.browserplus.js"></script>
<script src="../js/plupload/plupload.html5.js"></script>
<script src="../js/plupload/plupload.html4.js"></script>
</head>

<body class="dialog">
<div id="bodyArea">
  <div id="uploader" class="dialogContent">
    <h2>自分のコンピューターから<a href="/dashboard/media/">メディア</a>にファイルを追加する</h2>
    <form class="media-upload-form" action="/dashboard/media/upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <input type="file" id="pickerBtn" name="image" />
    </form>
    <p class="runtime"></p>
  </div>
</div>
<script type="text/javascript">
var uploaderInit, imageArea;
uploaderInit = {
  "runtimes": "html5,flash,html4",
  "browse_button": "pickerBtn",
  "container": "uploader",
  // "url": "/dashboard/media/upload",
  "flash_swf_url": "/js/plupload/plupload.flash.swf",
  "filters": [
    {title: "Image files", extensions: "jpg,gif,png"}
  ],
  "max_file_size": "5mb",
  "multipart": true,
  "multipart_params": {
    "key": "test"
  }
};

function uploadStart() {
  return true;
}

function uploadProgress(up, file) {

}

function fileUploading(up, file) {

}

function uploadSuccess(fileObj, serverData) {
  var parsedData = $.parseJSON(serverData);

  parent.sortableObj.appendList('<li id="' + parsedData.id + '" class="ui-state-default"><img src="/media/' + parsedData.key + '/thumb_100/' + parsedData.file_name + '" width="100px" /><input id="order-' + parsedData.id + '" type="hidden" name="order[]" value="' + parsedData.id + '" /><input id="thumb-' + parsedData.id + '" type="radio" name="thumb" value="' + parsedData.id + '" /></li>');
}

function uploadComplete() {
  parent.tb_remove();
}

function uploadError(fileObj, errorCode, message, uploader) {
  switch (errorCode) {
    case plupload.FAILED:
      break;
    case plupload.FILE_EXTENSION_ERROR:
      break;
    case plupload.FILE_SIZE_ERROR:
      break;
    case plupload.IMAGE_FORMAT_ERROR:
      break;
    case plupload.IMAGE_MEMORY_ERROR:
      break;
    case plupload.IMAGE_DIMENSIONS_ERROR:
      break;
    case plupload.GENERIC_ERROR:
      break;
    case plupload.IO_ERROR:
      break;
    case plupload.HTTP_ERROR:
      break;
    case plupload.INIT_ERROR:
      break;
    case plupload.SECURITY_ERROR:
      break;
    default:
      break;
  }
}

function uploadSizeError(up, file, over100mb) {

}

$(function() {
  uploader_init = function() {
    uploader = new plupload.Uploader(uploaderInit);

    uploader.bind('Init', function(up, params) {
      $('.runtime').html("Current runtime: " + params.runtime);
    });

    uploader.init();

    uploader.bind('FilesAdded', function(up, files) {
      var max = parseInt(up.settings.max_file_size);

      plupload.each(files, function(file) {
        if (file.size > max && up.runtime != 'html5') {
      	  uploadSizeError(up, file, true);
        }
      });

      up.refresh();
      up.start();
    });

    uploader.bind('BeforeUpload', function(up, file) {

    });

    uploader.bind('UploadFile', function(up, file) {
      fileUploading(up, file);
    });

    uploader.bind('UploadProgress', function(up, file) {
      uploadProgress(up, file);
    });

    uploader.bind('Error', function(up, err) {
      console.log("Error");
    });

    uploader.bind('FileUploaded', function(up, file, response) {
      uploadSuccess(file, response.response);
    });

    uploader.bind('UploadComplete', function(up, files) {
      uploadComplete();
    });
  }

  if (typeof(uploaderInit) == 'object') {
    uploader_init();
  }
});
</script>
</body>
</html>