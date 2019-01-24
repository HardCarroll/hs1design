<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/cms/include/php/include.php");

if (isset($_POST["token"]) && !empty($_POST["token"])) {
  switch ($_POST["token"]) {
    case "login":
      // 登录按钮点击处理过程
      echo proc_login($dbo, json_decode($_POST["data"], true));
      break;
    case "setSiteInfo":
      echo proc_setSiteInfo($_SERVER["DOCUMENT_ROOT"]."/cms/include/json", $_POST["siteInfo"]);
      break;
    case "getSiteInfo":
      echo proc_getSiteInfo($_SERVER["DOCUMENT_ROOT"]."/cms/include/json");
      break;
    case "refreshUploadTab":
      echo proc_refreshUploadTab();
      break;
    case "refreshCaseList":
      echo proc_refreshCaseList($caseManage);
      break;
    default:
      break;
  }
}

/**
 * 更新上传案例标签页内容
 */
function proc_refreshUploadTab() {
  return proc_getSiteInfo($_SERVER["DOCUMENT"]."/cms/include/json");
}

/**
 * 生成案例列表
 */
function proc_refreshCaseList($caseManage, $rule = null) {
  // <div class="panel panel-default">
  //   <div class="panel-heading" role="tab">
  //     <a class="collapsed" role="button" data-toggle="collapse" href="#case_2">
  //       案例02标题文字
  //     </a>
  //   </div>
  //   <div id="case_2" class="panel-collapse collapse" role="tabpanel">
  //     <ul class="btn-group">
  //       <li role="button" title="星标" class="btn btn-default glyphicon glyphicon-star-empty"></li>
  //       <li role="button" title="编辑" class="btn btn-default glyphicon glyphicon-edit"></li>
  //       <li role="button" title="发布" class="btn btn-default glyphicon glyphicon-send"></li>
  //       <li role="button" title="删除" class="btn btn-default glyphicon glyphicon-trash"></li>
  //     </ul>
  //   </div>
  // </div>
  $page = 1;
  $result = $caseManage->queryTable($rule);
  $counts = count($result);
  $cmp = $counts / ($page*10) >= 1 ? 10 : ($counts%10);
  $html = '';
  for ($i = ($page-1)*10; $i < ($page-1)*10+$cmp; $i++) {
    if($result[$i]["c_recommends"]) {
      $html .= '<div class="panel panel-default">';
    }
    else {
      $html .= '<div class="panel panel-success">';
    }
    $html .= '<div class="panel-heading" role="tab">';
    $html .= '<a class="collapsed" role="button" data-toggle="collapse" href="#case_'.$result[$i]["id"].'">'.$result[$i]["c_title"].'</a></div>';
    $html .= '<div id="case_'.$result[$i]["id"].'" class="panel-collapse collapse" role="tabpanel">';
    $html .= '<ul class="btn-group" data-id="'.$result[$i]["id"].'"><li role="button" data-token="mark" title="星标" class="btn btn-default glyphicon glyphicon-star-empty"></li><li role="button" data-token="edit" title="编辑" class="btn btn-default glyphicon glyphicon-edit"></li><li role="button" data-token="post" title="发布" class="btn btn-default glyphicon glyphicon-send"></li><li role="button" data-token="remove" title="删除" class="btn btn-default glyphicon glyphicon-trash"></li></ul></div></div>';
  }
  return $html;
}

/**
 * 设置网站信息
 */
function proc_setSiteInfo($path, $data) {
  if(is_dir($path) or @mkdir($path)) {
    file_put_contents($path."/siteinfo.json", $data);
    $_SESSION["siteInfo"] = json_encode($data);
    $result = "网站基本信息设置成功！";
  }
  else {
    $result = "创建指定文件[$path]失败！";
  }
  return $result;
}
/**
 * 获取网站信息
 */
function proc_getSiteInfo($path) {
  $result = "";
  if(isset($_SESSION["siteInfo"]) && !empty($_SESSION["siteInfo"])) {
    $result = $_SESSION["siteInfo"];
  }
  else {
    $result = $_SESSION["siteInfo"] = json_encode(file_get_contents($path."/siteinfo.json"));
  }
  return $result;
}

/**
 * 登录验证处理过程
 * @param $dbo: 数据库连接句柄
 * @param $data: 来自客户端的数据数组
 * @return $ret: 处理结果，以json格式返回
 */
function proc_login($dbo, $data) {
  $uid = $data["uid"];
  $pwd = $data["pwd"];
  $ret = "";
  if(isset($_SESSION["user"]) && ($_SESSION["user"]["uid"]===$uid || $_SESSION["user"]["username"]===$uid)) {
    // 有session，则进行session验证
    if ($_SESSION["user"]["password"] === sha1($pwd)) {
      // session验证通过
      $_SESSION["state"] = sha1(0);
      $ret = array("err_no" => $_SESSION["state"], "err_code" => "验证通过", "href" => "/cms/admin/index.php");
    }
    else {
      // session验证失败
      $_SESSION["state"] = sha1(-1);
      $ret = array("err_no" => $_SESSION["state"], "err_code" => "用户名或密码错误", "href" => "");
    }
  }
  else {
    // $dbo = new DBOperator("localhost", "hsd_admin", "hs1design.com", "hs1design");
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
        $_SESSION["state"] = sha1(-1);
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
      $_SESSION["state"] = sha1(0);
      $_SESSION["user"] = $user;
      $ret = array("err_no" => $_SESSION["state"], "err_code" => "验证通过", "href" => "/cms/admin/index.php");
    }
    else {
      $_SESSION["state"] = sha1(-1);
      $ret = array("err_no" => $_SESSION["state"], "err_code" => "用户名或密码错误", "href" => "");
    }
  }

  return json_encode($ret);
}
