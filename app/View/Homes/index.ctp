    <div class="content col grid-24">
        <header class="contentHead">
            <h1>Show other Report</h1>
            <p>レポートをみる</p>
        </header>
        <div class="contentBody row">
<? if (isset($reports)): ?>
    <? foreach ($reports as $report): ?>
            <article class="listItem col grid-8">
                <a href="/reports/<?= $report['Report']['id']; ?>" title="<?= $report['Report']['title']; ?>">
                    <div class="listItemBG" style="background: url('/img/content/boxitem.png') no-repeat center center;">
                        <header>
                            <h1><?= h($report['Report']['title']); ?> @ <?= h($report['Report']['place']); ?></h1>
<? /*
                            <h2>organized by <?= h($report['User']['username']; ?></h2>
*/ ?>
                        </header>
                    </div>
                </a>
            </article>
    <? endforeach; ?>
<? else: ?>
            <section>
                <p>レポートはまだありません</p>
            </section>
<? endif; ?>
        </div>
<? if (isset($reports)): ?>
        <footer class="contentFoot">
            <a href="/reports/" class="moreButton">もっと見る</a>
        </footer>
<? endif; ?>
    </div><!-- /content -->
