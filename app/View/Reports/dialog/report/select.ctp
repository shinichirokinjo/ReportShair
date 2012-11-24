<header id="overlayHead">
  <h1>レポートの作成</h1>
</header>
<div id="overlayContent">
  <div class="captionForCreateReport">
    <p>
      既にFacebookページを持っていて、ReportShairと連携させる場合は「Facebookページから作成」を選択して下さい。<br />
      それ以外は「新規作成」を選択して下さい。
    </p>
  </div>
  <ul class="selectButtonForCreateReport">
    <li class="newSelectButton"><a href="/reports/dialog/report/create" target="_self">新規作成</a></li>
    <li class="fbSelectButton"><a href="/reports/dialog/report/fbpage" target="_self">Facebookページから作成</a></li>
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

  $("#overlayContent").css({height: contentHeight + "px"});
  // $(".selectButtonForCreateReport").css({height: buttonsHeight + "px"});
  // $(".selectButtonForCreateReport li a").css({height: buttonsHeight + "px"});

  $(".selectButtonForCreateReport li a").click(function() {
    $("#overlay", parent.document).removeClass('selectDialog');
  });
});
</script>
