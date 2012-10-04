<header id="overlayHead">
  <ul>
    <li><h1><a href="/reports/dialog/report/select">ステップ1</a></h1></li>
    <li>Facebookページから作成</li>
  </ul>
</header>
<div id="overlayContent">
  <form id="fbpagesForm" action="" method="POST">
    <ul class="fbpagesList">
      <li><a href="" title="">Facebook名</a></li>
      <li><a href="" title="">Facebook名</a></li>
      <li><a href="" title="">Facebook名</a></li>
    </ul>
  </form>
</div>
<script type="text/javascript">
$(function() {
  $(".fbpagesList li a").click(function() {
    $("#fbpagesForm").submit();
    return false;
  })
});
</script>
