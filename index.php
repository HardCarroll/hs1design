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
  <link rel="stylesheet" href="/lib/css/iconcuz.css">
  <link rel="stylesheet" href="/lib/css/shared.css">
  <link rel="stylesheet" href="/lib/css/home.css">
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

    <!-- 网页内容区域开始 #pageContent begin-->
    <div id="pageContent" class="container-fluid">

    <!-- 首页轮播大图区域开始 #carousel_banner begin -->
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
      </div> <!-- 首页轮播大图结束 #carousel_banner end -->

      <!-- 服务项目区域开始 #cando begin -->
      <div class="container-fluid wrapper" id="cando">
        <section class="cando-title">我们能做什么</section>
        <section class="cando-sep">
          <span class="sep-line"></span>
          <span class="glyphicon glyphicon-blackboard"></span>
          <span class="sep-line"></span>
        </section>
        <ul class="row list-group cando-list">
          <li class="col-xs-12 col-sm-6 col-md-3 cando-list-item">
            <a href="#" class="item-des text-muted">
              <span class="item-title">室内空间设计</span>
              <span class="item-thumb icon icon-serv icon-tools"></span>
              <span class="item-extra">extra text</span>
            </a>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-3 cando-list-item">
            <a href="#" class="item-des text-muted">
              <span class="item-title">室内空间设计</span>
              <span class="item-thumb icon icon-serv icon-tools"></span>
              <span class="item-extra">extra text</span>
            </a>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-3 cando-list-item">
            <a href="#" class="item-des text-muted">
              <span class="item-title">室内空间设计</span>
              <span class="item-thumb icon icon-serv icon-tools"></span>
              <span class="item-extra">extra text</span>
            </a>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-3 cando-list-item">
            <a href="#" class="item-des text-muted">
              <span class="item-title">室内空间设计</span>
              <span class="item-thumb icon icon-serv icon-tools"></span>
              <span class="item-extra">extra text</span>
            </a></li>
        </ul>
      </div> <!-- 服务项目区域结束 #case end -->

      <!-- 设计案例展示开始 #case begin -->
      <div class="wrapper" id="case">
        <div class="container-fluid inner">
          <section class="case-title">
            <span>设计案例</span>
            <hr>
            <a href="#">MORE+</a>
          </section>
          <ul class="row case-list">
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item">
              <div class="case-img">
                <img alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text">案例文字描述</h3>
                <a href="#" class="glyphicon glyphicon-menu-right"></a>
              </div>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item">
              <div class="case-img">
                <img alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text">案例文字描述</h3>
                <a href="#" class="glyphicon glyphicon-menu-right"></a>
              </div>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item">
              <div class="case-img">
                <img alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text">案例文字描述</h3>
                <a href="#" class="glyphicon glyphicon-menu-right"></a>
              </div>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item">
              <div class="case-img">
                <img alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text">案例文字描述</h3>
                <a href="#" class="glyphicon glyphicon-menu-right"></a>
              </div>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item">
              <div class="case-img">
                <img alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text">案例文字描述</h3>
                <a href="#" class="glyphicon glyphicon-menu-right"></a>
              </div>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item">
              <div class="case-img">
                <img alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text">案例文字描述</h3>
                <a href="#" class="glyphicon glyphicon-menu-right"></a>
              </div>
            </li><li class="col-xs-12 col-sm-6 col-md-4 case-list-item">
              <div class="case-img">
                <img alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text">案例文字描述</h3>
                <a href="#" class="glyphicon glyphicon-menu-right"></a>
              </div>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item">
              <div class="case-img">
                <img alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text">案例文字描述</h3>
                <a href="#" class="glyphicon glyphicon-menu-right"></a>
              </div>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item">
              <div class="case-img">
                <img alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text">案例文字描述</h3>
                <a href="#" class="glyphicon glyphicon-menu-right"></a>
              </div>
            </li>
          </ul>
        </div>
      </div> <!-- 设计案例展示结束 #news end -->

      <!-- 我们的优势版块开始 #advantage begin -->
      <div class="container-fluid wrapper clearfix" id="advantage">
        <div class="advantage row">
          <div class="advantage-img hidden-xs col-sm-9">
            <img src="/src/content.jpg" alt="关于炉石空间的图片，空间设计为什么选择炉石空间设计的图片">
          </div>
          <div class="advantage-text col-xs-12 col-sm-3 pull-right">
            <div class="advantage-inner">
              <p class="advantage-title">
                <span class="glyphicon glyphicon-bookmark"></span>
                <span>为什么选择我们</span>
              </p>
              <ul class="advantage-list">
                <li class="advantage-list-item">
                  <span class="glyphicon glyphicon-check"></span>
                  <span>专业室内空间设计师1对1</span>
                </li>
                <li class="advantage-list-item">
                  <span class="glyphicon glyphicon-check"></span>
                  <span>免费上门量房，免费平面方案</span>
                </li>
                <li class="advantage-list-item">
                  <span class="glyphicon glyphicon-check"></span>
                  <span>根据您预算设计，缩减施工成本</span>
                </li>
                <li class="advantage-list-item">
                  <span class="glyphicon glyphicon-check"></span>
                  <span>360全景效果图，空间表现更直观</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- 我们的优势版块结束 #advantage end -->

      <!-- 动态资讯开始 #news begin -->
      <div class="container-fluid wrapper" id="news">
        <section class="news-title">动态资讯</section>
        <section class="news-sep">
          <span class="sep-line"></span>
          <span class="glyphicon glyphicon-bullhorn"></span>
          <span class="sep-line"></span>
        </section>
        <section class="row inner">
          <ul class="col-xs-12 col-md-6 news-list news-cpy">
            <li class="news-list-item">cpy1</li>
            <li class="news-list-item">cpy2</li>
            <li class="news-list-item">cpy3</li>
            <li class="news-list-item">cpy4</li>
            <li class="news-list-item">cpy5</li>
            <li class="news-list-item">cpy6</li>
          </ul>
          <ul class="col-xs-12 col-md-6 news-list news-all">
            <li class="news-list-item">all1</li>
            <li class="news-list-item">all2</li>
            <li class="news-list-item">all3</li>
            <li class="news-list-item">all4</li>
            <li class="news-list-item">all5</li>
            <li class="news-list-item">all6</li>
          </ul>
        </section>
        
      </div> <!-- 动态资讯结束 #news end -->

    </div><!-- 网页内容区域结束 // #pageContent end -->

    <!-- 网页脚注区域开始 #pageFooter begin-->
    <ul class="container-fluid" id="pageFooter">
      <li class="row copyright">
        <span class="col-xs-12 col-sm-9">Copyright&nbsp;©&nbsp;2018&nbsp;&nbsp;<a href="https://www.hs1design.com"><strong>炉石空间设计</strong></a>&nbsp;&nbsp;All Rights Reserved</span>
        <span class="col-xs-12 col-sm-3"><a href="http://www.miitbeian.gov.cn/" class="text-muted"><img src="/src/ba.png" alt="湖南炉石空间设计ICP备案号图标">湘ICP备88888888-1号</a></span>
      </li>
    </ul><!-- 网页脚注区域结束 // #pageFooter end -->
  </div>

  <!-- 右下角fixed侧边栏 -->
  <ul class="list-group fixed fixed-rb" id="asidebar_tools">
    <ul class="hidden-xs list-group <?php if(!$_SESSION["bFirst"]) {echo 'hidden';} ?>" id="asidebar">
      <li class="list-group-item" role="button" id="btn_aside_qq"><a href="http://wpa.qq.com/msgrd?v=3&uin=292610020&site=qq&menu=yes"><span class="icon icon-cuz icon-qq"></a></span></li>
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
        <li role="button" class="btn btn-default"><a href="tel:17752845216"><span class="glyphicon glyphicon-phone"></span><span>致电</span></a></li>
      </ul>
    </div>
  </div><!-- // .bottom-nav-wrap end -->
  
    

  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="/lib/js/shared.js"></script>
  <script src="/lib/js/home.js"></script>
</body>
</html>