<?php
session_start();
header("Content-type:text/html; charset:utf-8;");
date_default_timezone_set("Asia/Shanghai");
require_once($_SERVER["DOCUMENT_ROOT"]."/cms/include/php/class_def.php");
$dbo = new DBOperator("localhost", "hsd_admin", "hs1design.com", "hs1design");
$userManage = new UserManager($dbo, "tab_admin");
$caseManage = new CaseManager($dbo, "tab_case");
?>