    <aside class="sidebar">
      <section class="widget listWidget">
        <header class="widgetHead">
          <h4>レポートのカテゴリ一覧</h4>
        </header>
        <div class="widgetBody">
          <ul class="categoryList">
            <li><a class="music" href="/reports/category/music" title="音楽イベント">
              音楽イベント
              <span class="label">0000</span>
              <span class="icon musicIcon"></span>
            </a></li>
            <li><a class="music" href="/reports/category/study" title="勉強会">
              勉強会
              <span class="label">0000</span>
              <span class="icon studyIcon"></span>
            </a></li>
            <li><a class="music" href="/reports/category/party" title="パーティー">
              パーティー
              <span class="label">0000</span>
              <span class="icon partyIcon"></span>
            </a></li>
          </ul>
        </div>
      </section>
    </aside>
    <div class="content">
      <header class="contentHead">
        <h1><?=__('Featured Reports')?></h1>
      </header>
      <div class="contentBody">
<?php if($reports): ?>
<?php foreach($reports as $report): ?>
        <article class="reportBoard">
          <div class="coverImage">
            <a href="/reports/<?=$report['Report']['slug']?>" title="" style="background-image: url('/media/reports/001.jpg');"></a>
          </div>
          <header class="reportHeadline">
            <h2 class="reportName"><a href="/reports/<?=$report['Report']['slug']?>"><?=$report['Report']['name']?></a></h2>
          </header>
        </article><!-- .reportBoard -->
<?php endforeach; ?>
<?php else: ?>
        <section class="alert info">
          <p><?=__('No Reports')?></p>
        </section>
<?php endif; ?>
      </div>
    </div>
