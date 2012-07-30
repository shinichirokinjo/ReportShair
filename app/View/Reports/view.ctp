    <div class="report content col grid-24">
      <header class="reportHead">
        <div class="reportInfo row">
          <div class="col grid-8">
            <p class="eventName"><?=$report['Report']['title']?></p>
            <p class="eventDate"><?=$report['Report']['date']?></p>
            <p class="eventPlace"><?=$report['Report']['place']?></p>
          </div>
          <div class="col grid-16">
            <p class="eventBody"><?=$report['Report']['body']?></p>
          </div>
        </div>
      </header>
      <div class="reportBody">
        <p></p>
      </div>
      <footer class="reportFoot">
        <a class="button" href="/reports/add" title="レポートを作成する">レポートを作成する</a>
      </footer>
    </div><!-- .report -->
