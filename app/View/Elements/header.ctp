<header class="header wrap">
  <h1 class="logo"><a href="/" title="ReportShair">ReportShair</a></h1>
  <nav class="navs">
    <ul class="mainNav">
      <li class="nav"><a href="/reports/" title="オススメのレポート">オススメのレポート</a></li>
    </ul>
  </nav>
  <nav class="navs pull">
    <ul class="subNav">
<? if ($loggedin): ?>
      <li class="nav createNav"><a href="#" title="新しくレポートを作成する">レポートの作成</a></li>
      <li class="nav userNav">
        <a href="/users/<?= $this->Session->read('Auth.User.username')?>" style="background-image: url('https://graph.facebook.com/<?= $this->Session->read('Auth.User.username')?>/picture');">
          <span class="username"><?= $this->Session->read('Auth.User.username'); ?></span>
        </a>
        <ul>
          <li><a href="/settings/account" title="設定">設定</a></li>
          <li><a href="/logout" title="ログアウト">ログアウト</a></li>
        </ul>
      </li>
<? else: ?>
      <li class="nav"><a class="tips" href="/fblogin" title="Facebookアカウントでログインする。">ログイン</a></li>
<? endif; ?>
    </ul><!-- .subNav -->
  </nav><!-- .navs -->
</header><!-- .header -->
