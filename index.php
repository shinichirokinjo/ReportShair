<?php
require './include/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '261278050649489',
  'secret' => 'e61b025986cb5dc50e9216d9c803d525',
));

$user = $facebook->getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

$logoutUrl = $loginUrl = NULL;

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>ReportShair</title>
<link rel="stylesheet" href="./css/screen.css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="./js/jquery.cycle.js"></script>
<script src="./js/jquery.easing.js"></script>
<script src="./js/jquery.maximage.js"></script>
<script src="./js/app.js"></script>
</head>

<body class="home">
<?php include('./partials/header.php'); ?>
<div id="maximage">
  <img src="./img/visual-1.jpeg" />
  <img src="./img/visual-2.jpeg" />
  <img src="./img/visual-3.jpeg" />
</div>
<div id="fb-root"></div>
<div class="headline">
  <img src="./img/headline.png" width="800px" height="77px" />
  <p>リポートシェアはイベントレポートを簡単につくれるサービスです。</p>
  <div class="share">
    <a class="twitter-follow-button" href="https://twitter.com/reportshair" data-count="horizontal" data-show-count="false" data-width="130" data-lang="en">Follow @reportshair</a>
    <div class="fb-like" data-href="" data-send="true" data-layout="button_count" data-width="80" data-show-faces="false"></div>
  </div>
  <div class="">
    <a class="button createBtn" href="./reports/create.php">Create Report</a>
  </div>
</div>
<div class="container">
  <div class="wrap inner">
    <div class="content col grid-24">
      <div class="contentHead">
        <h1>Show other Report</h1>
      </div>
      <div class="contentBody row">
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.php"><img src="./img/report-1.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.php">RedTrash</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.php"><img src="./img/report-2.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.php">Bigbeach fes 2012</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.php"><img src="./img/report-3.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.php">Metamorphose2012</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.php"><img src="./img/report-1.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.php">RedTrash</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.php"><img src="./img/report-2.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.php">Bigbeach fes 2012</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>
<?php include('./partials/footer.php'); ?>
<script type="text/javascript">
// RS.Carousel.init();
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
</body>
</html>