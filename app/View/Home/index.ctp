    <div class="content col grid-24">
      <div class="contentHead">
        <h1>Show other Report</h1>
        <p>レポートをみる</p>
      </div>
      <div class="contentBody row">
<?php foreach($reports as $report): ?>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <img src="./img/report-1.png" width="312px" height="207px" />
            </div>
            <div class="meta">
              <?=$this->Html->link($report['Report']['title'], array('controller' => 'reports', 'action' => 'view', $report['Report']['id']))?>

            </div>
          </div>
        </article>
<?php endforeach; ?>
      </div>
    </div>
