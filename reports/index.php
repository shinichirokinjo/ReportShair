<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Report name &lsaquo; ReportShair</title>
<link rel="stylesheet" href="../css/screen.css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="../js/app.js"></script>
</head>

<body class="report">
<?php include('../partials/header-basic.php'); ?>
<div class="container">
  <div class="wrap inner">
    <div class="content col grid-24">
      <div class="contentHead">
        <h1>Latest reports</h1>
        <span>1000 reports</span>
      </div>
      <div class="contentBody row">
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-1.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">RedTrash</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-2.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">Bigbeach fes 2012</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-3.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">Metamorphose2012</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-1.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">RedTrash</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-2.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">Bigbeach fes 2012</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-3.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">Metamorphose2012</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-1.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">RedTrash</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-2.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">Bigbeach fes 2012</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-3.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">Metamorphose2012</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-1.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">RedTrash</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-2.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">Bigbeach fes 2012</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-3.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">Metamorphose2012</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-1.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">RedTrash</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-2.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">Bigbeach fes 2012</a>
            </div>
          </div>
        </article>
        <article class="col grid-8">
          <div class="box">
            <div class="image">
              <a href="./reports/detail.html"><img src="../img/report-3.png" width="312px" height="207px" /></a>
            </div>
            <div class="meta">
              <a href="./reports/detail.html">Metamorphose2012</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>
<?php include('../partials/footer.php'); ?>
<div id="createReportForm" style="display: none;">
  <h2>Create new report!</h2>
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