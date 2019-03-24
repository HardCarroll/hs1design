<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/cms/include/php/include.php");
// $dataJson = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/cms/upload/article/1.json");
$dataJson = file_get_contents("php://input");
$dataArray = json_decode($dataJson, true);
$st_title = $dataArray["st_title"];
$st_keywords = $dataArray["st_keywords"];
$st_description = $dataArray["st_description"];
$ct_title = $dataArray["ct_title"];
$ct_author = $dataArray["ct_author"];
$ct_class = $dataArray["ct_class"];
$ct_issue = $dataArray["ct_issue"];
$ct_content = $dataArray["ct_content"];
// $more_prev = $dataArray["more_prev"];
// $more_next = $dataArray["more_next"];
function transmitType($key) {
  $type = '';
  switch($key) {
    case 0:
      $type = '公司动态';
      break;
    case 1:
      $type = '行业资讯';
      break;
  }
  return $type;
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Keywords" content="<?php echo $st_keywords; ?>">
  <meta name="Description" content="<?php echo $st_description; ?>">
  <title><?php echo $st_title; ?></title>
  <link rel="stylesheet" href="/cms/include/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/cms/include/css/icons.css">
  <link rel="stylesheet" href="/lib/css/shared.css">
  <link rel="stylesheet" href="/lib/css/article_temp.css">
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
            <li><a href="/case">案例</a></li>
            <li class="dropdown active" id="nav_about">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">更多 <span class="caret visible-xs-inline-block"></span></a>
              <ul class="dropdown-menu">
                <li class="active"><a href="/article">综合资讯</a></li>
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

      <!-- 案例展示区域开始 .article-display begin -->
      <div class="container-fluid wrapper article-display">
        <div class="inner current-position">
          <ol class="breadcrumb">
            <span class="glyphicon glyphicon-map-marker"></span>
            <li><a href="/">首页</a></li>
            <li><a href="/article">综合资讯</a></li>
            <li class="active"><?php echo $ct_title; ?></li>
          </ol>
        </div>

        <div class="inner row article-content">
          <div class="col-xs-12 col-md-8 col-lg-9 article-card">
            <div class="contain-fluid card-wrap">
              <span class="glyphicon glyphicon-bullhorn"></span>
              <div class="card-head">
                <p class="title"><?php echo $ct_title; ?></p>
                <p class="extra">
                  <span style="margin-left: 15px;">作者：</span><a href="/" class="author"><?php echo $ct_author; ?></a>
                  <span style="margin-left: 15px;">类别：</span><a href="/article/" class="type"><?php echo transmitType($ct_class); ?></a>
                  <span style="margin-left: 15px;">发布时间：</span><span class="date"><?php echo $ct_issue; ?></span>
                </p>
              </div>
              <hr>
              <div class="card-body"><?php echo $ct_content; ?></div>
            </div>
          </div>
          <div class="col-md-4 col-lg-3 visible-md-block visible-lg-block recommends-wrap">
            <div class="panel panel-default recommends">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-star"></span>推荐阅读</h3>
              </div>
              <div class="panel-body list-group">
                <!-- <div class="list-group-item text-info text-ellipsis"><a href="Article_url">Article_Title</a></div> -->
                <!-- 动态生成推荐阅读列表 -->
                <?php
                $recommends = $articleManage->queryTable("b_recommends='T'");
                if($articleManage->getCounts("b_recommends='T'")) {
                  foreach($recommends as $recommends_item) {
                    echo '<div class="list-group-item text-info text-ellipsis"><a href="'.$recommends_item["st_path"].'">'.$recommends_item["ct_title"].'</a></div>';
                  }
                }
                else {
                  echo "暂无推荐文章！";
                }
                ?>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- 案例展示区域结束 .article-display end -->

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

  <!-- 案例图片展示模态框 -->
  <div id="displayModal" class="modal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="displayModalLabel">Modal title</h4>
      </div>
      <div class="modal-content">
        <div class="modal-body">
          <!-- <img class="fade" src="img_url" title="img_title" alt="img_alt"> -->
          <!-- 动态生成模态框内案例图片展示 -->
          <?php
          foreach($imgs as $imgs_item) {
            echo '<img class="fade" src="'.$imgs_item["url"].'" title="'.$imgs_item["attr_title"].'" alt="'.$imgs_item["attr_alt"].'">';
          }
          ?>
        </div>
        <div class="modal-footer">
          <section class="btn-group">
            <span class="btn btn-default glyphicon glyphicon-triangle-left prev"></span>
            <span class="btn btn-default pos">1 / 5</span>
            <span class="btn btn-default glyphicon glyphicon-triangle-right next"></span>
          </section>
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

  <script src="/cms/include/jquery/jquery.min.js"></script>
  <script src="/cms/include/bootstrap/js/bootstrap.min.js"></script>
  <script src="/lib/js/shared.js"></script>
  <script src="/lib/js/article_temp.js"></script>
</body>
</html>