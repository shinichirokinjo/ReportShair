<?php
require '../include/facebook.php';

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
<title>Create report &lsaquo; ReportShair</title>
<link rel="stylesheet" href="../css/screen.css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="../js/app.js"></script>
</head>

<body class="report">
<?php include('../partials/header.php'); ?>
<div class="container">
  <div class="wrap inner">
    <div class="no-photo reportHead col grid-24">
      <div class="coverPhoto">
        <a class="uploadCoverPhoto" href="#">Upload cover photo</a>
      </div>
      <div class="reportInfo">
        <div class="eventInfo">
          <h1>Metamorphose2012</h1>
          <p>XX月YY日</p>
          <div class="organizer">
            <a href="../users/detail.php"><img src="../img/avatar.png" width="50px" height="50px" /></a>
          </div>
          <div class="eventMeta">
            <ul>
              <li class="twitter"><a href="http://your-twitter.com/"></a></li>
              <li class="facebook"><a href="http://your-facebook.com/"></a></li>
              <li class="website"><a href="http://your-website.com/"></a></li>
            </ul>
          </div>
        </div>
        <div class="eventDescription">
          <p>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor maurisDonec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
          </p>
        </div>
        <div class="eventMap">
          <div id="map" style="background: #EEE; width: 160px; height: 160px;"></div>
<script type="text/javascript">
function map_init() {
  var latlng = new google.maps.LatLng(35.6999, 139.5851);
  var myOptions = {
    zoom: 15,
    center: latlng,
    mapTypeControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    navigationControlOptions: google.maps.NavigationControlStyle.ANDROID
  };
  var map = new google.maps.Map(document.getElementById("map"), myOptions);
  var marker = new google.maps.Marker({
    position: latlng,
    map: map
  });
}

$(function() {
  map_init();
});
</script>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="contentBody col grid-24">

      </div>
      <div class="contentFoot col grid-24">
        <a class="btn uploadReportPhoto" href="">Upload report photo</a>
      </div>
    </div>
  </div>
</div>
<?php include('../partials/footer.php'); ?>
</body>
</html>