<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/cms/include/php/include.php");

if (isset($_POST["token"]) && !empty($_POST["token"])) {
  switch ($_POST["token"]) {
    case "login": // 登录按钮点击处理过程
      echo proc_login($dbo, json_decode($_POST["data"], true));
      break;
    case "setSiteInfo": // 设置网站信息
      echo proc_setSiteInfo(ROOT_PATH.PATH_JSON, $_POST["siteInfo"]);
      break;
    case "getSiteInfo": // 获取网站信息
      echo proc_getSiteInfo(ROOT_PATH.PATH_JSON);
      break;
    case "refreshUploadCase":  // 刷新案例上传标签页
      echo proc_refreshUploadCase($_POST["cid"] ? $_POST["cid"]: 0);
      break;
    case "refreshCaseList": // 刷新案例列表
      echo proc_refreshCaseList($caseManage, json_decode($_POST["data"], true));
      break;
    case "refreshArticleList": // 刷新案例列表
      echo proc_refreshArticleList($articleManage, json_decode($_POST["data"], true));
      break;
    case "refreshRecommends": // 刷新推荐列表
      echo proc_refreshRecommends($caseManage);
      break;
    case "refreshPagination": // 刷新分页列表
      echo proc_refreshPagination($caseManage, $_POST["rule"]);
      break;
    case "refreshPagination_Article": // 刷新分页列表
      echo proc_refreshPagination($articleManage, $_POST["rule"]);
      break;
    case "updateCase":  // 上传案例
      echo proc_updateCase($caseManage, $_POST["id"], $_POST["data"]);
      break;
    case "removeItem":  // 删除案例
      if($_POST["handle"] === "case") {
        echo proc_removeItem($caseManage, $_POST["handle"], $_POST["id"]);
      }
      else if($_POST["handle"] === "article") {
        echo proc_removeItem($articleManage, $_POST["handle"], $_POST["id"]);
      }
      break;
    case "postCase":  // 发布案例
      echo json_encode($caseManage->postItem($_POST["id"]));
      break;
    case "markItem":  //推荐条目
      if($_POST["handle"] === "case") {
        echo proc_markItem($caseManage, $_POST["id"], $_POST["data"]);
      }
      else if($_POST["handle"] === "article") {
        echo proc_markItem($articleManage, $_POST["id"], $_POST["data"]);
      }
      break;
    case "getCounts": // 获取记录数
      echo $caseManage->getCounts($_POST["rule"]);
      break;
    case "getArticleCounts": // 获取记录数
      echo $articleManage->getCounts($_POST["rule"]);
      break;
    case "uploadFiles": // 上传文件
      echo proc_uploadFiles($_FILES["files"]);
      break;
    case "updateArticle":
      echo proc_updateArticle($articleManage, $_POST["id"], $_POST["data"]);
      break;
    case "refreshTabContent":
      echo proc_refreshTabContent($_POST["aid"] ? $_POST["aid"]: 0);
      break;
    case "debug":
      echo pro_debug($_POST["data"]);
      break;
    default:
      break;
  }
}

/**
 * 文章上传处理函数
 */
function proc_updateArticle($articleManage, $id = null, $data = null) {
  if(!$id) {
    $ret = $articleManage->addItem($data);
  }
  return json_encode($ret);
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
 * 案例上传处理函数
 */
function proc_updateCase($caseManage, $id = null, $data = null) {
  if(!$id) {  // $id为空，则此时为新增数据项
    $ret = $caseManage->addItem($data);
  }
  else {  // $id不为空，则此时为修改对应的数据项内容
    if(!$data) { // 数据为空时为仅发布
      $ret = $caseManage->updateItem($id, '{"st_path": "/case/'.$id.'.html", "b_posted": "T"}');
      if(!$caseManage->dbo->state["err_no"]) {
        $ret = '{"err_no": 0, "err_code": "案例已成功发布"}';
      }
    }
    else {  // 数据不为空时为修改并发布
      $ret = $caseManage->updateItem($id, $data);
    }
  }
  return json_encode($ret);
}

/**
 * 星标案例处理函数
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
 * 删除案例处理函数
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
 * 实时生成案例列表
 */
function proc_refreshCaseList($caseManage, $data = null) {
  empty($data["page"]) ? $page = 1 : $page = $data["page"];
  if(isset($data["rule"])) {
    $result = $caseManage->queryTable($data["rule"]);
  }
  else {
    $result = $caseManage->queryTable();
  }
  $counts = count($result);
  $cmp = $counts / ($page*10) >= 1 ? 10 : ($counts%10);

  $html = '';
  if($caseManage->getCounts()) {
    $html = '<div class="panel-group" role="tablist" aria-multiselectable="true">';
    for ($i = ($page-1)*10; $i < ($page-1)*10+$cmp; $i++) {
      if($result[$i]["b_posted"] === "T") {
        $html .= '<div class="panel panel-default">';
      }
      else {
        $html .= '<div class="panel panel-danger">';
      }
      $html .= '<div class="panel-heading" role="tab">';
      $html .= '<a class="collapsed" role="button" data-toggle="collapse" href="#case_'.$result[$i]["id"].'">'.$result[$i]["ct_title"].'</a></div>';
      $html .= '<div id="case_'.$result[$i]["id"].'" class="panel-collapse collapse" role="tabpanel">';
      $html .= '<ul class="btn-group" data-id="'.$result[$i]["id"].'">';
      $html .= '<li role="button" data-token="mark" title="星标" class="btn btn-default glyphicon '.($result[$i]["b_recommends"]==="T" ? "glyphicon-star" : "glyphicon-star-empty").'"></li>';
      $html .= '<li role="button" href="#editCase" data-token="edit" title="编辑" class="btn btn-default glyphicon glyphicon-edit"></li>';
      $html .= '<li role="button" data-token="post" title="发布" class="btn btn-default glyphicon glyphicon-send"></li>';
      $html .= '<li role="button" data-token="remove" title="删除" class="btn btn-default glyphicon glyphicon-trash"></li>';
      $html .= '</ul></div></div>';
    }
    $html .= '</div>';
  }
  
  return $html;
}

/**
 * 实时生成文章列表
 */
function proc_refreshArticleList($articleManage, $data = null) {
  empty($data["page"]) ? $page = 1 : $page = $data["page"];
  if(isset($data["rule"])) {
    $result = $articleManage->queryTable($data["rule"]);
  }
  else {
    $result = $articleManage->queryTable();
  }
  $counts = count($result);
  $cmp = $counts / ($page*10) >= 1 ? 10 : ($counts%10);

  $html = '';
  if($articleManage->getCounts()) {
    $html = '<div class="panel-group" role="tablist" aria-multiselectable="true">';
    for ($i = ($page-1)*10; $i < ($page-1)*10+$cmp; $i++) {
      if($result[$i]["b_posted"] === "T") {
        $html .= '<div class="panel panel-default">';
      }
      else {
        $html .= '<div class="panel panel-danger">';
      }
      $html .= '<div class="panel-heading" role="tab">';
      $html .= '<a class="collapsed" role="button" data-toggle="collapse" href="#article_'.$result[$i]["id"].'">'.$result[$i]["ct_title"].'</a></div>';
      $html .= '<div id="article_'.$result[$i]["id"].'" class="panel-collapse collapse" role="tabpanel">';
      $html .= '<ul class="btn-group" data-id="'.$result[$i]["id"].'">';
      $html .= '<li role="button" data-token="mark" title="星标" class="btn btn-default glyphicon '.($result[$i]["b_recommends"]==="T" ? "glyphicon-star" : "glyphicon-star-empty").'"></li>';
      $html .= '<li role="button" href="#editArticle" data-token="edit" title="编辑" class="btn btn-default glyphicon glyphicon-edit"></li>';
      $html .= '<li role="button" data-token="post" title="发布" class="btn btn-default glyphicon glyphicon-send"></li>';
      $html .= '<li role="button" data-token="remove" title="删除" class="btn btn-default glyphicon glyphicon-trash"></li>';
      $html .= '</ul></div></div>';
    }
    $html .= '</div>';
  }
  
  return $html;
}

/**
 * 实时更新推荐列表数据条目
 */
function proc_refreshRecommends($caseManage) {
  $recommends = $caseManage->queryTable("b_recommends='T'");
  if($caseManage->getCounts("b_recommends='T'")) {
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
  return json_encode($result);
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
