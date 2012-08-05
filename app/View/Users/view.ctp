    <aside class="sidebar col grid-6">
      <section class="widget">
        <div class="widgetBody">
          <h1><?=$user['User']['username']?></h1>
          <img class="userimage" src="https://graph.facebook.com/<?=$user['User']['username']?>/picture" width="36px" height="36px" alt="<?=$user['User']['username']?>'s avatar" />
        </div>
      </section>
    </aside>
    <div class="content col grid-18">
      <div class="contentBody reportList">
<?php if(isset($user)): ?>
<?php foreach($user['Report'] as $report): ?>
        <article class="reportBox">
          <div class="image">
            <div class="primary" style="background-image: url(/img/content/report-1-p.png);"></div>
            <div class="secondary">
              <span style="background-image: url(/img/content/report-1-s.png);"></span>
              <span style="background-image: url(/img/content/report-1-t.png);"></span>
            </div>
          </div>
          <div class="info">
            <h2><a href="/reports/<?=$report['id']?>"><?=$report['title']?></a></h2>
            <p><?=$report['date']?></p>
            <p><?=$report['body']?></p>
          </div>
        </article>
<?php endforeach; ?>
<?php else: ?>
        <section>
          <p>レポートはありません。</p>
        </section>
<?php endif; ?>
      </div>
    </div>
