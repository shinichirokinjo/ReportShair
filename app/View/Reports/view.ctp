    <div class="coverPhoto">
      <div class="image" style="background-image: url(/img/content/report-visual.jpeg);">
        <div class="reportInfo">
          <header>
            <h1><?=$report['Report']['title']?> @ <?=$report['Report']['place']?></h1>
            <h2><?=$report['Report']['date']?></h2>
          </header>
          <div class="description"><?=$report['Report']['body']?></div>
        </div>
      </div>
      <div class="reportMeta row">
        <div>
          <p>organized by <a href="/users/<?=$report['User']['username']?>"><?=$report['User']['username']?></a></p>
        </div>
        <div>
          <p>100 Photos</p>
        </div>
        <div>
          <p>100 Went</p>
        </div>
        <div>
          <p><a href="https://twitter.com/#!/search/%23HASHTAG" target="_blank"># HASHTAG</a></p>
        </div>
      </div><!-- .reportMeta -->
    </div><!-- .coverPhoto -->
    <aside class="sidebar col grid-6">
      <div class="widget">
        <header class="widgetHead">
          <h4>Went</h4>
        </header>
        <div class="widgetBody">
          <ul>
            <li><a href="" title=""></a></li>
            <li><a href="" title=""></a></li>
            <li><a href="" title=""></a></li>
            <li><a href="" title=""></a></li>
          </ul>
        </div>
      </div>
    </aside><!-- .sidebar -->
    <div class="content col grid-18">
      <header class="contentHead">
        <h1>コメント一覧</h1>
      </header>
      <div class="contentBody reportComment">
        <article class="commentBox clearfix">
          <div class="image">
            <div class="primary" style="background-image: url(/img/content/report-1-p.png);"></div>
            <div class="secondary">
              <span style="background-image: url(/img/content/report-1-s.png);"></span>
              <span style="background-image: url(/img/content/report-1-t.png);"></span>
            </div>
          </div>
          <div class="info">
            <div class="card">
              <div class="avatar"><a></a></div>
              <p class="username"></p>
            </div>
            <div class="comment"></div>
          </div>
        </article>
      </div>
      <footer class="contentFoot">
        <a class="button" href="/comments/add" title="コメントを作成する">コメントを作成する</a>
      </footer>
    </div><!-- .report -->
