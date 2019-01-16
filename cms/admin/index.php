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
  <link rel="stylesheet" href="/cms/include/css/icons.css">
  <link rel="stylesheet" href="/cms/include/css/cms.css">
  <title>后台管理系统——Powered by 黄狮虎</title>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="false">
          <span class="glyphicon glyphicon-list"></span>
        </button>
        <a class="navbar-brand" href="/cms/admin/index.php">后台管理系统</a>
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
      <div class="list-item slide slide-left" role="button">
        <div class="slide-head">
          <span class="glyphicon glyphicon-user"></span>
          <span class="title" data-target="#user">用户管理</span>
          <span class="pull-right glyphicon glyphicon-menu-right"></span>
        </div>
        <ul class="slide-menu">
          <li>admin</li>
          <li>test</li>
          <li>03</li>
          <li>04</li>
          <li>05</li>
          <li>06</li>
        </ul>
      </div>
      <div class="list-item slide" role="button">
        <div class="slide-head">
          <span class="glyphicon glyphicon-file"></span>
          <span class="title" data-target="#home">开始文档</span>
          <!-- <span class="pull-right glyphicon glyphicon-menu-right"></span> -->
        </div>
      </div>
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

  <div class="content-wrap">
    <div class="content-inner">
      <ul id="pageTabs" class="hidden-xs nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
          <span class="pull-left glyphicon glyphicon-file"></span>
          <a href="#home" data-toggle="tab">开始文档</a>
          <span class="pull-right glyphicon glyphicon-remove" role="button"></span>
        </li>
        <li role="presentation">
          <span class="pull-left glyphicon glyphicon-file"></span>
          <a href="#profile" data-toggle="tab">Profile</a>
          <span class="pull-right glyphicon glyphicon-remove" role="button"></span>
        </li>
      </ul>
      <div id="pageTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="home">
          <p class="begin">
            尊敬的<a href="#"><?php echo $_SESSION["user"]["username"];?></a>，您好！
          </p>
          <p class="content">
            欢迎使用本后台管理使用，通过本系统您可以轻松地进行人员管理、权限设置、内容管理等操作，本系统功能正在进一步开发完善中，如果您有更好的想法或建议，如果您在使用过程中遇到任何问题，请联系我！
          </p>
          <p class="end">
            再次感谢您使用本系统，祝您生活愉快！
          </p>
          <p class="sign">
            ——黄狮虎
          </p>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="profile">
          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="/cms/include/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/cms/include/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/cms/include/js/cms.js"></script>
</body>
</html>