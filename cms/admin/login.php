<?php
session_start();
if (isset($_GET["uid"]) && !empty($_GET["uid"])) {
  $uid = $_GET["uid"];
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>后台内容管理系统</title>
<link rel="stylesheet" href="/cms/common/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/cms/common/css/icons.css">
<link rel="stylesheet" href="/cms/common/css/login.css">
</head>

<body>
  <section class="form-wrapper">
    <div class="form-group">
      <span class="form-title">欢迎使用</span>
    </div>
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon" for="login-user"><span class="icon icon-cuz icon-user"></span></span>
        <input type="text" class="form-control" id="login-user" required autofocus>
      </div>
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
    </div>
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon"><span class="icon icon-cuz icon-key"></span></span>
        <input type="password" class="form-control" id="login-password" required>
      </div>
      <span class="glyphicon glyphicon-remove form-control-feedback"></span>
    </div>
    <div class="form-group">
      <label class="check-remember"><input type="checkbox"><span>记住十天</span></label>
    </div>
  </section>
</body>
</html>