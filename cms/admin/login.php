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
  <form class="form-wrapper">
    <div class="form-group">
      <span class="form-title">欢迎使用</span>
    </div>
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon icon icon-cuz icon-user"></span>
        <input type="text" name="uid" class="form-control" id="in_account" required autofocus value="<?php echo isset($uid) ? $uid : ''; ?>">
        <span class="glyphicon glyphicon-remove empty-value hidden"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon icon icon-cuz icon-key"></span>
        <input type="password" name="pwd" class="form-control" id="in_password" required>
        <span class="glyphicon glyphicon-remove empty-value hidden"></span>
      </div>
    </div>
    <div class="form-group">
      <span id="out_message"></span>
      <input type="submit" data-loading-text="登录中..." autocomplete="off" class="btn btn-primary btn-login" value="登录">
    </div>
  </form>

  <script src="/cms/common/jquery/jquery.min.js"></script>
  <script src="/cms/common/bootstrap/js/bootstrap.min.js"></script>
  <script src="/cms/common/js/login.js"></script>
</body>
</html>