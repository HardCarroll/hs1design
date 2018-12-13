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
                <li><a href="#">综合资讯</a></li>
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
        <section class="cando-title">
          <span>我们能做什么</span>
        </section>
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
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item" data-title='案例标题'>
              <div class="case-img">
                <img src="/src/d_01.jpg" alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text text-ellipsis">案例文字描述，湖南炉石空间设计</h3>
              </div>
              <a href="#" class="glyphicon glyphicon-menu-right"></a>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item" data-title='案例标题'>
              <div class="case-img">
                <img src="/src/d_02.jpg" alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text text-ellipsis">案例文字描述，专注于餐饮、酒店、KTV设计</h3>
              </div>
              <a href="#" class="glyphicon glyphicon-menu-right"></a>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item" data-title='案例标题'>
              <div class="case-img">
                <img src="/src/d_03.jpg" alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text text-ellipsis">案例文字描述，承接效果图，施工图制作</h3>
              </div>
              <a href="#" class="glyphicon glyphicon-menu-right"></a>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item" data-title='案例标题'>
              <div class="case-img">
                <img src="/src/d_03.jpg" alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text text-ellipsis">案例文字描述，湖南炉石空间设计</h3>
              </div>
              <a href="#" class="glyphicon glyphicon-menu-right"></a>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item" data-title='案例标题'>
              <div class="case-img">
                <img src="/src/d_02.jpg" alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text text-ellipsis">案例文字描述，专注于餐饮、酒店、KTV设计</h3>
              </div>
              <a href="#" class="glyphicon glyphicon-menu-right"></a>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item" data-title='案例标题'>
              <div class="case-img">
                <img src="/src/d_01.jpg" alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text text-ellipsis">案例文字描述，承接效果图，施工图制作</h3>
              </div>
              <a href="#" class="glyphicon glyphicon-menu-right"></a>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item" data-title='案例标题'>
              <div class="case-img">
                <img src="/src/d_01.jpg" alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text text-ellipsis">案例文字描述，湖南炉石空间设计</h3>
              </div>
              <a href="#" class="glyphicon glyphicon-menu-right"></a>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item" data-title='案例标题'>
              <div class="case-img">
                <img src="/src/d_02.jpg" alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text text-ellipsis">案例文字描述，专注于餐饮、酒店、KTV设计</h3>
              </div>
              <a href="#" class="glyphicon glyphicon-menu-right"></a>
            </li>
            <li class="col-xs-12 col-sm-6 col-md-4 case-list-item" data-title='案例标题'>
              <div class="case-img">
                <img src="/src/d_03.jpg" alt="">
              </div>
              <div class="case-des">
                <h2 class="des-title">案例标题</h2>
                <h3 class="des-text text-ellipsis">案例文字描述，承接效果图，施工图制作</h3>
              </div>
              <a href="#" class="glyphicon glyphicon-menu-right"></a>
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

      <!-- 综合资讯开始 #news begin -->
      <div class="container-fluid wrapper" id="news">
        <section class="news-title">
          <span>综合资讯</span>
        </section>
        <section class="news-sep">
          <span class="sep-line"></span>
          <span class="glyphicon glyphicon-bullhorn"></span>
          <span class="sep-line"></span>
        </section>
        <section class="row inner">
          <div class="col-xs-12 col-sm-6 col-md-6 news-class">
            <div class="news-company">
              <h2>公司动向</h2>
              <ul class="news-list">
                <li class="news-list-item text-ellipsis"><a href="#" data-issue="12/11">公司动向，标题01, 公司动向公司动向公司动向</a></li>
                <li class="news-list-item text-ellipsis"><a href="#" data-issue="12/11">公司动向，标题02, 公司动向公司动向公司动向</a></li>
                <li class="news-list-item text-ellipsis"><a href="#" data-issue="12/11">公司动向，标题03, 公司动向公司动向公司动向</a></li>
              </ul>
              <span class="glyphicon glyphicon-list-alt"></span>
            </div>
            <div class="news-industry">
              <h2>行业资讯</h2>
              <ul class="news-list">
                <li class="news-list-item text-ellipsis"><a href="#"  data-issue="12/11">行业资讯，标题01, 行业资讯行业资讯行业资讯</a></li>
                <li class="news-list-item text-ellipsis"><a href="#"  data-issue="12/11">行业资讯，标题02, 行业资讯行业资讯行业资讯</a></li>
                <li class="news-list-item text-ellipsis"><a href="#"  data-issue="12/11">行业资讯，标题03, 行业资讯行业资讯行业资讯</a></li>
              </ul>
              <span class="glyphicon glyphicon-globe"></span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 hidden-xs" id="map">
            <h2>全国案例分布点</h2>
            <div class="map-back">
							<span class="map-province">2</span>
							<span class="map-province">5</span>
							<span class="map-province">23</span>
							<span class="map-province">12</span>
							<span class="map-province">8</span>
							<span class="map-province">16</span>
              <span class="map-province">9</span>
						</div>
          </div>
        </section>
      </div> <!-- 综合资讯结束 #news end -->

      <div class="container-fluid wrapper" id="budget">
        <ul class="inner row budget-list">
          <li class="col-xs-12 col-sm-6 col-md-4 budget-list-item">
            <div class="item-inner cal">
              <h2 class="text-info">免费获取装修报价</h2>
              <section class="budget-result">
                <span class="lcd">1234567890</span>
                <span class="rmb">元</span>
              </section>
              <form action="#">
                <div class="input-group budget-type">
                  <select class="form-control" name="type">
                    <option value="canteen">餐厅</option>
                    <option value="hotel">酒店</option>
                    <option value="ktv">KTV</option>
                    <option value="others">其它</option>
                  </select>
                </div>
                <div class="input-group budget-area">
                  <input class="form-control" type="number" placeholder="请输入装修面积" name="area">
                  <span class="input-group-addon" style="font-size:16px;">㎡</span>
                </div>
                <div class="input-group budget-tel">
                  <input class="form-control" type="text" placeholder="您的手机号码" name="phone" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9.]+/,'');}).call(this)" onblur="(this.v=function(){this.value=this.value.replace(/[^0-9.]+/,'');}).call(this)">
                </div>
                <p><span class="glyphicon glyphicon-heart"></span>我们承诺对您的信息绝对保密</p>
                <a href="javascript:;" class="btn btn-info form-control">立即获取报价</a>
              </form>
            </div>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-4 budget-list-item">
            <div class="item-inner budget-guide">
              <h2 class="text-warning">30"获取装修报价</h2>
              <p class="get">已有<span class="text-danger counts">1408</span>位业主成功获取报价</p>
              <img src="/src/budget.jpg" alt="免费获得装修预算图片">
              <p class="button"><span class="btn btn-info">免费咨询</span></p>
            </div>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-4 budget-list-item">3</li>
        </ul>
      </div>

      <!-- 合作品牌内容区域开始 #partner begin -->
      <div class="container-fluid wrapper" id="partner">
        <section class="partner-title">
          <span>合作品牌</span>
        </section>
        <section class="partner-sep">
          <span class="sep-line"></span>
          <span class="glyphicon glyphicon-cutlery"></span>
          <span class="sep-line"></span>
        </section>
        <ul class="inner row brand-list">
          <li class="col-xs-12 col-sm-6 col-md-4 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_01.png" alt="">
                <h2>湘聚·湘里人家</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-4 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_02.png" alt="">
                <h2>柴灶鱼</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-4 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_03.png" alt="">
                <h2>湘聚·味庄</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-4 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_04.png" alt="">
                <h2>食在湘</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-4 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_05.png" alt="">
                <h2>湘当有饭</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-4 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_06.png" alt="">
                <h2>蒸粥道</h2>
              </div>
            </div>
          </li>
        </ul>
      </div> <!-- 合作品牌内容区域结束 #partner end -->

    </div><!-- 网页内容区域结束 // #pageContent end -->

    <!-- 网页脚注区域开始 #pageFooter begin-->
    <div class="container-fluid wrapper" id="pageFooter">
      <div class="hidden-xs row inner footer">
        <ul class="col-md-4 list-group footer-nav">
          <h2>网站地图</h2>
          <li class="list-group-item">
            <a href="#">
              <span class="glyphicon glyphicon-minus"></span>首页
            </a>
          </li>
          <li class="list-group-item">
            <a href="#">
              <span class="glyphicon glyphicon-minus"></span>服务
            </a>
          </li>
          <li class="list-group-item">
            <a href="#">
              <span class="glyphicon glyphicon-minus"></span>案例
            </a>
          </li>
          <li class="list-group-item">
            <a href="#">
              <span class="glyphicon glyphicon-minus"></span>关于
            </a>
          </li>
        </ul>
        <ul class="col-md-4 list-group footer-info">
          <h2>简要信息</h2>
          <li class="list-group-item">
            <span class="glyphicon glyphicon-envelope"></span>
            <span class="text">hs1design@163.com</span>
          </li>
          <li class="list-group-item">
            <span class="glyphicon glyphicon-earphone"></span>
            <span class="text">15388933393</span>
          </li>
          <li class="list-group-item">
            <span class="glyphicon glyphicon-globe"></span>
            <a href="https://www.hs1design.com">www.hs1design.com</a>
          </li>
          <li class="list-group-item">
            <span class="glyphicon glyphicon-map-marker"></span>
            <span class="text">长沙市星沙开元路星大花园1408</span>
          </li>
        </ul>
        <ul class="col-md-4 list-group footer-links">
          <h2>友情链接</h2>
          <li class="list-group-item add-link"><a href="https://www.szwzny.com">洈洲农业发展有限公司</a></li>
          <li class="list-group-item add-link">互加友链,请加QQ476000121</li>
        </ul>
      </div>
      <div class="row copyright">
        <span class="col-xs-12 col-sm-9">Copyright&nbsp;©&nbsp;2018&nbsp;&nbsp;<a href="https://www.hs1design.com"><strong>炉石空间设计</strong></a>&nbsp;&nbsp;All Rights Reserved</span>
        <span class="col-xs-12 col-sm-3"><a href="http://www.miitbeian.gov.cn/" class="text-muted"><img src="/src/ba.png" alt="湖南炉石空间设计ICP备案号图标">湘ICP备88888888-1号</a></span>
      </div>
    </div><!-- 网页脚注区域结束 // #pageFooter end -->
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