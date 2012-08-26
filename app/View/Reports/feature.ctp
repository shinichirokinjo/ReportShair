    <aside class="sidebar">
      <section class="widget">
        <header class="widgetHead">
          <h4>Report Category</h4>
        </header>
        <div class="widgetBody">
          <ul class="categoryList">
            <li class="music"><a href="" title="">音楽イベント <span class="label">0000</span></a></li>
            <li class="study"><a href="" title="">勉強会 <span class="label">0000</span></a></li>
            <li class="party"><a href="" title="">パーティー <span class="label">0000</span></a></li>
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
