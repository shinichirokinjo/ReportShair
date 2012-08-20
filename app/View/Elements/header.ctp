<header class="navbar">
    <div class="wrap">
        <h1 class="logo"><a href="/" title="ReportShair">ReportShair</a></h1>
        <nav class="nav">
<? if ($loggedin): ?>
            <ul class="navlist pull">
                <li><a href="/reports/add" title="Create new report">Create Report</a></li>
                <li class="usernav">
                    <a href="/users/<?= $this->Session->read('Auth.User.username') ?>" title="Username">
                        <img class="userimage" src="https://graph.facebook.com/<?= $this->Session->read('Auth.User.username') ?>/picture" width="36px" height="36px" alt="<?= $this->Session->read('Auth.User.username') ?>'s avatar" />
                        <span class="username"><?= h($this->Session->read('Auth.User.username')) ?></span>
                    </a>
                    <ul>
                        <li><a href="/settings/" title="Settings">Settings</a></li>
                        <li><a href="/logout" title="Logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
<? else: ?>
            <ul class="navlist pull">
                <li><a href="/fblogin" title="Login with Facebook">Login</a></li>
            </ul>
<? endif; ?>
        </nav>
    </div>
</header><!-- .header -->
