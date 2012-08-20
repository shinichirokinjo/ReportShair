<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?= h($title_for_layout) ?></title>
<!-- META -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots"   content="index,follow" />
<meta name="language" content="en" />
<!-- LINK -->
<link rel="canonical" href="<?= $canonical ?>" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" href="/css/screen.css" media="screen" />
<!-- SCRIPT -->
<script src="/js/jquery/jquery.min.js"></script>
<script src="/js/app.js"></script>
<?= (isset($head_script)) ? $head_script : ''; ?>
<script>
    $(function(){
//        $('#flash-message-success').fadeIn(1000).delay(3000).fadeOut(1000);
        if (window.location.hash == '#_=_') {
            window.location.hash = '';
        }
    });
</script>
</head>

<body class="<?= $body_class ?>">
<? if (ENV_MODE != 'pro') { ?>
    <script>
    $(function(){
        $('#disp-env-code').click(function(){
            $('.navbar').toggle();
        });
    });
    </script>
    <div id="disp-env-code" style="top:0;right:30px;width:32px;height:16px;margin:0;padding:12px 5px 5px 5px;text-align:center;color:#FFF;font-weight:bold;font-size:12px;line-height:10px;background-color:#0000ff;border: solid 2px #fff;border-top:none;position:absolute;z-index:100000;border-bottom-right-radius:5px;border-bottom-left-radius:5px;cursor:pointer;"><?= ENV_MODE ?></div>
<? } ?>
    <?= $this->element('header'); ?>
    <?= ($body_class == 'home') ? $this->element('visual') : ''; ?>

    <div class="container">
        <div class="wrap inner">
            <?= $this->fetch('content'); ?>
        </div>
    </div><!-- .container -->

    <?= $this->element('footer'); ?>
</body>

</html>
