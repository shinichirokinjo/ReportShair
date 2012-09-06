<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?=$title?></title>
<!-- META -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots" content="index,follow" />
<meta name="language" content="" />
<!-- LINK -->
<link rel="canonical" href="" />
<link rel="shortcut icon" href="/favicon.ico" />
<!-- STYLE -->
<link rel="stylesheet" href="/static/css/screen.css" media="screen" />
<!-- SCRIPT -->
<script src="/static/js/jquery/jquery.min.js"></script>
</head>

<body class="dialog <?= h($body_class) ?><?= ($loggedin) ? " loggedin" : ''; ?>">
<?= $this->fetch('content'); ?>
</body>
</html>