<header class="header wrap">
    <h1 class="logo"><a href="/" title="ReportShair">ReportShair</a></h1>
    <nav class="navs">
        <ul class="mainNav">
            <li class="nav"><a href="/reports/" title="<?= __('View feature reports'); ?>"><?= __('Feature Reports'); ?></a></li>
        </ul>
    </nav>
    <nav class="navs pull">
        <ul class="subNav">
<? if ($loggedin): ?>
            <li class="nav createNav"><a href="#" title="<?= __('Create Report'); ?>"><?= __('Create Report'); ?></a></li>
            <li class="nav userNav">
                <a href="/users/<?= $this->Session->read('Auth.User.username')?>" style="background-image: url('https://graph.facebook.com/<?= $this->Session->read('Auth.User.username')?>/picture');">
                    <span class="username"><?= $this->Session->read('Auth.User.username'); ?></span>
                </a>
           <ul>
          <li><a href="/settings/account" title="<?= __('Settings'); ?>"><?= __('Settings'); ?></a></li>
          <li><a href="/logout" title="<?= __('Logout'); ?>"><?= __('Logout'); ?></a></li>
        </ul>
      </li>
<? else: ?>
      <li class="nav"><a href="/fblogin" title="<?= __('Login with Facebook'); ?>"><?= __('Login'); ?></a></li>
<? endif; ?>
    </ul><!-- .subNav -->
  </nav><!-- .navs -->
</header><!-- .header -->
