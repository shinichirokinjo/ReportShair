    <aside class="sidebar col grid-6">
      <section class="widget">
        <div class="widgetBody">
          <h1><?=$user['User']['username']?></h1>
          <div class="thumb" style="background-image: url(https://graph.facebook.com/<?=$user['User']['facebook_id']?>/picture?type=large);">
            <a href="/users/<?=$user['User']['username']?>"></a>
          </div>
        </div>
      </section>
    </aside>
    <div class="content col grid-18">
      <div class="contentBody">
<?php if(isset($user)): ?>
<?php foreach($user['Report'] as $report): ?>
        <article class="reportList">
          <div class="image">
            <div class="primary" style="background-image: url(/img/content/report-1-p.png);"></div>
            <div class="secondary">
              <span style="background-image: url(/img/content/report-1-s.png);"></span>
              <span style="background-image: url(/img/content/report-1-t.png);"></span>
            </div>
          </div>
          <div class="info">
            <div class="eventName">
              <h2><a href="/reports/<?=$report['id']?>" title="<?=$report['title']?>"><?=$report['title']?></a></h2>
            </div>
            <ul class="eventMeta">
              <li class="date"><?=$report['date']?></li>
              <li class="photoCount"><?=$report['photo_count']?> Photos</li>
              <li class="wentCount"><?=$report['went_count']?> Peoples</li>
            </ul>
            <div class="eventBody">
              <?=$report['body']?>
            </div>
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
