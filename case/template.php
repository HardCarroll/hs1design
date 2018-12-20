<?php
$meta_keywords = "湖南炉石空间设计";
$meta_description = "湖南炉石空间设计是一家专注于酒店、餐饮、KTV等室内空间的专业设计机构，拥有专业优秀的空间设计、软装设计和施工工程监理的团队，服务客户遍布全国，近年来与国内众多知名商业连锁品牌保持着良好稳定持续的合作关系，在餐饮和娱乐设计领域积累了难得的宝贵经验，本着“风格至上，细节至美”的理念，设计作品得到越来越多的业内人士和客户的高度认可，湖南炉石空间设计为您的商业空间效果展现保驾护航。";
$site_title = "湖南炉石空间设计丨专注于餐厅空间设计、酒店空间设计、KTV空间设计";
$case_title = "模板-案例名称(xxx餐厅)";
$case_address = "模板-案例地址(省\市\县\具体地址)";
$case_area = "模板-案例面积大小(单位:平方米)";
$case_type = "模板-案例类型(餐厅\酒店\KTV\其他)";
$case_team = "模板-案例主创团队(餐厅空间设计小组)";
$case_company = "模板-案例出品单位(湖南炉石空间设计)";
$case_description = "模板-案例简介(关于此案例的详细介绍文案)";
$more_prev = "<a href='#'>more artical previous</a>";
$more_next = "<a href='#'>more artical next</a>";
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Keywords" content="<?php echo $meta_keywords; ?>">
  <meta name="Description" content="<?php echo $meta_description; ?>">
  <title><?php echo $site_title; ?></title>
  <link rel="stylesheet" href="/cms/common/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/cms/common/css/icons.css">
  <link rel="stylesheet" href="/lib/css/shared.css">
  <link rel="stylesheet" href="/lib/css/template.css">
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
            <li class="dropdown" id="nav_service">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">服务 <span class="caret visible-xs-inline-block"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">空间设计</a></li>
                <li><a href="#">品牌设计</a></li>
                <li><a href="#">装饰施工</a></li>
                <li><a href="#">网络运维</a></li>
              </ul>
            </li>
            <li class="active"><a href="/case">案例</a></li>
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

      <!-- 案例展示区域开始 .case-display begin -->
      <div class="container-fluid wrapper case-display">
        <div class="inner row current-position">
          <div class="hidden-xs col-sm-2 col-md-2 placeholder"></div>
          <ol class="col-xs-12 col-sm-10 col-md-10 breadcrumb">
            <span class="glyphicon glyphicon-map-marker rotateYcircle"></span>
            <li><a href="/">首页</a></li>
            <li><a href="/case">案例</a></li>
            <li><a href="/case/index.php?type=1">酒店</a></li>
            <li class="active">酒店空间设计案例展示作品</li>
          </ol>
        </div>

        <div class="inner row case-content">
          <div class="col-xs-2 col-md-2 col-lg-2 case-thumb" style="background-color: pink;">
            <ul class="thumb-list">
              <li data-imgtitle="外立面效果图" data-imgurl="/src/b_01.jpg" data-imgalt="图片alt属性01">
                <img src="/src/b_01.jpg" alt="图片alt属性01">
              </li>
              <li data-imgtitle="大厅效果图" data-imgurl="/src/b_02.jpg" data-imgalt="图片alt属性02">
                <img src="/src/b_02.jpg" alt="图片alt属性02">
              </li>
              <li data-imgtitle="过道效果图" data-imgurl="/src/b_03.jpg" data-imgalt="图片alt属性03">
                <img src="/src/b_03.jpg" alt="图片alt属性03">
              </li>
              <li data-imgtitle="包厢效果图" data-imgurl="/src/b_02.jpg" data-imgalt="图片alt属性02">
                <img src="/src/b_02.jpg" alt="图片alt属性02">
              </li>
              <li data-imgtitle="吧台效果图" data-imgurl="/src/b_01.jpg" data-imgalt="图片alt属性01">
                <img src="/src/b_01.jpg" alt="图片alt属性01">
              </li>
            </ul>
          </div>
          <div class="col-xs-10 col-md-6 col-lg-7 case-card">
            <ul class="card-list">
              <span class="glyphicon glyphicon-bookmark"></span>
              <li>
                <span>项目名称：</span>
                <span><?php echo $case_title ?></span>
                <!-- <span><replace#title></span> -->
              </li>
              <li>
                <span>项目地址：</span>
                <span><?php echo $case_address ?></span>
                <!-- <span><replace#addr></span> -->
              </li>
              <li>
                <span>项目面积：</span>
                <span><?php echo $case_area ?></span>
                <!-- <span><replace#area></span> -->
              </li>
              <li>
                <span>项目类型：</span>
                <span><?php echo $case_type ?></span>
                <!-- <span><replace#type></span> -->
              </li>
              <li>
                <span>主创团队：</span>
                <span><?php echo $case_team ?></span>
                <!-- <span><replace#team></span> -->
              </li>
              <li>
                <span>出品单位：</span>
                <span><?php echo $case_company ?></span>
                <!-- <span><replace#company></span> -->
              </li>
              <hr>
              <div class="case-description">
                <span>案例简介：</span>
                <p><?php echo $case_description; ?></p>
              </div>
            </ul>
            <ul class="more-list">
              <li class="more-list-prev">
                <span>上一篇</span>
                <?php echo $more_prev; ?>
                <!-- <a href="#">article-previous</a> -->
              </li>
              <li class="more-list-next">
                <span>下一篇</span>
                <?php echo $more_next; ?>
                <!-- <a href="#">article-next</a> -->
              </li>
            </ul>
          </div>
          <div class="col-md-4 col-lg-3 visible-md-block visible-lg-block recommends-wrap">
            <div class="panel panel-default recommends">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-star"></span>推荐阅读</h3>
              </div>
              <div class="panel-body list-group">
                <div class="list-group-item text-info text-ellipsis"><a href="#">1、酒店空间设计案例展示作品酒店空间设计案例展示作品酒店空间设计案例展示作品</a></div>
                <div class="list-group-item text-info text-ellipsis"><a href="#">2、酒店空间设计案例展示作品酒店空间设计案例展示作品酒店空间设计案例展示作品</a></div>
                <div class="list-group-item text-info text-ellipsis"><a href="#">3、酒店空间设计案例展示作品酒店空间设计案例展示作品酒店空间设计案例展示作品</a></div>
                <div class="list-group-item text-info text-ellipsis"><a href="#">4、酒店空间设计案例展示作品酒店空间设计案例展示作品酒店空间设计案例展示作品</a></div>
                <div class="list-group-item text-info text-ellipsis"><a href="#">5、酒店空间设计案例展示作品酒店空间设计案例展示作品酒店空间设计案例展示作品</a></div>
                <div class="list-group-item text-info text-ellipsis"><a href="#">6、酒店空间设计案例展示作品酒店空间设计案例展示作品酒店空间设计案例展示作品</a></div>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- 案例展示区域结束 .case-display end -->

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

      <!-- <replace#test> -->

    </div><!-- 网页内容区域结束 // #pageContent end -->

    <!-- 网页脚注区域开始 #pageFooter begin-->
    <div class="container-fluid wrapper" id="pageFooter">
      <div class="hidden-xs row inner footer">
        <ul class="col-md-4 list-group footer-nav">
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

  <!-- 案例图片展示模态框 -->
  <div id="displayModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="displayModalLabel">Modal title</h4>
      </div>
      <div class="modal-content">
        <div class="modal-body">
          <img src="/src/b_01.jpg" alt="">
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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

  <script src="/cms/common/jquery/jquery.min.js"></script>
  <script src="/cms/common/bootstrap/js/bootstrap.min.js"></script>
  <script src="/lib/js/shared.js"></script>
  <script src="/lib/js/template.js"></script>
</body>
</html>