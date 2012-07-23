<header class="navbar">
  <div class="wrap">
    <div class="logo">
      <a href="/" title="ReportShair">ReportShair</a>
    </div>
    <nav class="nav">
<?php if ($user): ?>
      <ul class="navlist pull">
        <li><a class="createBtn" href="/reports/create.php">Create Event</a></li>
        <li>
          <span class="user">
            <span class="userimage"><img src="https://graph.facebook.com/<?php echo $user_profile['username']; ?>/picture" width="36px" height="36px" alt=""></span>
            <span class="username"><a href="/users/detail.php"><?php echo $user_profile['username']; ?></a></span>
          </span>
          <ul>
            <li><a href="/users/settings.php">Settings</a></li>
            <li><a class="logout" href="<?php echo $logoutUrl; ?>">Logout</a></li>
          </ul>
        </li>
      </ul>
<?php else: ?>
      <ul class="navlist pull">
        <li><a class="loginBtn" href="<?php echo $loginUrl; ?>">Login</a></li>
      </ul>
<?php endif ?>
    </nav>
  </div>
</header>
