    <div class="content col grid-24">
      <div class="contentHead">
        <h1>レポート一覧</h1>
      </div>
      <div class="contentBody row">
<?php if(isset($reports)): ?>
<?php foreach($reports as $report): ?>
        <article class="boxitem col grid-8">
          <a href="/reports/<?=$report['Report']['id']?>" title="<?=$report['Report']['title']?>">
            <div class="boxitem-background" style="background: url('/img/content/boxitem.png') no-repeat center center;">
              <div class="boxitem-gradient">
                <h2 class="boxitem-title"><?=$report['Report']['title']?></h2>
                <div class="boxitem-meta">
                  <span class="date"><?=$report['Report']['date']?></span>
                </div>
                <p class="boxitem-description"><?=$report['Report']['body']?></p>
              </div>
            </div>
          </a>
        </article>
<?php endforeach; ?>
<?php else: ?>
        <section>
          <p>レポートはまだありません</p>
        </section>
<?php endif; ?>
      </div>
    </div>
