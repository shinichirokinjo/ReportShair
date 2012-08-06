    <div class="coverPhoto">
      <div class="image" style="background-image: url(/img/content/report-visual.jpeg);">
        <div class="reportHeadline">
          <header>
            <h1><?=$report['Report']['title']?> @ <?=$report['Report']['place']?></h1>
            <h2><?=$report['Report']['date']?></h2>
          </header>
          <p class="description"><?=$report['Report']['body']?></p>
        </div>
      </div>
      <div class="reportMeta">
        <div class="metaOrganizer">
          <p>organized by <a href="/users/<?=$report['User']['username']?>"><?=$report['User']['username']?></a></p>
        </div>
        <div class="metaPhotos">
          <p>100 Photos</p>
        </div>
        <div class="metaWent">
          <p>100 Went</p>
        </div>
        <div class="metaHashtag">
          <p><a href="https://twitter.com/#!/search/%23HASHTAG" target="_blank"># HASHTAG</a></p>
        </div>
      </div><!-- .reportMeta -->
    </div><!-- .coverPhoto -->
    <aside class="sidebar col grid-6">
      <div class="widget">
        <header class="widgetHead">
          <h4>Went (XX Peoples)</h4>
        </header>
        <div class="widgetBody">
          <ul class="wentList">
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/<?=$report['User']['username']?>/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/serima/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/shin.kinjo/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/<?=$report['User']['username']?>/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/serima/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/shin.kinjo/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/<?=$report['User']['username']?>/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/serima/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/shin.kinjo/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/<?=$report['User']['username']?>/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/serima/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
            <li><a href="/users/<?=$report['User']['username']?>" title="<?=$report['User']['username']?>">
              <img src="https://graph.facebook.com/shin.kinjo/picture" width="40px" height="40px" alt="<?=$report['User']['username']?>" />
            </a></li>
          </ul>
        </div>
      </div>
    </aside><!-- .sidebar -->
    <div class="content col grid-18">
      <div class="contentBody">
        <article class="reportComment clearfix">
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
        <article class="reportComment clearfix">
          <div class="image">
            <div class="pin" style="background-image: url(/img/content/report-2-p.png);"></div
          </div>
          <div class="info">
            <div class="card">
              <div class="avatar"><a></a></div>
              <p class="username"></p>
            </div>
            <div class="comment"></div>
          </div>
        </article>
        <article class="reportComment clearfix">
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
