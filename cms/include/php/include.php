<?php
session_start();
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"]);
require_once(ROOT_PATH."/cms/include/php/path_def.php");
require_once(ROOT_PATH."/cms/include/php/class_def.php");
$dbo = new DBOperator("localhost", "hsd_admin", "hs1design.com", "hs1design");
$userManage = new UserManager("localhost", "hsd_admin", "hs1design.com", "hs1design", "tab_case");
$caseManage = new CaseManager($dbo, "tab_case");
$articleManage = new ArticleManager($dbo, "tab_article");
$aaa = new UserManager("localhost", "hsd_admin", "hs1design.com", "hs1design", "tab_admin");
$bbb = new UserManager("localhost", "hsd_admin", "hs1design.com", "hs1design", "tab_article");
$classManage = new UserManager("localhost", "hsd_admin", "hs1design.com", "hs1design", "tab_class");
?>