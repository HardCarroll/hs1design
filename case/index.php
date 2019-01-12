<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/lib/php/handle.php");
if(isset($_GET["type"]) && !empty($_GET["type"])) {
  $type = $_GET["type"];
  $type_text = "";
  switch($type) {
    case 1:
      $type = 1;
      $type_text = "酒店";
      break;
    case 2:
      $type = 2;
      $type_text = "娱乐";
      break;
    case 3:
      $type = 3;
      $type_text = "其它";
      break;
    default:
      break;
  }
}
else {
  $type = 0;
  $type_text = "餐厅";
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Keywords" content="湖南炉石空间设计">
  <meta name="Description" content="湖南炉石空间设计是一家专注于酒店、餐饮、KTV等室内空间的专业设计机构，拥有专业优秀的空间设计、软装设计和施工工程监理的团队，服务客户遍布全国，近年来与国内众多知名商业连锁品牌保持着良好稳定持续的合作关系，在餐饮和娱乐设计领域积累了难得的宝贵经验，本着“风格至上，细节至美”的理念，设计作品得到越来越多的业内人士和客户的高度认可，湖南炉石空间设计为您的商业空间效果展现保驾护航。">
  <title>案例展示-湖南炉石空间设计丨专注于餐厅空间设计、酒店空间设计、KTV空间设计</title>
  <link rel="stylesheet" href="/cms/include/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/cms/include/css/icons.css">
  <link rel="stylesheet" href="/lib/css/shared.css">
  <link rel="stylesheet" href="/lib/css/case.css">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
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
            <li class=""><a href="/">首页</a></li>
            <li><a href="/service">服务</a></li>
            <li class="active"><a href="/case">案例</a></li>
            <li class="dropdown" id="nav_about">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">更多 <span class="caret visible-xs-inline-block"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/news">综合资讯</a></li>
                <li><a href="/about">关于我们</a></li>
                <li><a href="/contact">联系我们</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- // #navbar_hsd end -->
    </nav><!-- // .navbar-hsd end -->

    <!-- 网页内容区域开始 #pageContent begin-->
    <div id="pageContent" class="container-fluid">

      <!-- 案例分类区域开始 #case_type begin -->
      <div class="container-fluid wrapper" id="case_type">
        <div class="inner row current-position">
          <div class="hidden-xs col-sm-2 col-md-2 placeholder"></div>
          <ol class="col-xs-12 col-sm-10 col-md-10 breadcrumb">
            <span class="glyphicon glyphicon-map-marker rotateYcircle"></span>
            <li><a href="/">首页</a></li>
            <li><a href="/case">案例</a></li>
            <li class="active"><?php echo $type_text; ?></li>
          </ol>
        </div>
        <div class="inner row case-nav">
          <!-- Nav tabs -->
          <ul class="col-xs-2 col-sm-2 col-md-2 col-lg-2 nav nav-tabs case-nav-list" role="tablist">
            <li class="case-nav-item<?php if($type === 0){echo ' active';} ?>" role="presentation">
              <a href="#canteen" aria-controls="canteen" role="tab" data-toggle="tab" data-type="餐厅">
                <img src="/src/case-nav-list-canteen-xs.jpg" alt="炉石空间，专注于餐厅空间设计">
              </a>
            </li>
            <li class="case-nav-item<?php if($type === 1){echo ' active';} ?>" role="presentation">
              <a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab" data-type="酒店">
                <img src="/src/case-nav-list-hotel-xs.jpg" alt="炉石空间，专注于酒店空间设计">
              </a>
            </li>
            <li class="case-nav-item<?php if($type === 2){echo ' active';} ?>" role="presentation">
              <a href="#ktv" aria-controls="ktv" role="tab" data-toggle="tab" data-type="娱乐">
                <img src="/src/case-nav-list-ktv-xs.jpg" alt="炉石空间，专注于KTV空间设计">
              </a>
            </li>
            <li class="case-nav-item<?php if($type === 3){echo ' active';} ?>" role="presentation">
              <a href="#others" aria-controls="others" role="tab" data-toggle="tab" data-type="其它">
                <img src="/src/case-nav-list-office-xs.jpg" alt="炉石空间，承接效果图、施工图制作">
              </a>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 tab-content case-type-list">
            <div role="tabpanel" class="row tab-pane case-type-item<?php if($type === 0){echo ' active';} ?>" id="canteen">
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-canteen.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-hotel.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-ktv.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-office.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-canteen.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-hotel.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-ktv.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-office.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-canteen.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-hotel.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-ktv.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
              <a href="#" class="col-xs-12 col-sm-6 col-md-4 case-item">
                <div class="case-thumb">
                  <img src="/src/case-thumb-office.jpg" alt="设计案例作品展示图片，餐厅空间设计案例">
                </div>
                <div class="case-text">
                  <h2 class="text-title text-ellipsis">案例标题案例标题案例标题案例标题案例标题</h2>
                  <h3 class="text-description text-ellipsis">案例简介文字说明案例简介文字说明案例简介文字说明</h3>
                </div>
              </a>
            </div>
            <div role="tabpanel" class="tab-pane case-type-item<?php if($type === 1){echo ' active';} ?>" id="hotel">hotel area</div>
            <div role="tabpanel" class="tab-pane case-type-item<?php if($type === 2){echo ' active';} ?>" id="ktv">ktv area</div>
            <div role="tabpanel" class="tab-pane case-type-item<?php if($type === 3){echo ' active';} ?>" id="others">others area</div>
          </div>

        </div> <!-- inner end -->
      </div> <!-- 案例分类区域结束 #case_type end -->

      <!-- 免费咨询区块开始 #online begin -->
      <div class="container-fluid wrapper" id="online">
        <ul class="inner row online-list">
          <li class="col-xs-12 col-sm-6 online-list-item">
            <div class="online-msg">
              <p class="text-warning">
                <span>感情是谈出来的，惊喜是聊出来的</span>
              </p>
              <form id="consult">
                <div class="input-group budget-type">
                  <select class="form-control" name="type">
                    <option value="0">餐厅</option>
                    <option value="1">酒店</option>
                    <option value="2">KTV</option>
                    <option value="3">其它</option>
                  </select>
                </div>
                <div class="input-group budget-area">
                  <input class="form-control" type="number" placeholder="请输入装修面积" name="area">
                  <span class="input-group-addon" style="font-size:16px;">㎡</span>
                </div>
                <div class="input-group budget-tel">
                  <input class="form-control" type="text" placeholder="您的手机号码" name="phone" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9.]+/,'');}).call(this)" onblur="(this.v=function(){this.value=this.value.replace(/[^0-9.]+/,'');}).call(this)">
                </div>
                <div class="text-danger">
                  <span class="glyphicon glyphicon-heart"></span>
                  我们承诺对您的信息绝对保密
                </div>
                <a role="button" class="btn btn-warning" id="btn_consult" data-toggle="popover" data-loading-text="资料提交中..." autocomplete="off" >免费咨询</a>
              </form>
            </div>
          </li>
          <li class="col-xs-12 col-sm-6 online-list-item">
            <div class="slogan-wrapper">
              <p class="hd">
                <span>专注</span>
                <span class="glyphicon glyphicon-record"></span>
                <span>专业</span>
                <span class="glyphicon glyphicon-record"></span>
                <span>专心</span>
              </p>
              <p class="md">
                <span>专业缔造有价值的商业空间</span>
              </p>
              <p class="bd">
                <span>空间设计、品牌策划、装饰施工、网络运维</span>
              </p>
            </div>
          </li>
        </ul>
      </div> <!-- 免费咨询区块结束 #online end -->

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
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_01.png" alt="">
                <h2>湘聚·湘里人家</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_02.png" alt="">
                <h2>柴灶鱼</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_03.png" alt="">
                <h2>湘聚·味庄</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_04.png" alt="">
                <h2>食在湘</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_05.png" alt="">
                <h2>湘当有饭</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_06.png" alt="">
                <h2>蒸粥道</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_01.png" alt="">
                <h2>湘聚·湘里人家</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_02.png" alt="">
                <h2>柴灶鱼</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_03.png" alt="">
                <h2>湘聚·味庄</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_04.png" alt="">
                <h2>食在湘</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
            <div class="item-wrap">
              <div class="item-detail">
                <img src="/src/p_05.png" alt="">
                <h2>湘当有饭</h2>
              </div>
            </div>
          </li>
          <li class="col-xs-6 col-sm-3 col-md-2 brand-list-item">
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
        <ul class="col-xs-4 col-sm-4 col-md-4 col-lg-4 list-group footer-nav">
          <h2>网站地图</h2>
          <li class="list-group-item">
            <a href="/">
              <span class="glyphicon glyphicon-minus"></span>首页
            </a>
          </li>
          <li class="list-group-item">
            <a href="/service">
              <span class="glyphicon glyphicon-minus"></span>服务
            </a>
          </li>
          <li class="list-group-item">
            <a href="/case">
              <span class="glyphicon glyphicon-minus"></span>案例
            </a>
          </li>
          <li class="list-group-item">
            <a href="/about">
              <span class="glyphicon glyphicon-minus"></span>关于
            </a>
          </li>
        </ul>
        <ul class="col-xs-4 col-sm-4 col-md-4 col-lg-4 list-group footer-info">
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
        <ul class="col-xs-4 col-sm-4 col-md-4 col-lg-4 list-group footer-links">
          <h2>友情链接</h2>
          <li class="list-group-item add-link"><a href="https://www.szwzny.com">洈洲农业发展有限公司</a></li>
          <li class="list-group-item add-link">互加友链,请加QQ476000121</li>
        </ul>
      </div>
      <div class="row copyright">
        <span class="col-xs-12 col-sm-4">Copyright&nbsp;©&nbsp;2018&nbsp;&nbsp;<a href="https://www.hs1design.com"><strong>炉石空间设计</strong></a>&nbsp;&nbsp;All Rights Reserved</span>
        <span class="col-xs-12 col-sm-4">Powered by&nbsp;&nbsp;<a href="https://www.hs1design.com"><strong>炉石空间设计网络服务部</strong></a></span>
        <span class="col-xs-12 col-sm-4"><a href="http://www.miitbeian.gov.cn/" class="text-muted"><img src="/src/ba.png" alt="湖南炉石空间设计ICP备案号图标">湘ICP备88888888-1号</a></span>
      </div>
    </div><!-- 网页脚注区域结束 // #pageFooter end -->
  </div>

  <!-- 右下角fixed侧边栏 -->
  <ul class="list-group fixed fixed-rb" id="asidebar_tools">
    <ul class="hidden-xs list-group" id="asidebar">
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
        <li role="button" class="btn btn-default"><a href="/"><span class="glyphicon glyphicon-home"></span><span>首页</span></a></li>
        <li role="button" class="btn btn-default"><a href="/case"><span class="glyphicon glyphicon-blackboard"></span><span>案例</span></a></li>
        <li role="button" class="btn btn-default"><a href="#online"><span class="glyphicon glyphicon-edit"></span><span>咨询</span></a></li>
        <li role="button" class="btn btn-default"><a href="tel:17752845216"><span class="glyphicon glyphicon-phone"></span><span>致电</span></a></li>
      </ul>
    </div>
  </div><!-- // .bottom-nav-wrap end -->

  <script src="/cms/include/jquery/jquery.min.js"></script>
  <script src="/cms/include/bootstrap/js/bootstrap.min.js"></script>
  <script src="/lib/js/shared.js"></script>
  <script src="/lib/js/case.js"></script>
</body>
</html>