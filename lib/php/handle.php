<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/lib/php/dboperator.php");
if (!isset($_SESSION["bFirst"]) || empty($_SESSION["bFirst"])) {
  $_SESSION["bFirst"] = false;
}

if (isset($_POST["token"]) && !empty($_POST["token"])) {
  // 首页巨幕按钮
  if("indexPage" === $_POST["token"]) {
    $_SESSION["bFirst"] = true;
    echo "#".$_POST["token"];
  }
  
  // 免费咨询按钮
  if("consult" === $_POST["token"]) {
    $type = $_POST["type"];
    $area = $_POST["area"];
    $phone = $_POST["phone"];
    /**
     * $err_no=0, success
    */
    $err_no = 0;
    $err_code = "您的资料已成功提交，稍后将会有客服人员联系您，请保证电话通畅。";
    $ret = '{"err_no":'.$err_no.', "err_code":"'.$err_code.'"}';
    echo json_encode($ret);
  }
}