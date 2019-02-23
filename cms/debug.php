<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/cms/include/php/include.php");
// echo phpinfo();

// var_dump($userManage->queryTable());
// echo "<hr>";
// var_dump($userManage->getCounts());
// echo "<hr>";
// var_dump($caseManage->queryTable());
// echo "<hr>";
// var_dump($caseManage->dbo);
// echo "<hr>";
// var_dump($caseManage->getCounts());

// // php模板通过curl请求生成html文件
// $url = "https://www.webserv.cn/template/case_temp.php";
// $data = '{"token": "test", "key": "中文测试"}';
// $data = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/lib/json/case_temp.json");
// $str = curl_request($url, $data);
// // $str = curl_request($url);
// $result = file_put_contents($_SERVER["DOCUMENT_ROOT"]."/cms/upload/save.html", $str);
// var_dump($result);

// // 数据库初始化
// // 创建管理员表及管理员账号
// require_once($_SERVER["DOCUMENT_ROOT"]."/cms/include/php/dboperator.php");
// $dbo = new DBOperator("localhost", "hsd_admin", "hs1design.com", "hs1design");
// $sqlArray = array("create_table"=>"CREATE TABLE tab_admin(uid VARCHAR(11) NOT NULL, username VARCHAR(16) NOT NULL, password VARCHAR(16) NOT NULL, access VARCHAR(1) NOT NULL, PRIMARY KEY(uid), UNIQUE(username)) ENGINE=InnoDB", "insert_admin"=>"INSERT INTO tab_admin(uid, username, password, access) VALUES('000000', 'admin', 'admin', '0')");
// $dbo->init($sqlArray);
// var_dump($dbo);
$arr = array("a"=>"hello", "b"=>"world");
print_r($arr);
if(!array_key_exists("c", $arr)) {
  $arr["c"] = "test";
}
print_r($arr);

/**
* curl请求
* @param $url：发送请求的地址
* @param $post：请求post的数据
* @return $output：请求返回的结果
*/
function curl_request($url, $post = null) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
  if (!empty($post)){
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
  }
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $data = curl_exec($curl);
  curl_close($curl);
  return $data;
}
?>