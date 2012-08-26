<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?=$title?></title>
<!-- META -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots" content="index,follow" />
<meta name="language" content="" />
<?=$this->element('og_meta')?>
<!-- LINK -->
<link rel="canonical" href="" />
<link rel="shortcut icon" href="/favicon.ico" />
<!-- STYLE -->
<link rel="stylesheet" href="/static/css/screen.css" media="screen" />
<!-- SCRIPT -->
<script src="/static/js/jquery/jquery.min.js"></script>
<script src="/static/js/app.js"></script>
</head>

<body class="<?= h($body_class) ?><?= ($loggedin) ? " loggedin" : ''; ?>">
<?=$this->element('header')?>

<?= (strpos($body_class, "home") !== FALSE) ? $this->element('carousel') : ''; ?>

<div class="container wrap">
<?= $this->fetch('content'); ?>
</div><!-- .container -->

<?= $this->element('footer'); ?>
</body>
</html>
