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
    <div class="content col grid-24">
      <div class="contentHead">
        <h1>My profile</h1>
      </div>
      <div class="contentBody">
        <form action="" method="post">
          <fieldset>
            <div class="field">
              <div class="fieldHead">
                <label>Username</label>
              </div>
              <div class="fieldBody">
                <input type="text" name="" value="fadfa" />
              </div>
            </div>

            <div class="field">
              <div class="fieldHead">
                <label>Email Address</label>
              </div>
              <div class="fieldBody">
                <input type="text" name="" value="fadfa" />
              </div>
            </div>

            <div class="field">
              <div class="fieldHead">
                <label>Bio</label>
              </div>
              <div class="fieldBody">
                <input type="text" name="" value="fadfa" />
              </div>
            </div>

            <div class="field">
              <div class="fieldHead">
                <label>Location</label>
              </div>
              <div class="fieldBody">
                <input type="text" name="" value="fadfa" />
              </div>
            </div>

            <div class="action">
              <button>Update</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../partials/footer.php'); ?>
</body>
</html>