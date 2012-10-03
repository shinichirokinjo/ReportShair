<header id="overlayHead">
  <ul>
    <li><h1>ステップ1</h1></li>
  </ul>
</header>
<div id="overlayContent">
  <div class="captionForCreateReport">
    <p>
      既にFacebookページを持っていて、ReportShairと連携させる場合は「Facebookページから作成」を選択して下さい。<br />
      それ以外は「新規作成」を選択して下さい。
    </p>
  </div>
  <ul class="selectButtonForCreateReport">
    <li><a href="/reports/dialog/report/create" target="_self">新規作成</a></li>
    <li><a href="/reports/dialog/report/fbpage" target="_self">Facebookページから作成</a></li>
  </ul>
</div>
<script type="text/javascript">
$(function() {
  var containerHeight,
      contentHeight,
      buttonsHeight;

  containerHeight = $("body").height();
  contentHeight = containerHeight - 37;
  buttonsHeight = contentHeight - 201;

  console.log(containerHeight);
  console.log(contentHeight);

  $("#overlayContent").css({height: contentHeight + "px"});
  $(".selectButtonForCreateReport").css({height: buttonsHeight + "px"});
  $(".selectButtonForCreateReport li a").css({height: buttonsHeight + "px"});
});
</script>