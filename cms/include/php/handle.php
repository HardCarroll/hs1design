<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/cms/include/php/include.php");

if (isset($_POST["token"]) && !empty($_POST["token"])) {
  switch ($_POST["token"]) {
    case "uploadFiles": // 上传文件
      echo proc_uploadFiles($_FILES["files"]);
      break;
    case "login": // 登录按钮点击处理过程
      echo proc_login($userManage, $_POST["data"]);
      break;
    case "logout":
      echo proc_logout();
      break;
    case "modifyPassword":
      echo proc_modifyPassword($userManage, $_POST["data"]);
      break;
    case "setSiteInfo": // 设置网站信息
      echo proc_setSiteInfo(ROOT_PATH.PATH_JSON, $_POST["siteInfo"]);
      break;
    case "getSiteInfo": // 获取网站信息
      echo proc_getSiteInfo(ROOT_PATH.PATH_JSON);
      break;
    case "refreshUploadCase":  // 刷新案例上传标签页
      echo proc_refreshUploadCase($_POST["id"] ? $_POST["id"]: 0);
      break;
    case "refreshTabContent":
      echo proc_refreshTabContent($_POST["id"] ? $_POST["id"]: 0);
      break;
    case "refreshTabList":  // 实时更新案例、文章列表
      if($_POST["handle"] === "case") {
        echo proc_refreshTabList($caseManage, json_decode($_POST["data"], true));
      }
      else if($_POST["handle"] === "article") {
        echo proc_refreshTabList($articleManage, json_decode($_POST["data"], true));
      }
      break;
    case "refreshRecommends": // 刷新推荐列表
      if($_POST["handle"] === "case") {
        echo proc_refreshRecommends($caseManage);
      }
      else if($_POST["handle"] === "article") {
        echo proc_refreshRecommends($articleManage);
      }
      break;
    case "refreshPagination": // 刷新分页列表
      if($_POST["handle"] === "case") {
        echo proc_refreshPagination($caseManage, $_POST["rule"]);
      }
      else if($_POST["handle"] === "article") {
        echo proc_refreshPagination($articleManage, $_POST["rule"]);
      }
      break;
    case "updateItem":  // 修改项
      if($_POST["handle"] === "case") {
        echo proc_updateItem($caseManage, $_POST["id"], $_POST["data"]);
      }
      else if($_POST["handle"] === "article") {
        echo proc_updateItem($articleManage, $_POST["id"], $_POST["data"]);
      }
      break;
    case "removeItem":  // 删除项
      if($_POST["handle"] === "case") {
        echo proc_removeItem($caseManage, $_POST["handle"], $_POST["id"]);
      }
      else if($_POST["handle"] === "article") {
        echo proc_removeItem($articleManage, $_POST["handle"], $_POST["id"]);
      }
      break;
    case "markItem":  //推荐项
      if($_POST["handle"] === "case") {
        echo proc_markItem($caseManage, $_POST["id"], $_POST["data"]);
      }
      else if($_POST["handle"] === "article") {
        echo proc_markItem($articleManage, $_POST["id"], $_POST["data"]);
      }
      break;
    case "getCounts": // 获取记录数
      if($_POST["handle"] === "case") {
        echo $caseManage->getCounts($_POST["rule"]);
      }
      else if($_POST["handle"] === "article") {
        echo $articleManage->getCounts($_POST["rule"]);
      }
      break;
    case "debug":
      echo pro_debug($_POST["data"]);
      break;
    default:
      break;
  }
}

function proc_refreshTabContent($id = null) {
  if($id) {
    return json_encode(file_get_contents(ROOT_PATH.PATH_UPLOAD."/article/$id.json"));
  }
  else {
    return proc_getSiteInfo(ROOT_PATH.PATH_JSON);
  }
}

/**
 * 修改项处理函数
 */
function proc_updateItem($hd, $id = null, $data = null) {
  if(!$id) {  // $id为空，则此时为新增数据项
    $ret = $hd->addItem($data);
  }
  else {  // $id不为空时，则为修改对应数据项
    $ret = $hd->updateItem($id, $data);
  }
  return json_encode($ret);
}

/**
 * 星标项处理函数
 * 先判断是否已发布，未发布则先发布此案例。
 */
function proc_markItem($hd, $id, $data) {
  if($hd->queryTable("id=".$id)[0]["b_posted"] === "F") {
    return json_encode('{"err_no": -1, "err_code": "当前案例暂未发布，请先发布此案例！"}');
  }
  $ret = $hd->updateItem($id, $data);
  return json_encode($ret);
}
/**
 * 删除项处理函数
 * 删除数据库记录，并同时删除json和html文件
 */
function proc_removeItem($hd, $dir, $id) {
  $htmlPath = ROOT_PATH."/$dir/$id.html";
  $jsonPath = ROOT_PATH.PATH_UPLOAD."/$dir/$id.json";
  @unlink($htmlPath);
  @unlink($jsonPath);
  return json_encode($hd->removeItem($id));
}

/**
 * 文件上传处理函数
 */
function proc_uploadFiles($files) {
  $ret = [];
  $path = PATH_UPLOAD."/image/".date("Ymd/");
  is_dir(ROOT_PATH.$path) or @mkdir(ROOT_PATH.$path, 0777, true);

  for($i = 0; $i < count($files["size"]); $i++) {
    if($files["size"][$i] <= 2*1024*1024 && ($files["type"][$i] == "image/png" || $files["type"][$i] == "image/jpeg" || $files["type"][$i] == "image/gif")) {
      $fn = date("His_").$files["name"][$i];
      move_uploaded_file($files["tmp_name"][$i], ROOT_PATH.$path.$fn);
      array_push($ret, '{"url": "'.($path.$fn).'", "attr_alt": "", "attr_title": ""}');
    }
    else {
      return json_encode('{"err_no": -1, "err_code": "请检查文件大小或类型！"}');
    }
  }
  return json_encode($ret);
}

/**
 * 更新上传案例标签页内容
 */
function proc_refreshUploadCase($id = null) {
  if($id) {
    return json_encode(file_get_contents(ROOT_PATH.PATH_UPLOAD."/case/$id.json"));
  }
  else {
    return proc_getSiteInfo(ROOT_PATH.PATH_JSON);
  }
}


/**
 * 实时生成案例/文章列表
 */
function proc_refreshTabList($hd, $data = null) {
  empty($data["page"]) ? $page = 1 : $page = $data["page"];
  if(isset($data["rule"])) {
    $result = $hd->queryTable($data["rule"]);
  }
  else {
    $result = $hd->queryTable();
  }
  
  $html = '';
  $counts = count($result);
  $cmp = $counts / ($page*10) >= 1 ? 10 : ($counts%10);

  if($hd->getCounts()) {
    $html = '<div class="panel-group" role="tablist" aria-multiselectable="true" id="panel-wrap">';
    for ($i = ($page-1)*10; $i < ($page-1)*10+$cmp; $i++) {
      if($result[$i]["b_posted"] === "T") {
        $html .= '<div class="panel panel-default">';
      }
      else {
        $html .= '<div class="panel panel-danger">';
      }
      $html .= '<div class="panel-heading" role="tab">';
      $html .= '<a class="collapsed" role="button" data-toggle="collapse" data-parent="#panel-wrap" href="#item_'.$result[$i]["id"].'">'.$result[$i]["ct_title"].'</a></div>';
      $html .= '<div id="item_'.$result[$i]["id"].'" class="panel-collapse collapse" role="tabpanel">';
      $html .= '<ul class="btn-group" data-id="'.$result[$i]["id"].'">';
      $html .= '<li role="button" data-token="mark" title="星标" class="btn btn-default glyphicon '.($result[$i]["b_recommends"]==="T" ? "glyphicon-star" : "glyphicon-star-empty").'"></li>';
      $html .= '<li role="button" href="#editTab" data-token="edit" title="编辑" class="btn btn-default glyphicon glyphicon-edit"></li>';
      $html .= '<li role="button" data-token="post" title="发布" class="btn btn-default glyphicon glyphicon-send"></li>';
      $html .= '<li role="button" data-token="remove" title="删除" class="btn btn-default glyphicon glyphicon-trash"></li>';
      $html .= '</ul></div></div>';
    }
    $html .= '</div>';
  }
  else {
    $html = "<p>没有相关项数据！</p>";
  }
  
  return $html;
}

/**
 * 实时更新推荐列表数据条目
 */
function proc_refreshRecommends($hd) {
  $recommends = $hd->queryTable("b_recommends='T'");
  if($hd->getCounts("b_recommends='T'")) {
    $ret = '';
    foreach($recommends as $recommends_item) {
      $ret .= '<div class="list-group-item text-info text-ellipsis"><a href="'.$recommends_item["st_path"].'">'.$recommends_item["ct_title"].'</a></div>';
    }
  }
  return $ret;
}

/**
 * 实时更新分页列表
 */
function proc_refreshPagination($hd_dbo, $rule = null) {
  $html = '';
  $cnt = $hd_dbo->getCounts($rule);
  if ($cnt/10>1) {
    $html .= '<ul class="pagination"><li class="disabled"><span aria-label="Previous"><span aria-hidden="true">&laquo;</span></span></li>';
    $html .= '<li class="active"><span>1</span></li>';
    
    for($i=1; $i<$cnt/10; $i++) {
      $html .= '<li><span>'.($i+1).'</span></li>';
    }
    $html .= '<li><span aria-label="Next"><span aria-hidden="true">&raquo;</span></span></li></ul>';
  }
  return $html;
}

/**
 * 设置网站信息
 */
function proc_setSiteInfo($path, $data) {
  if(is_dir($path) or @mkdir($path, 0777, true)) {
    file_put_contents($path."/siteinfo.json", $data);
    $_SESSION["siteInfo"] = ($data);
    $result = '{"err_no": 0, "err_code": "网站基本信息设置成功！"}';
  }
  else {
    $result = '{"err_no": -1, "err_code": "创建指定文件[ '.$path.' ]失败！"}';
  }
  return json_encode($result);
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
    $result = $_SESSION["siteInfo"] = file_get_contents($path."/siteinfo.json");
  }
  return json_encode($result, 320);
}

/**
 * 登录验证处理过程
 * @param $hd: 数据库连接句柄
 * @param $data: 来自客户端的数据数组
 * @return $ret: 处理结果，以json格式返回
 */
function proc_login($hd, $data) {
  $dataArray = json_decode($data, true);
  $id = $dataArray["id"];
  $pwd = $dataArray["pwd"];
  $ret = "";
  if(isset($_SESSION["user"]) && ($_SESSION["user"]["id"]===$id || $_SESSION["user"]["username"]===$id)) {
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
    $result = $hd->selectItem("username='$id' or id='$id'");

    if(!$result || $hd->state["err_no"]) {
      if (empty($hd->state["err_code"])) {
        // 没有结果集
        $_SESSION["state"] = sha1(-1);
        $ret = array("err_no" => $_SESSION["state"], "err_code" => "用户名或密码错误", "href" => "");
      }
      else {
        $ret = array("err_no" => $hd->state["err_no"], "err_code" => $hd->state["err_code"], "href" => "");
      }
    }

    $password = $result[0]["password"];
    
    if ($password === $pwd) {
    //  验证成功
      $user = array("id"=>$result[0]["id"], "username"=>$result[0]["username"], "password"=>sha1($result[0]["password"]), "access"=>$result[0]["access"]);
      $_SESSION["state"] = sha1(0);
      $_SESSION["user"] = $user;
      $ret = array("err_no" => $_SESSION["state"], "err_code" => "验证通过", "href" => "/cms/admin/index.php");
    }
    else {
      $_SESSION["state"] = sha1(-1);
      $ret = array("err_no" => $_SESSION["state"], "err_code" => "用户名或密码错误", "href" => "");
    }
  }

  return json_encode($ret, 320);
}

/**
 * 注销登录处理过程
 */
function proc_logout() {
  // 清除SESSION中存储的用户信息
  unset($_SESSION["user"]);
  // 清除SESSION中存储的登录状态值
  unset($_SESSION["state"]);
  // 格式化返回结果
  $ret = array("err_no" => 0, "err_code" => "您已成功注销，如需继续操作，请重新登录！", "href" => "/cms/admin/login.php");
  return json_encode($ret);
}

/**
 * 修改密码处理函数
 * @param DBManager $hd:数据库连接句柄
 * @param mixed $data:来自客户端的数据
 * @return string JSON格式的处理结果字符串
 */
function proc_modifyPassword($hd, $data) {
  $arrayData = json_decode($data, true);
  $pwd = $_SESSION["user"]["password"];
  $ret = '';
  if ($arrayData["newPwd1"]===$arrayData["newPwd2"]) {
    $newpwd = $arrayData["newPwd1"];
    if ($pwd === sha1($arrayData["oldPwd"])) {
      $result = $hd->updateItem($_SESSION["user"]["id"], '{"password": "'.$newpwd.'"}');
      if (!$result) {
        // 执行SQL语句失败
        $ret = '{"err_no": "'.$hd->state["err_no"].'", "err_code": "'.$hd->state["err_code"].'"}';
      }
      else {
        unset($_SESSION["state"]);
        unset($_SESSION["user"]);
        $ret = '{"err_no": 0, "err_code": "密码修改成功，请重新登录！"}';
      }
    }
    else {
      $ret = '{"err_no": -1, "err_code": "请输入正确的密码！"}';
    }
  }
  else {
    $ret = '{"err_no": -2, "err_code": "两次密码不同，请重新输入！"}';
  }

  return $ret;
}

/**
 * 调试函数
 */
function pro_debug($data) {
  $path = ROOT_PATH.PATH_UPLOAD."/case/";
  if(is_dir($path) or @mkdir($path, 0777, true)) {
    file_put_contents($path."/106.json", $data);
  }
  return json_encode('{"err_code": "test"}');
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
