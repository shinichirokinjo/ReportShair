<html>
<head>

</head>

<body>
<header class="overlayHead">
  <h2><?=$headline?></h2>
</header>
<div class="overlayBody">
  <div class="">
    <p>Facebookページを選択してレポートを作成して下さい。</p>
  </div>
  <ul class="fbpageList">
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
    <li><span>WOMB (Official)</span></li>
  </ul>
</div>
<footer class="overlayFoot">
  <a href="#" class="button">Cancel</a>
  <a href="#" class="button primary">Save</a>
</footer>
<script src="/static/js/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
  $(".fbpageList li").click(function() {
    console.log("Click");
    return false;
  });
});
</script>
</body>
</html>