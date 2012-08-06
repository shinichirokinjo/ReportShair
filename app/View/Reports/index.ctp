    <div class="content col grid-24">
      <header class="contentHead">
        <h1>レポート一覧</h1>
      </header>
      <div class="reportList contentBody row">
<?php if(isset($reports)): ?>
<?php foreach($reports as $report): ?>
        <article class="listItem col grid-8">
          <a href="/reports/<?=$report['Report']['id']?>" title="<?=$report['Report']['title']?>">
            <div class="listItemBG" style="background: url('/img/content/boxitem.png') no-repeat center center;">
              <header>
                <h1><?=$report['Report']['title']?> @ <?=$report['Report']['place']?></h1>
                <h2>organized by <?=$report['User']['username']?></h2>
              </header>
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
<?php if(isset($reports)): ?>
      <footer class="contentFoot">
        <a href="/reports/" class="moreButton">もっと見る</a>
      </footer>
<?php endif; ?>
    </div>
