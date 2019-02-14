<?php
session_start();
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"]);
require_once(ROOT_PATH."/cms/include/php/path_def.php");
require_once(ROOT_PATH."/cms/include/php/class_def.php");
$dbo = new DBOperator("localhost", "hsd_admin", "hs1design.com", "hs1design");
$userManage = new UserManager($dbo, "tab_admin");
$caseManage = new CaseManager($dbo, "tab_case");
?>