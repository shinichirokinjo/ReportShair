<header class="navbar">
  <div class="wrap">
    <div class="logo">
      <a href="/" title="ReportShair">ReportShair</a>
    </div>
    <nav class="nav">
<?php if ($user): ?>
      <ul class="navlist pull">
        <li><a class="loginBtn" href="<?=$loginUrl?>">Login</a></li>
      </ul>
<?php else: ?>
      <ul class="navlist pull">
        <li><a class="createBtn" href="/reports/create.php">Create Event</a></li>
        <li>
          <span class="user">
            <span class="userimage"><img src="/img/avatar.png" width="36px" height="36px" alt=""></span>
            <span class="username"><a href="/users/detail.php">Username</a></span>
          </span>
          <ul>
            <li><a href="/users/settings.php">Settings</a></li>
            <li><a class="logout" href="<?=$logoutUrl?>">Logout</a></li>
          </ul>
        </li>
      </ul>
<?php endif ?>
    </nav>
  </div>
</header>
