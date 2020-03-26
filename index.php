<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/lib/php/handle.php");
$baseinfo = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/lib/json/baseinfo.json"), TRUE);
?>
<!DOCTYPE html>
<html lang="zh-CN" <?php if (!$_SESSION["bFirst"]) {
                      echo 'class="of-hidden"';
                    } ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Keywords" content="<?php echo $baseinfo["site"]["keywords"] ?>">
  <meta name="Description" content="<?php echo $baseinfo["site"]["description"] ?>">
  <title><?php echo $baseinfo["site"]["title"] ?></title>
  <link rel="stylesheet" href="/cms/include/bootstrap/css/bootstrap.min.css">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/cms/include/css/icons.css">
  <link rel="stylesheet" href="/lib/css/shared.css">
  <link rel="stylesheet" href="/lib/css/home.css">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
</head>

<body <?php if (!$_SESSION["bFirst"]) {
        echo 'class="of-hidden"';
      } ?>>
  <!-- full-screen 开始巨幕 -->
  <div id="full-screen" <?php if ($_SESSION["bFirst"]) {
                          echo 'class="hidden"';
                        } ?>>
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
      <button class="btn btn-lg btn-normal" data-loading-text="努力加载中..." autocomplete="off" id="btn_index">了解更多</button>
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
          <a class="navbar-brand text-hide" href="/"><strong>炉石空间设计丨专注于餐厅空间设计、酒店空间设计、KTV空间设计</strong><img src="/src/hsd-logo.png" alt="炉石空间设计的LOGO图片"></a>
        </div>
        <div class="navbar-top pull-right hidden-xs">
          <section class="phone">
            <p>
              <span>全国服务热线</span>
            </p>
            <p>
              <span class="glyphicon glyphicon-phone-alt"></span>
              <span><?php echo $baseinfo["company"]["telephone"] ?></span>
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
            <li><a href="/service">服务</a></li>
            <li><a href="/case">案例</a></li>
            <li class="dropdown" id="nav_about">
              <a href="/about" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">更多 <span class="caret visible-xs-inline-block"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/article">综合资讯</a></li>
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

      <div class="wrapper container-fluid clearfix" id="services">
        <div class="row inner">

          <?php
          for ($i = 0; $i < 9; $i++) {
            echo '<div class="list-item col-xs-4">
            <span class="fa fa-university"></span>
            <span class="item-text hidden-xs">item text</span>
          </div>';
          }
          ?>

        </div>
      </div>

      <div class="wrapper clearfix" id="description">
        <div class="hidden-xs left-side">
          <img src="/src/content.jpg" alt="">
        </div>
        <div class="right-side">
          <div class="text">
            <p>我们是一家专注于酒店、餐饮、KTV等室内空间的专业设计机构，拥有专业优秀的空间设计、软装设计和施工工程监理的团队，服务客户遍布全国，近年来与国内众多知名商业连锁品牌保持着良好稳定持续的合作关系，在餐饮和娱乐设计领域积累了难得的宝贵经验。</p>
            <p>本着 “风格至上，细节至美” 的理念，设计作品得到越来越多的业内人士和客户的高度认可，湖南炉石空间设计为您的商业空间效果展现保驾护航。</p>
          </div>
          <div class="btn btn-default">查看更多</div>
        </div>
      </div>

      <div class="wrapper container-fluid clearfix" id="advantage">
        <div class="inner row">
          <div class="col-sm-4 choice">
            <div class="title">为什么选择我们？</div>
            <ul class="advantage-list">
              <li class="list-item">
                <span class="glyphicon glyphicon-check"></span>
                <span class="item-text">专业室内空间设计师1v1服务</span>
              </li>
              <li class="list-item">
                <span class="glyphicon glyphicon-check"></span>
                <span class="item-text">免费上门量房，免费平面方案</span>
              </li>
              <li class="list-item">
                <span class="glyphicon glyphicon-check"></span>
                <span class="item-text">根据客户预算设计，施工成本-30%</span>
              </li>
              <li class="list-item">
                <span class="glyphicon glyphicon-check"></span>
                <span class="item-text">360全景效果图，空间表现更直观</span>
              </li>
            </ul>
          </div>
          <div class="col-sm-4 si">
            <div class="title">
              <a href="javascript:;">空间设计</a>
            </div>
            <div id="carousel-si" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="/src/space_01.jpg" alt="湖南炉石空间设计精品案例展示轮播图片01">
                  <a href="javascript:;" class="carousel-caption">
                    查看更多
                  </a>
                </div>
                <div class="item">
                  <img src="/src/space_02.jpg" alt="湖南炉石空间设计精品案例展示轮播图片02">
                  <a href="javascript:;" class="carousel-caption">
                    查看更多
                  </a>
                </div>
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-si" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-si" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="col-sm-4 vi">
            <div class="title">
              <a href="javascript:;">品牌策划</a>
            </div>
            <div id="carousel-vi" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="/src/brand_01.jpg" alt="湖南炉石空间设计精品案例展示轮播图片01">
                  <a href="javascript:;" class="carousel-caption">
                    查看更多
                  </a>
                </div>
                <div class="item">
                  <img src="/src/brand_02.jpg" alt="湖南炉石空间设计精品案例展示轮播图片02">
                  <a href="javascript:;" class="carousel-caption">
                    查看更多
                  </a>
                </div>
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-vi" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-vi" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="wrapper clearfix" id="company">
        <div class="right-side">
          <div class="text">
            <p>我们是一家专注于酒店、餐饮、KTV等室内空间的专业设计机构，拥有专业优秀的空间设计、软装设计和施工工程监理的团队，服务客户遍布全国，近年来与国内众多知名商业连锁品牌保持着良好稳定持续的合作关系，在餐饮和娱乐设计领域积累了难得的宝贵经验。</p>
            <p>本着 “风格至上，细节至美” 的理念，设计作品得到越来越多的业内人士和客户的高度认可，湖南炉石空间设计为您的商业空间效果展现保驾护航。</p>
          </div>
          <div class="btn btn-default">查看更多</div>
        </div>
        <div class="hidden-xs left-side">
          <img src="/src/content.jpg" alt="">
        </div>
      </div>

      <!-- 综合资讯开始 #news begin -->
      <div class="container-fluid wrapper" id="news">
        <section class="row inner">
          <div class="col-sm-6 hidden-xs" id="map">
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

          <div class="col-sm-6 dynamic">
            <div class="dynamic-company">
              <div class="title">
                <a href="javascript:;">公司动态</a>
              </div>
              <ul class="content-list">

                <?php
                $dynamic_company = [array("st_path" => "javascript:;", "ct_issue" => "2020/03/25", "ct_title" => "公司动向，标题01, 公司动向公司动向公司动向"), array("st_path" => "javascript:;", "ct_issue" => "2020/03/25", "ct_title" => "公司动向，标题02, 公司动向公司动向公司动向"), array("st_path" => "javascript:;", "ct_issue" => "2020/03/25", "ct_title" => "公司动向，标题03, 公司动向公司动向公司动向"), array("st_path" => "javascript:;", "ct_issue" => "2020/03/25", "ct_title" => "公司动向，标题04, 公司动向公司动向公司动向")];

                for ($i = 0; $i < count($dynamic_company); $i++) {
                  echo '<li class="list-item text-ellipsis"><a href="' . $dynamic_company[$i]["st_path"] . '" data-issue="' . $dynamic_company[$i]["ct_issue"] . '">' . $dynamic_company[$i]["ct_title"] . '</a></li>';
                }
                ?>

              </ul>
            </div>
            <div class="dynamic-industry">
              <div class="title">
                <a href="javascript:;">行业资讯</a>
              </div>
              <ul class="content-list">

                <?php
                $dynamic_industry = [array("st_path" => "javascript:;", "ct_issue" => "2020/03/25", "ct_title" => "行业资讯，标题01, 行业资讯行业资讯行业资讯"), array("st_path" => "javascript:;", "ct_issue" => "2020/03/25", "ct_title" => "行业资讯，标题02, 行业资讯行业资讯行业资讯"), array("st_path" => "javascript:;", "ct_issue" => "2020/03/25", "ct_title" => "行业资讯，标题03, 行业资讯行业资讯行业资讯"), array("st_path" => "javascript:;", "ct_issue" => "2020/03/25", "ct_title" => "行业资讯，标题04, 行业资讯行业资讯行业资讯")];

                for ($i = 0; $i < count($dynamic_industry); $i++) {
                  echo '<li class="list-item text-ellipsis"><a href="' . $dynamic_industry[$i]["st_path"] . '" data-issue="' . $dynamic_industry[$i]["ct_issue"] . '">' . $dynamic_industry[$i]["ct_title"] . '</a></li>';
                }
                ?>

              </ul>
            </div>
          </div>

        </section>
      </div> <!-- 综合资讯结束 #news end -->

      <div class="wrapper container-fluid" id="landmark">
        <ul class="clearfix">

          <?php
          $array_lankmark = [array("image"=>"/src/city-01.jpg", "links"=>"javascript:;", "province"=>"湖南", "counts"=>10), array("image"=>"/src/city-02.jpg", "links"=>"javascript:;", "province"=>"广东", "counts"=>10), array("image"=>"/src/city-03.jpg", "links"=>"javascript:;", "province"=>"江苏", "counts"=>10), array("image"=>"/src/city-04.jpg", "links"=>"javascript:;", "province"=>"上海", "counts"=>10), array("image"=>"/src/city-05.jpg", "links"=>"javascript:;", "province"=>"浙江", "counts"=>10), array("image"=>"/src/city-06.jpg", "links"=>"javascript:;", "province"=>"广东", "counts"=>10), array("image"=>"/src/city-01.jpg", "links"=>"javascript:;", "province"=>"北京", "counts"=>10), array("image"=>"/src/city-02.jpg", "links"=>"javascript:;", "province"=>"重庆", "counts"=>10)];
          for($i = 0; $i < count($array_lankmark); $i++) {
            echo '<li><img src="'.$array_lankmark[$i]["image"].'"><a href="'.$array_lankmark[$i]["links"].'" class="text"><p class="province">'.$array_lankmark[$i]["province"].'</p><p class="total">'.$array_lankmark[$i]["counts"].'</p></a></li>';
          }
          ?>
        </ul>

        <div class="arrow left">
          <span class="glyphicon glyphicon-menu-left"></span>
        </div>
        <div class="arrow right">
          <span class="glyphicon glyphicon-menu-right"></span>
        </div>
      </div>
    </div><!-- 网页内容区域结束 // #pageContent end -->

    <!-- 网页脚注区域开始 #pageFooter begin-->
    <div class="container-fluid wrapper" id="pageFooter">
      <div class="hidden-xs row inner footer">
        <ul class="col-xs-4 col-sm-4 col-md-4 col-lg-4 list-group footer-nav">
          <h2>网站导航</h2>
          <li class="list-group-item">
            <a href="/">
              <span class="glyphicon glyphicon-link"></span>首页
            </a>
          </li>
          <li class="list-group-item">
            <a href="/service">
              <span class="glyphicon glyphicon-link"></span>服务
            </a>
          </li>
          <li class="list-group-item">
            <a href="/case">
              <span class="glyphicon glyphicon-link"></span>案例
            </a>
          </li>
          <li class="list-group-item">
            <a href="/about">
              <span class="glyphicon glyphicon-link"></span>关于
            </a>
          </li>
        </ul>
        <ul class="col-xs-4 col-sm-4 col-md-4 col-lg-4 list-group footer-info">
          <h2>联系信息</h2>
          <li class="list-group-item">
            <span class="glyphicon glyphicon-envelope"></span>
            <span class="text"><?php echo $baseinfo["company"]["email"] ?></span>
          </li>
          <li class="list-group-item">
            <span class="glyphicon glyphicon-earphone"></span>
            <span class="text"><?php echo $baseinfo["company"]["mobile"] ?></span>
          </li>
          <li class="list-group-item">
            <span class="glyphicon glyphicon-globe"></span>
            <a href="<?php echo $baseinfo["site"]["domain"] ?>"><?php echo $baseinfo["site"]["domain"] ?></a>
          </li>
          <li class="list-group-item">
            <span class="glyphicon glyphicon-map-marker"></span>
            <span class="text"><?php echo $baseinfo["company"]["address"] ?></span>
          </li>
        </ul>
        <ul class="col-xs-4 col-sm-4 col-md-4 col-lg-4 list-group footer-links">
          <h2>友情链接</h2>
          <li class="list-group-item add-link"><a href="https://www.szwzny.com">洈洲农业发展有限公司</a></li>
          <li class="list-group-item add-link">互加友链,请添加QQ476000121</li>
        </ul>
      </div>
      <div class="row copyright">
        <span class="col-xs-12 col-sm-4">Copyright&nbsp;©&nbsp;2018&nbsp;&nbsp;<a href="<?php echo $baseinfo["site"]["domain"] ?>"><strong><?php echo $baseinfo["company"]["name"] ?></strong></a>&nbsp;&nbsp;All Rights Reserved</span>
        <span class="col-xs-12 col-sm-4">Powered by&nbsp;&nbsp;<a href="<?php echo $baseinfo["site"]["domain"] ?>"><strong><?php echo $baseinfo["company"]["name"] ?></strong></a></span>
        <span class="col-xs-12 col-sm-4"><a href="http://www.miitbeian.gov.cn/" class="text-muted"><img src="/src/ba.png" alt="湖南炉石空间设计ICP备案号图标"><?php echo $baseinfo["site"]["icp"] ?></a></span>
      </div>
    </div><!-- 网页脚注区域结束 // #pageFooter end -->
  </div>


  <!-- 右下角fixed侧边栏 -->
  <ul class="list-group fixed fixed-rb" id="asidebar_tools">
    <ul class="hidden-xs list-group <?php if (!$_SESSION["bFirst"]) {
                                      echo 'hidden';
                                    } ?>" id="asidebar">
      <li class="list-group-item" role="button" id="btn_aside_qq"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $baseinfo["company"]["qq"] ?>&site=qq&menu=yes"><span class="icon icon-cuz icon-qq"></a></span></li>
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
        <li role="button" class="btn btn-default"><a href="tel:<?php echo $baseinfo["company"]["mobile"] ?>"><span class="glyphicon glyphicon-phone"></span><span>致电</span></a></li>
      </ul>
    </div>
  </div><!-- // .bottom-nav-wrap end -->

  <script src="/cms/include/jquery/jquery.min.js"></script>
  <script src="/cms/include/bootstrap/js/bootstrap.min.js"></script>
  <script src="/lib/js/shared.js"></script>
  <script src="/lib/js/home.js"></script>
</body>

</html>