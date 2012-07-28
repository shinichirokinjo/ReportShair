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
<link rel="shortcut icon" href="/static/img/favicon.ico" />
<link rel="stylesheet" href="/css/screen.css" media="screen" />
<!-- SCRIPT -->
</head>

<body>
<?=$this->element('header')?>

<?=$this->fetch('content')?>

<?=$this->element('footer')?>
</body>
</html>