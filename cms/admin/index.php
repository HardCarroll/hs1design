<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/cms/include/php/include.php");
if(!isset($_SESSION["state"]) || $_SESSION["state"] !== sha1(0)) {
  $_SESSION["state"] = sha1(-1);
  header("location: /cms/admin/login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/cms/include/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/cms/include/css/cms.css">
  <title>内容管理系统</title>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="false">
          <span class="glyphicon glyphicon-list"></span>
        </button>
        <a class="navbar-brand" href="/cms/admin/index.php">内容管理系统</a>
        <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-config" aria-expanded="false">
          <span class="glyphicon glyphicon-cog"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-config">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
  </nav>

  
  <div class="collapse navbar-collapse" id="navbar-menu">
    <div class="nav-list">
      <a class="list-item" href="/cms/admin/index.php">
        <span class="glyphicon glyphicon-home"></span>
        <span>内容管理系统</span>
      </a>
      <div class="list-item">
        <div class="slide slide-down" role="button">dropdown<span class="glyphicon glyphicon-triangle-right"></span>
          <ul class="slide-menu">
            <li>01</li>
            <li>02</li>
            <li>03</li>
            <li>04</li>
            <li>05</li>
            <li>06</li>
          </ul>
        </div>
      </div>
      <div class="list-item">3</div>
      <div class="list-item">4</div>
      <div class="list-item">5</div>
      <div class="list-item">6</div>
      <div class="list-item">7</div>
      <div class="list-item">8</div>
      <div class="list-item">9</div>
      <div class="list-item">10</div>
      <div class="list-item">11</div>
      <div class="list-item">12</div>
      <div class="list-item">13</div>
      <div class="list-item">14</div>
      <div class="list-item">15</div>
      <div class="list-item">16</div>
      <div class="list-item">17</div>
      <div class="list-item">18</div>
      <div class="list-item">19</div>
      <div class="list-item">20</div>
      <div class="list-item">21</div>
      <div class="list-item">22</div>
      <div class="list-item">23</div>
      <div class="list-item">24</div>
      <div class="list-item">25</div>
      <div class="list-item">26</div>
      <div class="list-item">27</div>
      <div class="list-item">28</div>
      <div class="list-item">29</div>
      <div class="list-item">30</div>
      <div class="list-item">31</div>
      <div class="list-item">32</div>
      <div class="list-item">33</div>
    </div>
  </div>

  <div id="pageWrap">
    2
  </div>

  <script type="text/javascript" src="/cms/include/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/cms/include/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/cms/include/js/cms.js"></script>
</body>
</html>