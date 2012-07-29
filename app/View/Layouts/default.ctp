<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?=$title_for_layout?></title>
<!-- META -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots" content="index,follow" />
<meta name="language" content="en" />
<!-- LINK -->
<link rel="canonical" href="<?=$canonical?>" />
<link rel="shortcut icon" href="/img/favicon.ico" />
<link rel="stylesheet" href="/css/screen.css" media="screen" />
<!-- SCRIPT -->
<script src="/js/jquery/jquery.min.js"></script>
</head>

<body class="<?=$body_class?>">
<?=$this->element('header')?>

<?php if ($body_class == 'home') echo $this->element('visual'); ?>

<div class="container">
  <div class="wrap inner">
<?=$this->fetch('content')?>
  </div>
</div><!-- .container -->

<?=$this->element('footer')?>
</body>
</html>