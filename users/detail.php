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
<script src="../js/app.js"></script>
</head>

<body class="report">
<?php include('../partials/header.php'); ?>
<div class="container">
  <div class="wrap inner">
    <aside class="sidebar col grid-8">
      <div class="widget">
        <div class="widgetHead">
          <h1><?php echo $user_profile['username']; ?></h1>
        </div>
        <div class="widgetBody">
          <div class="info">
            <div class="card">
              <div class="avatar"><a href="../users/detail.php">
                <img src="../img/avatar.png" width="100px" height="100px" />
              </a></div>
              <div class="meta">
                <ul>
                  <li class="report"><strong>3</strong> Reports</li>
                  <li class="photo"><strong>10</strong> Photos</li>
                  <li class="facebook"><a href="<?php echo $user_profile['link']; ?>" target="_blank"></a></li>
                </ul>
              </div>
              <div class="profile">
                <p><?php echo $user_profile['quotes']; ?></p>
                <p><?php print_r($user_profile); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </aside>
    <div class="content col grid-16">
      <div class="contentBody">
        <section class="row">
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.php"><img src="../img/report-1.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.php">RedTrash</a>
              </div>
            </div>
          </article>
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.php"><img src="../img/report-2.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.php">Bigbeach fes 2012</a>
              </div>
            </div>
          </article>
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.php"><img src="../img/report-3.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.php">Metamorphose2012</a>
              </div>
            </div>
          </article>
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.php"><img src="../img/report-1.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.php">RedTrash</a>
              </div>
            </div>
          </article>
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.php"><img src="../img/report-2.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.php">Bigbeach fes 2012</a>
              </div>
            </div>
          </article>
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.php"><img src="../img/report-3.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.php">Metamorphose2012</a>
              </div>
            </div>
          </article>
        </section>
      </div>
    </div>
  </div>
</div>
<?php include('../partials/footer.php'); ?>
</body>
</html>