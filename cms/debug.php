<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/cms/include/php/include.php");

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

// 功能调试
if (isset($_POST["token"]) && !empty($_POST["token"])) {
  switch ($_POST["token"]) {
    case "login":
      // 登录按钮点击处理过程调试
      // echo $data = $_POST["data"];
      echo proc_login(json_decode($_POST["data"], true));
      break;
    case "uploadFile":
      move_uploaded_file($_FILES["files"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"]."/cms/upload/".$_FILES["files"]["name"]);
      echo "/cms/upload/".$_FILES["files"]["name"];
      break;
    default:
      break;
  }
}


/**
 * 登录验证处理过程
 * @param $data: 来自客户端的数据数组
 * @return $ret: 处理结果，以json格式返回
 */
function proc_login($data) {
  $uid = $data["uid"];
  $pwd = $data["pwd"];
  $ret = "";
  if(isset($_SESSION["user"]) && ($_SESSION["user"]["uid"]===$uid || $_SESSION["user"]["username"]===$uid)) {
    // 有session，则进行session验证
    if ($_SESSION["user"]["password"] === sha1($pwd)) {
      // session验证通过
      $_SESSION["state"] = 0;
      $ret = array("err_no" => $_SESSION["state"], "err_code" => "验证通过", "href" => "/cms/admin/index.php");
    }
    else {
      // session验证失败
      $_SESSION["state"] = -1;
      $ret = array("err_no" => $_SESSION["state"], "err_code" => "用户名或密码错误", "href" => "");
    }
  }
  else {
    $dbo = new DBOperator("localhost", "hsd_admin", "hs1design.com", "hs1design");
    if ($dbo->state["err_no"]) {
      // 数据库连接失败跳转至登录界面
      $_SESSION["state"] = $dbo->state["err_no"];
      $ret = array("err_no" => $_SESSION["state"], "err_code" => $dbo->state["err_code"], "href" => "");
    }
    $sql = "SELECT * FROM tab_admin WHERE username='$uid' or uid='$uid'";
    $result = $dbo->exec_query($sql);
    if(!$result || $dbo->state["err_no"]) {
      if (empty($dbo->state["err_code"])) {
        // 没有结果集
        $_SESSION["state"] = -1;
        $ret = array("err_no" => $_SESSION["state"], "err_code" => "用户名或密码错误", "href" => "");
      }
      else {
        $ret = array("err_no" => $dbo->state["err_no"], "err_code" => $dbo->state["err_code"], "href" => "");
      }
    }
    $password = $result[0]["password"];
    if ($password === $pwd) {
    //  验证成功
      $user = array("uid"=>$result[0]["uid"], "username"=>$result[0]["username"], "password"=>sha1($result[0]["password"]), "access"=>$result[0]["access"]);
      $_SESSION["state"] = 0;
      $_SESSION["user"] = $user;
      $ret = array("err_no" => $_SESSION["state"], "err_code" => "验证通过", "href" => "/cms/admin/index.php");
    }
    else {
      $_SESSION["state"] = -1;
      $ret = array("err_no" => $_SESSION["state"], "err_code" => "用户名或密码错误", "href" => "");
    }
  }

  return json_encode($ret);
}

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