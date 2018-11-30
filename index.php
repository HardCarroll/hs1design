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
      <button class="btn btn-warning btn-lg btn-normal" data-loading-text="加载中..." autocomplete="off" id="btn_index">了解更多</button>
    </div>
  </div>
  <div id="indexPage">
    <!-- 导航栏 navbar-hsd begin -->
    <nav class="navbar navbar-default navbar-hsd">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar_hsd" aria-expanded="false">
            <span class="sr-only">炉石空间设计官方网站导航栏，专注于餐厅空间设计、酒店空间设计、KTV空间设计</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand text-hide" href="/index.php"><strong>炉石空间设计丨专注于餐厅空间设计、酒店空间设计、KTV空间设计</strong><img src="/src/HSD_BLACK.png" alt="炉石空间设计的LOGO图片"></a>
        </div>
        <div class="navbar-top pull-right hidden-xs">
          <section class="phone">
            <p>
              <span class="glyphicon glyphicon-phone-alt"></span>
              <span>全国服务热线</span>
            </p>
            <p>0731-86393210</p>
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
            <li><a href="#">首页</a></li>
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
    <div id="pageContent">
      <ul>
        <li>8801</li>
        <li>8802</li>
        <li>8803</li>
        <li>8804</li>
        <li>8805</li>
        <li>8806</li>
      </ul>
    </div><!-- // #pageContent end -->

    <!-- 网页脚注区域 #pageFooter begin-->
    <div id="pageFooter">
    </div><!-- // #pageFooter end -->
  </div>

  <ul style="background-color: pink;">
    <li>placeholder: 8001</li>
    <li>placeholder: 8002</li>
    <li>placeholder: 8003</li>
    <li>placeholder: 8004</li>
    <li>placeholder: 8005</li>
    <li>placeholder: 8006</li>
    <li>placeholder: 8007</li>
    <li>placeholder: 8008</li>
    <li>placeholder: 8009</li>
    <li>placeholder: 8010</li>
    <li>placeholder: 8011</li>
    <li>placeholder: 8012</li>
    <li>placeholder: 8013</li>
    <li>placeholder: 8014</li>
    <li>placeholder: 8015</li>
    <li>placeholder: 8016</li>
    <li>placeholder: 8017</li>
    <li>placeholder: 8018</li>
    <li>placeholder: 8019</li>
    <li>placeholder: 8020</li>
    <li>placeholder: 8021</li>
    <li>placeholder: 8022</li>
    <li>placeholder: 8023</li>
    <li>placeholder: 8024</li>
    <li>placeholder: 8025</li>
    <li>placeholder: 8026</li>
    <li>placeholder: 8027</li>
    <li>placeholder: 8028</li>
    <li>placeholder: 8029</li>
    <li>placeholder: 8030</li>
    <li>placeholder: 8031</li>
    <li>placeholder: 8032</li>
    <li>placeholder: 8033</li>
    <li>placeholder: 8034</li>
    <li>placeholder: 8035</li>
    <li>placeholder: 8036</li>
    <li>placeholder: 8037</li>
    <li>placeholder: 8038</li>
    <li>placeholder: 8039</li>
    <li>placeholder: 8040</li>
    <li>placeholder: 8041</li>
    <li>placeholder: 8042</li>
    <li>placeholder: 8043</li>
    <li>placeholder: 8044</li>
    <li>placeholder: 8045</li>
    <li>placeholder: 8046</li>
    <li>placeholder: 8047</li>
    <li>placeholder: 8048</li>
    <li>placeholder: 8049</li>
    <li>placeholder: 8050</li>
    <li>placeholder: 8051</li>
    <li>placeholder: 8052</li>
    <li>placeholder: 8053</li>
    <li>placeholder: 8054</li>
    <li>placeholder: 8055</li>
    <li>placeholder: 8056</li>
    <li>placeholder: 8057</li>
    <li>placeholder: 8058</li>
    <li>placeholder: 8059</li>
    <li>placeholder: 8060</li>
    <li>placeholder: 8061</li>
    <li>placeholder: 8062</li>
    <li>placeholder: 8063</li>
    <li>placeholder: 8064</li>
    <li>placeholder: 8065</li>
    <li>placeholder: 8066</li>
    <li>placeholder: 8067</li>
    <li>placeholder: 8068</li>
    <li>placeholder: 8069</li>
    <li>placeholder: 8070</li>
    <li>placeholder: 8071</li>
    <li>placeholder: 8072</li>
    <li>placeholder: 8073</li>
    <li>placeholder: 8074</li>
    <li>placeholder: 8075</li>
    <li>placeholder: 8076</li>
    <li>placeholder: 8077</li>
    <li>placeholder: 8078</li>
    <li>placeholder: 8079</li>
    <li>placeholder: 8080</li>
    <li>placeholder: 8081</li>
    <li>placeholder: 8082</li>
    <li>placeholder: 8083</li>
    <li>placeholder: 8084</li>
    <li>placeholder: 8085</li>
    <li>placeholder: 8086</li>
    <li>placeholder: 8087</li>
    <li>placeholder: 8088</li>
    <li>placeholder: 8089</li>
    <li>placeholder: 8090</li>
    <li>placeholder: 8091</li>
    <li>placeholder: 8092</li>
    <li>placeholder: 8093</li>
    <li>placeholder: 8094</li>
    <li>placeholder: 8095</li>
    <li>placeholder: 8096</li>
    <li>placeholder: 8097</li>
    <li>placeholder: 8098</li>
    <li>placeholder: 8099</li>
    <li>placeholder: 8100</li>
  </ul>

  <!-- 浮动侧边栏 -->
  <ul class="list-group fixed fixed-rb" id="asidebar">
    <li class="list-group-item" role="button" id="btn_aside_qq"><a href="http://wpa.qq.com/msgrd?v=3&uin=292610020&site=qq&menu=yes"><span class="glyphicon glyphicon-headphones"></a></span></li>
    <li class="list-group-item" role="button" id="btn_aside_tel"><span class="glyphicon glyphicon-earphone"></span></li>
    <li class="list-group-item" role="button" id="btn_aside_qrcode"><span class="glyphicon glyphicon-qrcode"></span></li>
    <li class="list-group-item hidden" role="button" id="btn_backtop"><span class="glyphicon glyphicon-arrow-up"></span></li>
  </ul>
    

  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="/lib/js/home.js"></script>
</body>
</html>