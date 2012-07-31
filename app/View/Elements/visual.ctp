<div id="maximage">
  <img src="/img/visual/visual-1.jpeg" />
  <img src="/img/visual/visual-2.jpeg" />
  <img src="/img/visual/visual-3.jpeg" />
</div>
<div id="fb-root"></div>
<div class="visual">
  <h1 class="headline">Let's make a Your party Report!</h1>
  <p class="leadline">リポートシェアはイベントレポートを簡単につくれるサービスです。</p>
  <div class="share">
    <a class="twitter-follow-button" href="https://twitter.com/reportshair" data-count="horizontal" data-show-count="false" data-width="130" data-lang="en">Follow @reportshair</a>
    <div class="fb-like" data-href="http://reportshair.com/" data-send="true" data-layout="button_count" data-width="80" data-show-faces="false"></div>
  </div>
  <div class="visualButton">
    <a class="button" href="/reports/add">Create Report</a>
  </div>
</div>
<script src="/js/jquery/jquery.cycle.js"></script>
<script src="/js/jquery/jquery.easing.js"></script>
<script src="/js/jquery/jquery.maximage.js"></script>
<script type="text/javascript">
$(function() {
  $('#maximage').maximage({
    cycleOptions: {
      slideResize: 0,
      fx: 'fade',
      speed: 1000,
      timeout: 6000,
    },
    onFirstImageLoaded: function() {
      jQuery('#maximage').fadeIn('fast');
    }
  });
});
</script>
<script type="text/javascript">
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=264745936880153";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>