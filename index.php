<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/lib/php/handle.php");
?>
<!DOCTYPE html>
<html lang="zh-CN" <?php if(!$_SESSION["bFirst"]) {echo 'class="of-hidden"';} ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Keywords" content="湖南炉石空间设计">
  <meta name="Description" content="湖南炉石空间设计是一家专注于酒店、餐饮、KTV等室内空间的专业设计机构，拥有专业优秀的空间设计、软装设计和施工工程监理的团队，服务客户遍布全国，近年来与国内众多知名商业连锁品牌保持着良好稳定持续的合作关系，在餐饮和娱乐设计领域积累了难得的宝贵经验，本着“风格至上，细节至美”的理念，设计作品得到越来越多的业内人士和客户的高度认可，湖南炉石空间设计为您的商业空间效果展现保驾护航。">
  <title>湖南炉石空间设计丨专注于餐厅空间设计、酒店空间设计、KTV空间设计</title>
  <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/lib/css/shared.css">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
</head>
<body <?php if(!$_SESSION["bFirst"]) {echo 'class="of-hidden"';} ?>>
  <!-- full-screen 开始巨幕 -->
  <div id="full-screen" <?php if($_SESSION["bFirst"]) {echo 'class="hidden"';} ?>>
    <div class="container">
      <section class="description">
        <h1 class="logo">
          <strong>炉石空间设计丨专注于餐厅空间设计、酒店空间设计、KTV空间设计</strong>
          <a href="/index.php"><img src="/src/HSD_WHITE.png" alt="炉石空间设计的LOGO图片"></a>
        </h1>
        <p>
          一家专注于酒店、餐饮、KTV等室内空间的专业设计机构，拥有专业优秀的空间设计、软装设计和施工工程监理的团队，服务客户遍布全国，近年来与国内众多知名商业连锁品牌保持着良好稳定持续的合作关系，在餐饮和娱乐设计领域积累了难得的宝贵经验，本着“风格至上，细节至美”的理念，设计作品得到越来越多的业内人士和客户的高度认可，湖南炉石空间设计为您的商业空间效果展现保驾护航。
        </p>
      </section>
      <!-- <span class="btn btn-warning btn-lg btn-normal" role="button" id="btn_index">了解更多</span> -->
      <button class="btn btn-warning btn-lg btn-normal" data-loading-text="努力加载中..." autocomplete="off" id="btn_index">了解更多</button>
    </div>
  </div>
  <div id="indexPage">
    <!-- 导航栏 navbar-hsd begin -->
    <nav class="navbar navbar-default navbar-hsd">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar_hsd" aria-expanded="false">
            <!-- <span class="sr-only">炉石空间设计官方网站导航栏，专注于餐厅空间设计、酒店空间设计、KTV空间设计</span> -->
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand text-hide" href="/index.php"><strong>炉石空间设计丨专注于餐厅空间设计、酒店空间设计、KTV空间设计</strong><img src="/src/HSD_BLACK.png" alt="炉石空间设计的LOGO图片"></a>
        </div>
        <div class="navbar-top pull-right hidden-xs">
          <section class="phone">
            <p>
              <span>全国服务热线</span>
            </p>
            <p>
              <span class="glyphicon glyphicon-phone-alt"></span>
              <span>0731-86393210</span>
            </p>
          </section>
          <section class="qrcode">
            <img src="/src/qrcode_for_hsd.jpg" alt="专注于餐厅空间设计,炉石空间设计的公众号二维码">
          </section>
        </div>
      </div><!-- //.container-fluid -->

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar_hsd">
        <div class="navbar-wrap">
          <form class="navbar-form navbar-left">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="请输入要查询的关键词...">
              <p class="input-group-addon" id="btn_search" role="button"><span class="glyphicon glyphicon-search"></span></p>
            </div>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="/">首页</a></li>
            <li><a href="#">服务</a></li>
            <li><a href="#">案例</a></li>
            <li><a href="#">关于</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- // #navbar_hsd end -->
    </nav><!-- // .navbar-hsd end -->

    <!-- 网页内容区域 #pageContent begin-->
    <div id="pageContent" class="container-fluid">
      <div id="carousel_banner" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel_banner" data-slide-to="0" class="active"></li>
          <li data-target="#carousel_banner" data-slide-to="1"></li>
          <li data-target="#carousel_banner" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="/src/b_01.jpg" alt="湖南炉石空间设计精品案例展示轮播图片01">
            <div class="carousel-caption text-hide">
            湖南炉石空间设计精品案例展示轮播图片01
            </div>
          </div>
          <div class="item">
            <img src="/src/b_02.jpg" alt="湖南炉石空间设计精品案例展示轮播图片02">
            <div class="carousel-caption text-hide">
            湖南炉石空间设计精品案例展示轮播图片02
            </div>
          </div>
          <div class="item">
            <img src="/src/b_03.jpg" alt="湖南炉石空间设计精品案例展示轮播图片03">
            <div class="carousel-caption text-hide">
            湖南炉石空间设计精品案例展示轮播图片03
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel_banner" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel_banner" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <ul>
        <li>8801test</li>
        <li>8802hello</li>
        <li>8803world</li>
        <li>8804haha</li>
        <li>8805bbbb</li>
        <li>8806cccc</li>
        <li>8807</li>
        <li>8808</li>
        <li>8809</li>
        <li>8810</li>
        <li>8811</li>
        <li>8812</li>
        <li>8813</li>
        <li>8814</li>
        <li>8815</li>
        <li>8816</li>
        <li>8817</li>
        <li>8818</li>
        <li>8819</li>
        <li>8820</li>
        <li>8821</li>
        <li>8822</li>
        <li>8823</li>
        <li>8824</li>
        <li>8825</li>
        <li>8826</li>
        <li>8827</li>
        <li>8828</li>
        <li>8829</li>
        <li>8830</li>
        <li>8831</li>
        <li>8832</li>
        <li>8833</li>
        <li>8834</li>
        <li>8835</li>
        <li>8836</li>
        <li>8837</li>
        <li>8838</li>
        <li>8839</li>
        <li>8840</li>
        <li>8841</li>
        <li>8842</li>
        <li>8843</li>
        <li>8844</li>
        <li>8845</li>
        <li>8846</li>
        <li>8847</li>
        <li>8848</li>
        <li>8849</li>
        <li>8850</li>
        <li>8851</li>
        <li>8852</li>
        <li>8853</li>
        <li>8854</li>
        <li>8855</li>
        <li>8856</li>
        <li>8857</li>
        <li>8858</li>
        <li>8859</li>
        <li>8860</li>
        <li>8861</li>
        <li>8862</li>
        <li>8863</li>
        <li>8864</li>
        <li>8865</li>
        <li>8866</li>
        <li>8867</li>
        <li>8868</li>
        <li>8869</li>
        <li>8870</li>
        <li>8871</li>
        <li>8872</li>
        <li>8873</li>
        <li>8874</li>
        <li>8875</li>
        <li>8876</li>
        <li>8877</li>
        <li>8878</li>
        <li>8879</li>
        <li>8880</li>
        <li>8881</li>
        <li>8882</li>
        <li>8883</li>
        <li>8884</li>
        <li>8885</li>
        <li>8886</li>
        <li>8887</li>
        <li>8888</li>
        <li>8889</li>
        <li>8890</li>
        <li>8891</li>
        <li>8892</li>
        <li>8893</li>
        <li>8894</li>
        <li>8895</li>
        <li>8896</li>
        <li>8897</li>
        <li>8898</li>
        <li>8899</li>
      </ul>
    </div><!-- // #pageContent end -->

    <!-- 网页脚注区域 #pageFooter begin-->
    <div id="pageFooter">
    </div><!-- // #pageFooter end -->
  </div>

  <!-- 右下角fixed侧边栏 -->
  <ul class="list-group fixed fixed-rb" id="asidebar_tools">
    <ul class="hidden-xs list-group" id="asidebar">
      <li class="list-group-item" role="button" id="btn_aside_qq"><a href="http://wpa.qq.com/msgrd?v=3&uin=292610020&site=qq&menu=yes"><span class="glyphicon glyphicon-headphones"></a></span></li>
      <li class="list-group-item" role="button" id="btn_aside_tel"><span class="glyphicon glyphicon-earphone"></span></li>
      <li class="list-group-item" role="button" id="btn_aside_qrcode"><span class="glyphicon glyphicon-qrcode"></span></li>
    </ul>
    <li class="list-group-item hidden" role="button" id="btn_backtop"><span class="glyphicon glyphicon-arrow-up"></span></li>
  </ul>

  <!-- 底部fixed功能栏 -->
  <div class="bottom-nav-wrap <?php if(!$_SESSION["bFirst"]) {echo 'hidden';} ?>" id="tools_bottom">
    <div role="navigation" class="navbar navbar-default navbar-fixed-bottom visible-xs-block">
      <ul class="btn-group container-fluid" role="group">
        <li role="button" class="btn btn-default"><a href="#"><span class="glyphicon glyphicon-home"></span><span>首页</span></a></li>
        <li role="button" class="btn btn-default"><a href="#"><span class="glyphicon glyphicon-blackboard"></span><span>案例</span></a></li>
        <li role="button" class="btn btn-default"><a href="#"><span class="glyphicon glyphicon-edit"></span><span>咨询</span></a></li>
        <li role="button" class="btn btn-default"><a href="#"><span class="glyphicon glyphicon-phone"></span><span>致电</span></a></li>
      </ul>
    </div>
  </div><!-- // .bottom-nav-wrap end -->
  
    

  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="/lib/js/home.js"></script>
</body>
</html>