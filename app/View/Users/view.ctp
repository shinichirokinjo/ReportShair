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
          <div class="event">
            <div class="eventInfo">
              <h2 class="eventName">
                <a href="/reports/<?=$report['id']?>" title="<?=$report['title']?>"><?=$report['title']?></a>
              </h2>
              <ul>
                <li class="date"><?=$report['date']?></li>
                <li class="body"><?=$report['body']?></li>
              </ul>
            </div>
            <div class="eventWent">
              <h3>Went: 123 Peoples</h3>
              <ul>
                <li><a href=""><img src="https://graph.facebook.com/<?=$user['User']['facebook_id']?>/picture" /></a></li>
              </ul>
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
