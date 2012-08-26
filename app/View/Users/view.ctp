    <aside class="sidebar">
      <section class="widget userPanel">
        <div class="widgetBody clearfix">
          <span class="avatar" style="background-image: url('https://graph.facebook.com/<?=$user['User']['username']?>/picture?type=large');"></span>
          <div class="account">
            <h4 class="username"><?=$user['User']['username']?></h4>
            <ul class="socialLink">
<?php if ($user['User']['facebook_link']):?>
              <li class="facebook"><a href="<?=$user['User']['facebook_link']?>" title="<?=$user['User']['username']?>'s profile on facebook" target="_blank">Facebook</a></li>
<?php endif; ?>
<?php if ($user['User']['twitter_id']):?>
              <li class="twitter"><a href="https://twitter.com/<?=$user['User']['twitter_id']?>" title="<?=$user['User']['username']?>'s profile on twitter" target="_blank">Twitter</a></li>
<?php endif; ?>
<?php if ($user['User']['website_link']):?>
              <li class="website"><a href="<?=$user['User']['website_link']?>" title="<?=$user['User']['username']?>'s homepage" target="_blank">Website</a></li>
<?php endif; ?>
            </ul>
          </div>
        </div>
      </section><!-- .widget -->
      <section class="widget profilePanel">
        <div class="widgetBody clearfix">
          <p>Pith, pith, pith!</p>
        </div>
      </section><!-- .widget -->
      <section class="widget mapPanel">
        <div class="widgetBody clearfix">
          
        </div>
      </section><!-- .widget -->
    </aside>
    <div class="content">
      <header class="contentHead">
        <h1>Reports by <?=$user['User']['username']?></h1>
      </header>
      <div class="contentBody">
        <article class="reportBoard">
          <div class="coverImage">
            <a href="/reports/001" title="" style="background-image: url('/media/reports/001.jpg');"></a>
          </div>
          <header class="reportHeadline">
            <h2 class="reportName"><a href="/reports/001">Report Name</a></h2>
          </header>
        </article><!-- .reportBoard -->
        <article class="reportBoard">
          <div class="coverImage">
            <a href="/reports/001" title="" style="background-image: url('/media/reports/001.jpg');"></a>
          </div>
          <header class="reportHeadline">
            <h2 class="reportName"><a href="/reports/001">Report Name</a></h2>
          </header>
        </article><!-- .reportBoard -->
      </div>
    </div><!-- .content -->
