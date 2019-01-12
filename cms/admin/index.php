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
  <link rel="stylesheet" href="/cms/include/css/cms.css">
  <title>内容管理系统</title>
</head>
<body>
  <div id="aside-nav">
    <div class="nav-list">
      <div class="list-item">1</div>
      <div class="list-item">2</div>
      <div class="list-item">3</div>
      <div class="list-item">4</div>
      <div class="list-item">5</div>
      <div class="list-item">6</div>
      <div class="list-item">7</div>
      <div class="list-item">8</div>
      <div class="list-item">9</div>
      <div class="list-item">10</div>
      <div class="list-item">11</div>
      <div class="list-item">12</div>
      <div class="list-item">13</div>
      <div class="list-item">14</div>
      <div class="list-item">15</div>
      <div class="list-item">16</div>
      <div class="list-item">17</div>
      <div class="list-item">18</div>
      <div class="list-item">19</div>
      <div class="list-item">20</div>
      <div class="list-item">21</div>
      <div class="list-item">22</div>
      <div class="list-item">23</div>
      <div class="list-item">24</div>
      <div class="list-item">25</div>
      <div class="list-item">26</div>
      <div class="list-item">27</div>
      <div class="list-item">28</div>
      <div class="list-item">29</div>
      <div class="list-item">30</div>
    </div>
  </div>
  <div id="pageWrap">
    2
  </div>

  <script type="text/javascript" src="/cms/include/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/cms/include/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/cms/include/js/cms.js"></script>
</body>
</html>