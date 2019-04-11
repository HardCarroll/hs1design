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
// $arr = array("a"=>"hello", "b"=>"world");
// // print_r($arr);
// // if(!array_key_exists("c", $arr)) {
// //   $arr["c"] = "test";
// // }
// // print_r($arr);
// $str = "hello world";
// $test = '{"a": "hello", "b": "world", "c": [{"a1": "a1", "b1": "b1"}, {"a2": "a2", "b2": "b2"}]}';
// $ts = json_decode($test, true);
// // echo "\$ts['a'] = ".$ts["a"];
// var_dump($ts["a"]);
// echo "<br>";
// // echo "\$ts['b'] = ".$ts["b"];
// var_dump($ts["b"]);
// echo "<br>";
// // echo "\$ts['c'] = ".json_encode($ts["c"]);
// var_dump($ts["c"]);
// echo "<br>";
// var_dump(is_array($ts["c"]));
// echo "<br>";
// var_dump(is_string($ts["c"]));
// echo "<br>";
if(isset($_POST["token"])) {
  switch($_POST["token"]) {
    case "add":
      if(isset($_POST["data"])) {
        $result = $aaa->addItem($_POST["data"]);
        echo json_encode($result, 320);
      }
      break;
    case "select":
      // $result = $userManage->selectItem()[0];
      $result = $bbb->deleteItem(13);
      echo json_encode($result, 320);
      break;
    case "update":
      // $result = $userManage->selectItem()[0];
      $result = $userManage->updateItem(666666, $_POST["data"]);
      echo json_encode($result, 320);
      break;
    case "debug":
      // $result = $userManage->selectItem("id=22")[0];
      // file_put_contents(ROOT_PATH.PATH_UPLOAD."/debug.json", json_encode($result, 320));
      // // $str = curl_request("http://192.168.0.216:8888/template/case_temp.php", json_encode($result, 320));
      // // file_put_contents(ROOT_PATH."/case/debug.html", $str);
      // echo json_encode($result, 320);
      // $result = $bbb->updateItem(22, json_encode($aaa->selectItem()[0], 320));
      $result = $classManage->addItem($_POST["data"]);
      echo json_encode($result, 320);
      break;
  }
}

/**
* curl请求
* @param string $url：发送请求的地址
* @param mixed|null $post：请求post的数据
* @return mixed $data：请求返回的结果
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