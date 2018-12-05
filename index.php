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
  <link rel="stylesheet" href="/lib/css/icons.css">
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
          <a href="/"><img src="/src/HSD_WHITE.png" alt="炉石空间设计的LOGO图片"></a>
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
          <a class="navbar-brand text-hide" href="/"><strong>炉石空间设计丨专注于餐厅空间设计、酒店空间设计、KTV空间设计</strong><img src="/src/HSD_BLACK.png" alt="炉石空间设计的LOGO图片"></a>
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
            <li class="dropdown" id="nav_service">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">服务 <span class="caret visible-xs-inline-block"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">空间设计</a></li>
                <li><a href="#">品牌设计</a></li>
                <li><a href="#">网络运维</a></li>
              </ul>
            </li>
            <li><a href="#">案例</a></li>
            <li class="dropdown" id="nav_about">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">关于 <span class="caret visible-xs-inline-block"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">动态资讯</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">加入我们</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- // #navbar_hsd end -->
    </nav><!-- // .navbar-hsd end -->

    <!-- 网页内容区域 #pageContent begin-->
    <div id="pageContent" class="container-fluid">

    <!-- 首页轮播大图区域 #carousel_banner begin -->
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
      </div> <!-- 首页轮播大图 #carousel_banner end -->

      <div class="wrapper">
        <div class="inner">
        </div>
      </div>

      <ul>
        <li>placeholder: 8800</li>
        <li>placeholder: 8801</li>
        <li>placeholder: 8802</li>
        <li>placeholder: 8803</li>
        <li>placeholder: 8804</li>
        <li>placeholder: 8805</li>
        <li>placeholder: 8806</li>
        <li>placeholder: 8807</li>
        <li>placeholder: 8808</li>
        <li>placeholder: 8809</li>
        <li>placeholder: 8810</li>
        <li>placeholder: 8811</li>
        <li>placeholder: 8812</li>
        <li>placeholder: 8813</li>
        <li>placeholder: 8814</li>
        <li>placeholder: 8815</li>
        <li>placeholder: 8816</li>
        <li>placeholder: 8817</li>
        <li>placeholder: 8818</li>
        <li>placeholder: 8819</li>
        <li>placeholder: 8820</li>
        <li>placeholder: 8821</li>
        <li>placeholder: 8822</li>
        <li>placeholder: 8823</li>
        <li>placeholder: 8824</li>
        <li>placeholder: 8825</li>
        <li>placeholder: 8826</li>
        <li>placeholder: 8827</li>
        <li>placeholder: 8828</li>
        <li>placeholder: 8829</li>
        <li>placeholder: 8830</li>
        <li>placeholder: 8831</li>
        <li>placeholder: 8832</li>
        <li>placeholder: 8833</li>
        <li>placeholder: 8834</li>
        <li>placeholder: 8835</li>
        <li>placeholder: 8836</li>
        <li>placeholder: 8837</li>
        <li>placeholder: 8838</li>
        <li>placeholder: 8839</li>
        <li>placeholder: 8840</li>
        <li>placeholder: 8841</li>
        <li>placeholder: 8842</li>
        <li>placeholder: 8843</li>
        <li>placeholder: 8844</li>
        <li>placeholder: 8845</li>
        <li>placeholder: 8846</li>
        <li>placeholder: 8847</li>
        <li>placeholder: 8848</li>
        <li>placeholder: 8849</li>
        <li>placeholder: 8850</li>
        <li>placeholder: 8851</li>
        <li>placeholder: 8852</li>
        <li>placeholder: 8853</li>
        <li>placeholder: 8854</li>
        <li>placeholder: 8855</li>
        <li>placeholder: 8856</li>
        <li>placeholder: 8857</li>
        <li>placeholder: 8858</li>
        <li>placeholder: 8859</li>
        <li>placeholder: 8860</li>
        <li>placeholder: 8861</li>
        <li>placeholder: 8862</li>
        <li>placeholder: 8863</li>
        <li>placeholder: 8864</li>
        <li>placeholder: 8865</li>
        <li>placeholder: 8866</li>
        <li>placeholder: 8867</li>
        <li>placeholder: 8868</li>
        <li>placeholder: 8869</li>
        <li>placeholder: 8870</li>
        <li>placeholder: 8871</li>
        <li>placeholder: 8872</li>
        <li>placeholder: 8873</li>
        <li>placeholder: 8874</li>
        <li>placeholder: 8875</li>
        <li>placeholder: 8876</li>
        <li>placeholder: 8877</li>
        <li>placeholder: 8878</li>
        <li>placeholder: 8879</li>
        <li>placeholder: 8880</li>
        <li>placeholder: 8881</li>
        <li>placeholder: 8882</li>
        <li>placeholder: 8883</li>
        <li>placeholder: 8884</li>
        <li>placeholder: 8885</li>
        <li>placeholder: 8886</li>
        <li>placeholder: 8887</li>
        <li>placeholder: 8888</li>
        <li>placeholder: 8889</li>
        <li>placeholder: 8890</li>
        <li>placeholder: 8891</li>
        <li>placeholder: 8892</li>
        <li>placeholder: 8893</li>
        <li>placeholder: 8894</li>
        <li>placeholder: 8895</li>
        <li>placeholder: 8896</li>
        <li>placeholder: 8897</li>
        <li>placeholder: 8898</li>
        <li>placeholder: 8899</li>
      </ul>
    </div><!-- // #pageContent end -->

    <!-- 网页脚注区域 #pageFooter begin-->
    <div id="pageFooter">
    </div><!-- // #pageFooter end -->
  </div>

  <!-- 右下角fixed侧边栏 -->
  <ul class="list-group fixed fixed-rb" id="asidebar_tools">
    <ul class="hidden-xs list-group" id="asidebar">
      <li class="list-group-item" role="button" id="btn_aside_qq"><a href="http://wpa.qq.com/msgrd?v=3&uin=292610020&site=qq&menu=yes"><span class="icon-qq"></a></span></li>
      <li class="list-group-item" role="button" id="btn_aside_tel"><span class="glyphicon glyphicon-earphone"></span></li>
      <li class="list-group-item" role="button" id="btn_aside_qrcode"><span class="glyphicon glyphicon-qrcode"></span></li>
    </ul>
    <li class="list-group-item hidden" role="button" id="btn_backtop"><span class="glyphicon glyphicon-arrow-up"></span></li>
  </ul>

  <!-- 底部fixed功能栏 -->
  <div class="bottom-nav-wrap" id="tools_bottom">
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
  <script src="/lib/js/shared.js"></script>
  <script src="/lib/js/home.js"></script>
</body>
</html>