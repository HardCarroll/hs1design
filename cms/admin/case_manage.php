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
  <link rel="stylesheet" href="/cms/include/css/case_manage.css">
  <title>案例管理——Powered by 黄狮虎</title>
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
          <div class="list-item slide" role="button" href="/cms/admin/index.php">
            <div class="slide-head">
              <span class="glyphicon glyphicon-file"></span>
              <span class="title">开始文档</span>
            </div>
          </div>
          <div class="list-item slide" role="button" href="/cms/admin/site_setting.php">
            <div class="slide-head">
              <span class="glyphicon glyphicon-globe"></span>
              <span class="title">网站设置</span>
            </div>
          </div>
          <div class="list-item slide slide-left active" role="button" href="/cms/admin/case_manage.php">
            <div class="slide-head">
              <span class="glyphicon glyphicon-blackboard"></span>
              <span class="title">案例管理</span>
              <span class="pull-right glyphicon glyphicon-menu"></span>
            </div>
            <ul class="slide-menu">
              <li class="text-primary active" href="#caseTab">
                <span class="glyphicon glyphicon-list"></span>
                <span class="title">案例总览</span>
              </li>
              <li class="text-primary" href="#uploadTab">
                <span class="glyphicon glyphicon-cloud-upload"></span>
                <span class="title">上传案例</span>
              </li>
            </ul>
          </div>
          <div class="list-item slide" role="button" href="/cms/admin/user_manage.php">
            <div class="slide-head">
              <span class="glyphicon glyphicon-user"></span>
              <span class="title">用户管理</span>
            </div>
          </div>
        </div>
        <a href="/index.php" class="front-end">
          <span class="glyphicon glyphicon-home"></span>
          <span>前台首页</span>
        </a>
      </div>

      <div class="content-wrap">
        <div class="content-inner">
          <ul id="pageTabs" class="hidden-xs nav nav-tabs" role="tablist">
            <li role="presentation" class="active" href="#caseTab">
              <span class="pull-left glyphicon glyphicon-list"></span>
              <span class="title">案例总览</span>
            </li>
          </ul>
          <div id="pageTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="caseTab">
              <div class="case-head">
                当前总共有<span class="text-primary"><?php echo $caseManage->getCounts(); ?></span>条案例，其中有<span class="text-danger"><?php echo $caseManage->getCounts("c_posted=0")?></span>条还未发布，您还可以继续
                <a class="btn btn-primary" href="#uploadTab">
                  <span class="glyphicon glyphicon-cloud-upload"></span>
                  <span class="title">上传案例</span>
                </a>
              </div>
              <div class="case-wrap">
                <!-- <div class="panel-group" role="tablist" aria-multiselectable="true"> -->
                <!-- 动态生成案例列表 -->
                <!-- </div> .panel-group -->
              </div> <!-- .case-wrap -->
            </div> <!-- #caseTab -->

            <div role="tabpanel" class="tab-pane" id="uploadTab" data-cid="">
              <div class="case-page">
                <div class="input-group">
                  <label for="cp-title" class="input-group-addon">网页标题</label>
                  <input type="text" class="form-control" name="cp-title" id="cp-title">
                </div>
                <div class="input-group">
                  <label for="cp-keywords" class="input-group-addon">网页关键词</label>
                  <input type="text" class="form-control" name="cp-keywords" id="cp-keywords">
                </div>
                <div class="input-group">
                  <label for="cp-description" class="input-group-addon">网页内容简介</label>
                  <textarea type="text" class="form-control" name="cp-description" id="cp-description"></textarea>
                </div>
                <div class="input-group">
                  <label for="case-title" class="input-group-addon">项目名称</label>
                  <input type="text" class="form-control" name="case-title" id="case-title">
                </div>
                <div class="input-group">
                  <label for="case-area" class="input-group-addon">项目面积</label>
                  <input type="text" class="form-control" name="case-area" id="case-area">
                  <span class="input-group-addon">㎡</span>
                </div>
                <div class="input-group">
                  <label for="case-class" class="input-group-addon">项目类型</label>
                  <select class="form-control" name="case-class" id="case-class">
                    <option value="0">餐厅空间</option>
                    <option value="1">酒店空间</option>
                    <option value="2">娱乐空间</option>
                    <option value="3">其他设计</option>
                  </select>
                </div>
                <div class="input-group">
                  <label for="case-address" class="input-group-addon">项目地址</label>
                  <input type="text" class="form-control" name="case-address" id="case-address">
                </div>
                <div class="input-group">
                  <label for="case-team" class="input-group-addon">主创团队</label>
                  <input type="text" class="form-control" name="case-team" id="case-team">
                </div>
                <div class="input-group">
                  <label for="case-company" class="input-group-addon">出品单位</label>
                  <input type="text" class="form-control" name="case-company" id="case-company">
                </div>
                <div class="input-group">
                  <label for="case-description" class="input-group-addon">项目简介</label>
                  <textarea type="text" class="form-control" name="case-description" id="case-description"></textarea>
                </div>
                <div class="input-group">
                  <label for="case-image" class="input-group-addon">项目图片</label>
                  <div class="form-control case-thumb">
                    <div class="col-sm-4 col-md-3">
                      <input type="file" style="display: none;" multiple="true" accept=".png, .jpg, .jpeg">
                      <div class="btn btn-default btn-local">
                        <span class="glyphicon glyphicon-open"></span>
                        <span>本地上传</span>
                      </div>
                      <div class="btn btn-default btn-remote">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span>远程文件</span>
                      </div>
                      <div class="btn btn-default btn-online">
                        <span class="glyphicon glyphicon-globe"></span>
                        <span>网络图片</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="input-group">
                  <p class="text-state">&nbsp;</p>
                </div>
                <div class="input-group">
                  <span class="btn btn-default btn-close" role="button">关闭</span>
                  <span class="btn btn-warning btn-save" role="button">保存</span>
                  <span class="btn btn-success btn-post" role="button">发布</span>
                </div>
              </div>
            </div> <!--#uploadTab-->
          </div> <!-- #pageTabContent-->
        </div> <!-- .content-inner-->
      </div> <!-- .content-wrap-->

    </section>
    <section class="page-foot"></section>

  </div> <!-- /.layer-->

  <script type="text/javascript" src="/cms/include/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/cms/include/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/cms/include/js/cms.js"></script>
  <script type="text/javascript" src="/cms/include/js/case_manage.js"></script>
</body>
</html>