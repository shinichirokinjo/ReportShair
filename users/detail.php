<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Create report &lsaquo; ReportShair</title>
<link rel="stylesheet" href="../css/screen.css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="../js/app.js"></script>
</head>

<body class="report">
<?php include('../partials/header-loggedin.php'); ?>
<div class="container">
  <div class="wrap inner">
    <aside class="sidebar col grid-8">
      <div class="widget">
        <div class="widgetHead">
          <h1>Username</h1>
        </div>
        <div class="widgetBody">
          <div class="info">
            <div class="card">
              <div class="avatar"><a href="../users/detail.html">
                <img src="../img/avatar.png" width="100px" height="100px" />
              </a></div>
              <div class="meta">
                <ul>
                  <li class="report"><strong>3</strong> Reports</li>
                  <li class="photo"><strong>10</strong> Photos</li>
                </ul>
              </div>
              <div class="profile">
                <p>Your description</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </aside>
    <div class="content col grid-16">
      <div class="contentBody">
        <section class="row">
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.html"><img src="../img/report-1.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.html">RedTrash</a>
              </div>
            </div>
          </article>
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.html"><img src="../img/report-2.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.html">Bigbeach fes 2012</a>
              </div>
            </div>
          </article>
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.html"><img src="../img/report-3.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.html">Metamorphose2012</a>
              </div>
            </div>
          </article>
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.html"><img src="../img/report-1.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.html">RedTrash</a>
              </div>
            </div>
          </article>
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.html"><img src="../img/report-2.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.html">Bigbeach fes 2012</a>
              </div>
            </div>
          </article>
          <article class="col grid-8">
            <div class="box">
              <div class="image">
                <a href="../reports/detail.html"><img src="../img/report-3.png" width="312px" height="207px" /></a>
              </div>
              <div class="meta">
                <a href="../reports/detail.html">Metamorphose2012</a>
              </div>
            </div>
          </article>
        </section>
      </div>
    </div>
  </div>
</div>
<?php include('../partials/footer.php'); ?>
<div id="createReportForm" style="display: none;">
  <h2>Create new report!</h2>
  <div class="formBody">
    <form action="../reports/create.html" method="post">
      <div style="display: none;">
        <input type="hidden" name="" value="" />
      </div>

      <fieldset>
        <div class="field">
          <div class="fieldHead">
            <label for="">Event name</label>
          </div>
          <div class="fieldBody">
            <input type="text" name="" value="" />
          </div>
        </div>

        <div class="field">
          <div class="fieldHead">
            <label for="">Event description</label>
          </div>
          <div class="fieldBody">
            <textarea name="" id="" cols="30" rows="10"></textarea>
          </div>
        </div>

        <div class="field">
          <div class="fieldHead">
            <label for="">Event date</label>
          </div>
          <div class="fieldBody">
            <select name="">
              <option value="">Select:</option>
              <option value="">Jan</option>
              <option value="">Feb</option>
              <option value="">Mar</option>
              <option value="">Apr</option>
              <option value="">May</option>
              <option value="">Jun</option>
              <option value="">Jul</option>
              <option value="">Aug</option>
              <option value="">Sep</option>
              <option value="">Oct</option>
              <option value="">Nov</option>
              <option value="">Dec</option>
            </select>
            <select name="">
              <option value="">Select:</option>
              <option value="">1</option>
              <option value="">2</option>
              <option value="">3</option>
              <option value="">4</option>
              <option value="">5</option>
              <option value="">6</option>
              <option value="">7</option>
              <option value="">8</option>
              <option value="">9</option>
              <option value="">10</option>
              <option value="">11</option>
              <option value="">12</option>
              <option value="">13</option>
              <option value="">14</option>
              <option value="">15</option>
              <option value="">16</option>
              <option value="">17</option>
              <option value="">18</option>
              <option value="">19</option>
              <option value="">20</option>
              <option value="">21</option>
              <option value="">22</option>
              <option value="">23</option>
              <option value="">24</option>
              <option value="">25</option>
              <option value="">26</option>
              <option value="">27</option>
              <option value="">28</option>
              <option value="">29</option>
              <option value="">30</option>
              <option value="">31</option>
            </select>
          </div>
        </div>

        <div class="field">
          <div class="fieldHead">
            <label for="">Place</label>
          </div>
          <div class="fieldBody">
            <input type="text" name="" value="" />
          </div>
        </div>

        <div class="action">
          <button>Create</button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<script type="text/javascript">
$(function() {
  $(".createBtn").click(function() {
    RS.Overlay.open('#createReportForm', 'div');
    return false;
  });
});
</script>
</body>
</html>