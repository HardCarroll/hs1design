<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/lib/php/dboperator.php");
if (!isset($_SESSION["bFirst"]) || empty($_SESSION["bFirst"])) {
  $_SESSION["bFirst"] = false;
}

if (isset($_POST["token"]) && !empty($_POST["token"])) {
  if("indexPage" === $_POST["token"]) {
    $_SESSION["bFirst"] = true;
    echo "#".$_POST["token"];
  }
  if("consult" === $_POST["token"]) {
    $type = $_POST["type"];
    $area = $_POST["area"];
    $phone = $_POST["phone"];
    if("canteen" === $type) {
      $ret = '{"err_code": "ok"}';
    }
    else {
      $ret = '{"type": "'.$type.'", "area": "'.$area.'", "phone": "'.$phone.'"}';
    }
    echo json_encode($ret);
  }
}