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
  <div class="layer">
    <section class="page-head">
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed pull-left" data-target="#navbar-menu">
              <span class="glyphicon glyphicon-menu-hamburger"></span>
            </button>
            <a class="navbar-brand" href="/cms/admin/index.php">后台管理系统</a>
            <button type="button" class="navbar-toggle collapsed pull-right" data-target="#navbar-config">
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
    </section>
    <section class="page-body">
      <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="nav-list">
          <div class="list-item slide" role="button">
            <div class="slide-head">
              <span class="glyphicon glyphicon-file"></span>
              <span class="title" data-target="profileTab">开始文档</span>
            </div>
          </div>
          <div class="list-item slide active" role="button">
            <div class="slide-head">
              <span class="glyphicon glyphicon-globe"></span>
              <span class="title" data-target="siteTab">网站设置</span>
            </div>
          </div>
          <div class="list-item slide" role="button">
            <div class="slide-head">
              <span class="glyphicon glyphicon-user"></span>
              <span class="title" data-target="adminTab">管理员设置</span>
            </div>
          </div>
          <div class="list-item slide slide-left" role="button">
            <div class="slide-head">
              <span class="glyphicon glyphicon-list"></span>
              <span class="title" data-target="classTab">分类管理</span>
              <span class="pull-right glyphicon glyphicon-menu"></span>
            </div>
            <ul class="slide-menu">
              <li>adminTab</li>
              <li>test</li>
              <li>03</li>
              <li>04</li>
              <li>05</li>
              <li>06</li>
            </ul>
          </div>
          <div class="list-item slide" role="button">
            <div class="slide-head">
              <span class="glyphicon glyphicon-blackboard"></span>
              <span class="title" data-target="caseTab">案例管理</span>
            </div>
          </div>
          <div class="list-item slide" role="button">
            <div class="slide-head">
              <span class="glyphicon glyphicon-cog"></span>
              <span class="title" data-target="Tab7">7</span>
            </div>
          </div>
          <div class="list-item slide" role="button">
            <div class="slide-head">
              <span class="glyphicon glyphicon-cog"></span>
              <span class="title" data-target="Tab8">8</span>
            </div>
          </div>
          <div class="list-item slide" role="button">
            <div class="slide-head">
              <span class="glyphicon glyphicon-cog"></span>
              <span class="title" data-target="Tab9">9</span>
            </div>
          </div>
          <div class="list-item slide" role="button">
            <div class="slide-head">
              <span class="glyphicon glyphicon-cog"></span>
              <span class="title" data-target="Tab10">10</span>
            </div>
          </div>
          <div class="list-item slide" role="button">
            <div class="slide-head">
              <span class="glyphicon glyphicon-cog"></span>
              <span class="title" data-target="Tab11">11</span>
            </div>
          </div>
          <div class="list-item slide" role="button">
            <div class="slide-head">
              <span class="glyphicon glyphicon-cog"></span>
              <span class="title" data-target="Tab12">12</span>
            </div>
          </div>
          <div class="list-item">01</div>
          <div class="list-item">02</div>
          <div class="list-item">03</div>
          <div class="list-item">04</div>
          <div class="list-item">05</div>
          <div class="list-item">06</div>
          <div class="list-item">07</div>
          <div class="list-item">08</div>
          <div class="list-item">09</div>
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
        </div>
        <a href="/index.php" class="front-end">
          <span class="glyphicon glyphicon-home"></span>
          <span>前台首页</span>
        </a>
      </div>

      <div class="content-wrap">
        <div class="content-inner">
          <ul id="pageTabs" class="hidden-xs nav nav-tabs" role="tablist">
            <li role="presentation">
              <span class="pull-left glyphicon glyphicon-file"></span>
              <a href="#profileTab" data-toggle="tab">开始文档</a>
              <span class="pull-right glyphicon glyphicon-remove tabRemove" role="button"></span>
            </li>
            <li role="presentation" class="active">
              <span class="pull-left glyphicon glyphicon-globe"></span>
              <a href="#siteTab" data-toggle="tab">网站设置</a>
              <span class="pull-right glyphicon glyphicon-remove tabRemove" role="button"></span>
            </li>
          </ul>
          <div id="pageTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane" id="profileTab">
              <p class="begin">
                尊敬的<a href="#"><?php echo $_SESSION["user"]["username"];?></a>，您好！
              </p>
              <p class="content">
                欢迎使用本后台管理系统，通过本系统您可以轻松地进行人员管理、权限设置、内容管理等操作，本系统功能正在进一步开发完善中，如果您有更好的想法或建议，如果您在使用过程中遇到任何问题，请联系我！
              </p>
              <p class="end">
                再次感谢您使用本系统，祝您生活愉快！
              </p>
              <p class="sign">
                ——黄狮虎
              </p>
            </div>
            <div role="tabpanel" class="tab-pane active" id="siteTab">
              <div class="siteWrap">
                <div class="input-group">
                  <label for="domain" class="input-group-addon">网站域名</label>
                  <input type="text" class="form-control" name="domain" id="domain">
                </div>
                <div class="input-group">
                  <label for="title" class="input-group-addon">网站标题</label>
                  <input type="text" class="form-control" name="title" id="title">
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="adminTab">
              admin Tabpanel
            </div>
          </div>

        </div>
      </div>

    </section>
    <section class="page-foot"></section>


    

  </div> <!-- /.layer-->

  <script type="text/javascript" src="/cms/include/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/cms/include/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/cms/include/js/cms.js"></script>
</body>
</html>