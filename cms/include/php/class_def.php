<?php
header("Content-type:text/html; charset:utf-8;");
date_default_timezone_set("Asia/Shanghai");

/**
 * 数据库管理类
 * 
 */
class DBManager {
  // 主机名
  public $hostname;
  // 数据库用户名
  public $username;
  // 数据库密码
  public $password;
  // 数据库名称
  public $dbname;
  // 数据表名
  public $tabname;
  // 获取分类详细信息的sql字符串
  public $sql_class;
  // 数据库连接字符串
  public $links;
  // 数据库操作的状态信息
  public $state;

  // 构造函数
  function __construct($hostname, $username, $password, $dbname, $tabname) {
    $this->hostname = $hostname;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;
    $this->tabname = $tabname;
    $this->sql_class = "SELECT * FROM tab_class WHERE tabname='".$tabname."'";
    $this->link = mysqli_connect($hostname, $username, $password, $dbname);
    $this->state = array("err_no"=>mysqli_connect_errno(), "err_code"=>mysqli_connect_error());
  }

  // 析构函数
  function __destruct() {
    $this->hostname = null;
    $this->username = null;
    $this->password = null;
    $this->dbname = null;
    $this->tabname = null;
    $this->sql_class = null;
    $this->state = null;
    !$this->links or $this->links->close();
  }

  /**
   * 执行SQL语句
   * @param string $sql:要执行SQL语句
   * @return mixed 执行完成后的结果
   */
  public function execute($sql) {
    $result = mysqli_query($this->link, $sql);
    $this->state = array("err_no"=>mysqli_errno($this->link), "err_code"=>mysqli_error($this->link));
    return $result;
  }

  /**
   * 添加数据项
   * @param mixed $data JSON格式的字符串数据
   * @return array 执行完成后的状态信息
   */
  public function addItem($data) {
    $dataArray = json_decode($data, true);
    $sql_h = "INSERT INTO " . $this->tabname . "(";
    $sql_b = ") VALUES(";
    $sql_t = ")";
    foreach($dataArray as $key => $value) {
      $sql_h .= $key;
      // $sql_b .= "'" . $this->formatData($value) . "'";
      
      $sql_b .= "'" . addslashes(is_array($value) ? json_encode($value, 320) : $value) . "'";
      if(end($dataArray) !== $value) {
        $sql_h .= ", ";
        $sql_b .= ", ";
      }
    }
    $sql = $sql_h . $sql_b . $sql_t;
    $this->execute($sql);
    $id = $this->selectItem()[0]["id"];

    // 格式化返回值
    if($this->state["err_no"]) {
      $ret = $this->state;
    }
    else {
      $ret = array("err_no" => $this->state["err_no"], "err_code" => $id);
    }
    return $ret;
  }

  /**
   * 删除数据项
   * @param int $id 删除项对应的id
   */
  public function deleteItem($id) {
    $sql = "DELETE FROM " . $this->tabname . " WHERE id=" . $id;
    $this->execute($sql);
    return $this->state;
  }

  /**
   * 更新数据项
   * @param int $id 更新项对应的id
   * @param string $data 更新项数据的JSON格式字符串
   * @return string $result 执行结果的JSON格式字符串
   */
  public function updateItem($id, $data) {
    // UPDATE table SET key1=value1, key2=value2, ..., keyN=valueN
    $sql_h = "UPDATE $this->tabname SET ";
    $sql_b = "";
    $sql_t = " WHERE id=$id";
    if(!$data) {
      return array("err_no" => -1, "err_code" => "修改的内容不能为空");
    }
    $dataArray = json_decode($data, true);
    foreach($dataArray as $key => $value) {
      $sql_b .= ($key . "='" . addslashes(is_array($value) ? json_encode($value, 320) : $value) . "'");
      if(end($dataArray) !== $value) {
        $sql_b .= ",";
      }
    }
    $sql = $sql_h . $sql_b . $sql_t;
    $this->execute($sql);

    // 格式化返回值
    if($this->state["err_no"]) {
      $ret = $this->state;
    }
    else {
      $ret = array("err_no" => $this->state["err_no"], "err_code" => $id);
    }
    return $ret;
  }
  
  /**
   * 查询数据项，并以数组形式返回记录集
   * @param string $rule  指定查询条件
   * @return array $result  查询结果
   */
  public function selectItem($rule = null) {
    $sql = "SELECT * FROM " . $this->tabname;
    if($rule) {
      $sql .= (" WHERE " . $rule);
    }
    $sql .= " ORDER BY id ASC";

    $result = $this->execute($sql);
    if($result) {
      if ($result->num_rows) {
        // 查询结果行数不为0，，将值格式化到数组中返回
        $ret = array();
        while ($tmp = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          array_unshift($ret, $tmp);
        }
      }
      else {
        // 查询结果行数为0，即没有查询到数据
        $ret = array("err_no" => 0, "err_code" => "记录集为0");
      }
    }
    else {
      // 查询语句有误
      $ret = $this->state;
    }
    return $ret;
  }

  /**
   * 获取记录集总数
   * @param string|null $rule 查询条件
   * @return int 记录集数量
   */
  public function getRecordCounts($rule = null) {
    $counts = 0;
    $result = $this->selectItem($rule);
    if(!isset($result["err_no"])) {
      $counts = count($result);
    }
    return $counts;
  }

  /**
   * 获取对应分类的详细信息，并以数组形式返回记录集
   * @return array $result  查询结果
   */
  public function getClassData() {
    $result = $this->execute($this->sql_class);
    if($result) {
      if ($result->num_rows) {
        // 查询结果行数不为0，，将值格式化到数组中返回
        $ret = array();
        while ($tmp = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          array_unshift($ret, $tmp);
        }
      }
      else {
        // 查询结果行数为0，即没有查询到数据
        $ret = array("err_no" => 0, "err_code" => "记录集为0");
      }
    }
    else {
      // 查询语句有误
      $ret = array("err_no" => 0, "err_code" => "请检查语法错误");
    }
    return $ret;
  }

  /**
   * 生成JSON文件
   */
  public function logJsonFile($id) {
    $clsArray = $this->getClassData()[0];
    $path = ROOT_PATH.$clsArray["jsonPath"];
    $ext = ".json";
    if(is_dir($path) or @mkdir($path, 0777, true)) {
      $result = file_put_contents($path.$id.$ext, json_encode($this->selectItem("id=$id")[0], 320));
    }
    return $result;
  }

  /**
   * 删除JSON文件
   */
  public function removeJsonFile($id) {
    $clsArray = $this->getClassData()[0];
    $path = ROOT_PATH.$clsArray["jsonPath"];
    $ext = ".json";
    @unlink($path.$id.$ext);
  }

  /**
   * 读取JSON文件内容
   */
  public function loadJsonFile($id) {
    $clsArray = $this->getClassData()[0];
    $path = ROOT_PATH.$clsArray["jsonPath"];
    $ext = ".json";
    return file_get_contents($path.$id.$ext);
  }

  /**
   * 生成HTML文件
   */
  public function logHtmlFile($id) {
    $clsArray = $this->getClassData()[0];
    $ext = ".html";
    $htmlPath = $clsArray["htmlPath"].$id.$ext;
    // 获取网站信息数据
    $siteinfo = json_decode(file_get_contents(ROOT_PATH.PATH_JSON."/siteinfo.json"), true);
    $url = "http://".$siteinfo["domain"].$clsArray["tempPath"];
    $str = curl_request($url, json_encode($this->selectItem("id=$id")[0], 320));
    file_put_contents(ROOT_PATH.$htmlPath, $str);
    $result = $this->updateItem($id, '{"b_posted": "T", "st_path": "'.$htmlPath.'"}');
    return $result;
  }

  /**
   * 删除HTML文件
   */
  public function removeHtmlFile($id) {
    $clsArray = $this->getClassData()[0];
    $path = ROOT_PATH.$clsArray["htmlPath"];
    @unlink($path.$id.".html");
  }
}

// /**
//  * 案例管理类
//  */
// class CaseManager {
//   public $dbo;
//   public $tab_name;
//   public $sql_query;

//   // 构造函数
//   function __construct($dbo, $tab_name) {
//     $this->dbo = $dbo;
//     $this->tab_name = $tab_name;
//     $this->sql_query = "SELECT * FROM " . $tab_name;
//   }

//   // 析构函数
//   function __destruct() {
//     $this->dbo = null;
//     $this->tab_name = null;
//     $this->sql_query = null;
//   }

//   /**
//    * 按条件查询表并按升序排序
//    */
//   public function queryTable($rule = null) {
//     $sql = $this->sql_query;
//     if($rule) {
//       $sql .= " WHERE $rule";
//     }
//     $sql .= " ORDER BY id ASC";
//     return $this->dbo->exec_query($sql);
//   }

//   /**
//    * 插入数据项
//    * @param $data: json格式数据
//   */
//   public function addItem($data) {
//     // 格式化上传图片字符串
//     $dataArray = json_decode($data, true);
//     $imageStr = $this->transferImageJson($dataArray["ct_image"]);
//     // 往数据库添加数据项
//     $sql_insert = "INSERT INTO ".$this->tab_name."(st_title, st_keywords, st_description, st_path, ct_title, ct_area, ct_address, ct_class, ct_team, ct_company, ct_description, ct_image, b_recommends, b_posted, b_end) VALUES('".$this->formatItem($dataArray["st_title"])."','".$this->formatItem($dataArray["st_keywords"])."','".$this->formatItem($dataArray["st_description"])."','".$this->formatItem($dataArray["st_path"])."','".$this->formatItem($dataArray["ct_title"])."', '".$this->formatItem($dataArray["ct_area"])."', '".$this->formatItem($dataArray["ct_address"])."', '".$this->formatItem($dataArray["ct_class"])."', '".$this->formatItem($dataArray["ct_team"])."', '".$this->formatItem($dataArray["ct_company"])."', '".$this->formatItem($dataArray["ct_description"])."', '".$imageStr."', 'F','F', 'TAB_END')";
//     $this->dbo->exec_insert($sql_insert);

//     $id = $this->queryTable()[0]["id"];
//     // 生成JSON文件
//     $path = ROOT_PATH.PATH_UPLOAD."/case/";
//     if(is_dir($path) or @mkdir($path, 0777, true)) {
//       file_put_contents($path."/$id.json", $this->transferJson("id=$id"));
//     }
    
//     if($this->dbo->state["err_no"]) {
//       $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$this->dbo->state["err_code"].'"}';
//     }
//     else {
//       $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$id.'"}';
//     }
//     return $ret;
//   }

//   /**
//    * 更新数据项
//    * @param   int $id 数据库对应的id
//    * @param   string $data JSON格式的数据字符串
//    * @return  string $ret JSON格式的结果字符串
//    */
//   public function updateItem($id, $data) {
//     // UPDATE table SET key1=value1, key2=value2, ..., keyN=valueN
//     $sql_update = "UPDATE $this->tab_name SET ";
//     if(!$data) {
//       $sql_update .= "st_path='/case/$id.html', b_posted='T'";
//     }
//     else {
//       $dataArray = json_decode($data, true);
//       // 格式化上传图片字符串
//       if(isset($dataArray["ct_image"])) {
//         $imageStr = $this->transferImageJson($dataArray["ct_image"]);
//       }
      
//       foreach($dataArray as $key=>$value) {
//         if($key !== "ct_image") {
//           $sql_update .= ($key."='".$this->formatItem($value)."'");
//         }
//         else {
//           $sql_update .= ($key."='".$imageStr."'");
//         }
//         if(end($dataArray) !== $value) {
//           $sql_update .= ",";
//         }
//         $sql_update .= " ";
//       }
//     }
//     $sql_update .= "WHERE id=$id";
//     $this->dbo->exec_update($sql_update);

//     // 同时更新JSON文件
//     $path = ROOT_PATH.PATH_UPLOAD."/case/";
//     if(is_dir($path) or @mkdir($path, 0777, true)) {
//       file_put_contents($path."/$id.json", $this->transferJson("id=$id"));
//     }
//     if($this->queryTable("id=$id")[0]["b_posted"] === "T") {
//       // 如果已发布则同时更新html文件
//       $siteinfo = json_decode(file_get_contents(ROOT_PATH.PATH_JSON."/siteinfo.json"), true);
//       $url = "http://".$siteinfo["domain"]."/template/case_temp.php";
//       $str = curl_request($url, $this->transferJson("id=$id"));
//       file_put_contents(ROOT_PATH."/case/$id.html", $str);
//     }

//     // 格式化返回值
//     if($this->dbo->state["err_no"]) {
//       $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$this->dbo->state["err_code"].'"}';
//     }
//     else {
//       $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$id.'"}';
//     }
//     return $ret;
//   }

//   /**
//    * 删除数据项
//    */
//   public function removeItem($id) {
//     $sql_remove = 'DELETE FROM '.$this->tab_name.' WHERE id='.$id;
//     $this->dbo->exec_delete($sql_remove);
//     $ret = '{"err_no": '.$this->dbo->state["err_no"].', "err_code": "'.$this->dbo->state["err_code"].'"}';
//     return $ret;
//   }

//   /**
//    * 将以数组形式保存的数据转换成JSON格式的字符串
//    * @param Array $dataArray: 数组形式的数据
//    * @return JSON $dataString: JSON格式的字符串
//    */
//   public function transferImageJson($dataArray) {
//     $dataString = '';
//     if($dataArray) {
//       $dataString .= '[';
//       foreach($dataArray as $item) {
//         $dataString .= '{"';
//         foreach($item as $key=>$value) {
//           $dataString .= $key;
//           $dataString .= '":"';
//           $dataString .= $value;
//           if($value !== end($item)) {
//             $dataString .= '","';
//           }
//         }
//         $dataString .= '"}';
  
//         if($item !== end($dataArray)) {
//           $dataString .= ',';
//         }
//       }
//       $dataString .= ']';
//     }
//     return $dataString;
//   }

//   /**
//    * 转换数据库记录为json字符串
//    */
//   public function transferJson($rule) {
//     if(!$rule) {
//       return '{"err_no": -1, "err_code": "转换参数不能为空！"}';
//     }
//     $result = $this->queryTable($rule)[0];
//     $json = '{';
//     foreach($result as $key=>$value) {
//       $ret = str_replace("\"", "\\\"", $value); //解决写入文件时引号导致JSON格式错误的问题
//       // $ret = str_replace("'", "\'", $ret);
//       if($key === "ct_image") {
//         if($value) {
//           $json .= ('"'.$key.'":'.$value);
//         }
//         else {
//           $json .= ('"'.$key.'":""');
//         }
//       }
//       else {
//         $json .= ('"'.$key.'":"'.$ret.'"');
//       }
//       if($value !== end($result)) {
//         $json .= ',';
//       }
//     }
//     $json .= '}';

//     return $json;
//   }

//   /**
//    * 获取记录集总数
//    * @return {number} $counts: 返回案例总数;
//    */
//   public function getCounts($rule = null) {
//     $counts = 0;
//     if($this->queryTable($rule)) {
//       $counts = count($this->queryTable($rule));
//     }
//     return $counts;
//   }

//   /**
//    * 格式化插入字段数据
//    */
//   public function formatItem($src) {
//     $src = str_replace("\"", "\\\"", $src);
//     $src = str_replace("'", "\'", $src);
//     $src = str_replace("\n", "", $src);
//     $src = str_replace("\t", "", $src);
//     return $src;
//   }
// }

// /**
//  * 文章管理类
//  */
// class ArticleManager {
//   public $dbo;
//   public $tab_name;
//   public $sql_query;

//   // 构造函数
//   function __construct($dbo, $tab_name) {
//     $this->dbo = $dbo;
//     $this->tab_name = $tab_name;
//     $this->sql_query = "SELECT * FROM " . $tab_name;
//     // $this->init();
//   }

//   // 析构函数
//   function __destruct() {
//     $this->dbo = null;
//     $this->tab_name = null;
//     $this->sql_query = null;
//   }

//   /**
//    * 按条件查询表并按升序排序
//    */
//   public function queryTable($rule = null) {
//     $sql = $this->sql_query;
//     if($rule) {
//       $sql .= " WHERE $rule";
//     }
//     $sql .= " ORDER BY id ASC";
//     return $this->dbo->exec_query($sql);
//   }

//   /**
//    * 初始化类
//    */
//   public function init() {
//     $sql_create = "CREATE TABLE `hs1design`.`tab_article` ( `id` INT(255) UNSIGNED NOT NULL, `st_title` VARCHAR(120) NOT NULL , `st_keywords` VARCHAR(120) NOT NULL , `st_description` VARCHAR(400) NOT NULL , `st_path` TEXT NOT NULL , `ct_title` VARCHAR(120) NOT NULL , `ct_author` VARCHAR(60) NOT NULL , `ct_class` VARCHAR(2) NOT NULL ,`ct_issue` VARCHAR(30) NOT NULL , `ct_content` LONGTEXT NOT NULL , `b_recommends` VARCHAR(1) NOT NULL , `b_posted` VARCHAR(1) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB";
//     // $sql_insert = "";
//     $this->dbo->exec_query($sql_create);
//   }

  
//   /**
//    * 转换数据库记录为json字符串
//    */
//   public function transferJson($rule) {
//     if(!$rule) {
//       return '{"err_no": -1, "err_code": "转换参数不能为空！"}';
//     }
//     $result = $this->queryTable($rule)[0];
//     $json = '{';
//     foreach($result as $key=>$value) {
//       $ret = str_replace("\"", "\\\"", $value); //解决写入文件时引号导致JSON格式错误的问题
//       // $ret = str_replace("'", "\'", $ret);
//       if($key === "ct_image") {
//         if($value) {
//           $json .= ('"'.$key.'":'.$value);
//         }
//         else {
//           $json .= ('"'.$key.'":""');
//         }
//       }
//       else {
//         $json .= ('"'.$key.'":"'.$ret.'"');
//       }
//       if($value !== end($result)) {
//         $json .= ',';
//       }
//     }
//     $json .= '}';

//     return $json;
//   }

//   /**
//    * 插入数据项
//    * @param $data: json格式数据
//   */
//   public function addItem($data) {
//     $dataArray = json_decode($data, true);
//     // 往数据库添加数据项
//     $sql_insert = "INSERT INTO ".$this->tab_name."(st_title, st_keywords, st_description, st_path, ct_title, ct_author, ct_class, ct_issue, ct_content, b_recommends, b_posted, b_end) VALUES('".$this->formatItem($dataArray["st_title"])."','".$this->formatItem($dataArray["st_keywords"])."','".$this->formatItem($dataArray["st_description"])."','".$this->formatItem($dataArray["st_path"])."','".$this->formatItem($dataArray["ct_title"])."', '".$this->formatItem($dataArray["ct_author"])."', '".$this->formatItem($dataArray["ct_class"])."', '".$this->formatItem($dataArray["ct_issue"])."', '".$this->formatItem($dataArray["ct_content"])."', 'F', 'F', 'TAB_END')";
//     $this->dbo->exec_insert($sql_insert);

//     $id = $this->queryTable()[0]["id"];
//     // 生成JSON文件
//     $path = ROOT_PATH.PATH_UPLOAD."/article/";
//     if(is_dir($path) or @mkdir($path, 0777, true)) {
//       file_put_contents($path."/$id.json", $this->transferJson("id=$id"));
//     }
    
//     if($this->dbo->state["err_no"]) {
//       $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$this->dbo->state["err_code"].'"}';
//     }
//     else {
//       $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$id.'"}';
//     }
//     return $ret;
//   }

//   /**
//    * 更新数据项
//    * @param   int $id 数据库对应的id
//    * @param   string $data JSON格式的数据字符串
//    * @return  string $ret JSON格式的结果字符串
//    */
//   public function updateItem($id, $data) {
//     // UPDATE table SET key1=value1, key2=value2, ..., keyN=valueN
//     $sql_update = "UPDATE $this->tab_name SET ";
//     if(!$data) {
//       //数据为空则仅发布项目
//       $sql_update .= "st_path='/article/$id.html', b_posted='T'";
//     }
//     else {
//       $dataArray = json_decode($data, true);
//       // 格式化上传图片字符串
//       if(isset($dataArray["ct_image"])) {
//         $imageStr = $this->transferImageJson($dataArray["ct_image"]);
//       }

//       foreach($dataArray as $key=>$value) {
//         if($key !== "ct_image") {
//           $sql_update .= ($key."='".$this->formatItem($value)."'");
//         }
//         else {
//           $sql_update .= ($key."='".$imageStr."'");
//         }
//         if(end($dataArray) !== $value) {
//           $sql_update .= ",";
//         }
//         $sql_update .= " ";
//       }
//     }
    
//     $sql_update .= "WHERE id=$id";
//     $this->dbo->exec_update($sql_update);

//     // 同时更新JSON文件
//     $path = ROOT_PATH.PATH_UPLOAD."/article/";
//     if(is_dir($path) or @mkdir($path, 0777, true)) {
//       file_put_contents($path."/$id.json", $this->transferJson("id=$id"));
//     }
//     if($this->queryTable("id=$id")[0]["b_posted"] === "T") {
//       // 如果已发布则同时更新html文件
//       $siteinfo = json_decode(file_get_contents(ROOT_PATH.PATH_JSON."/siteinfo.json"), true);
//       $url = "http://".$siteinfo["domain"]."/template/article_temp.php";
//       $str = curl_request($url, $this->transferJson("id=$id"));
//       file_put_contents(ROOT_PATH."/article/$id.html", $str);
//     }

//     // 格式化返回值
//     if($this->dbo->state["err_no"]) {
//       $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$this->dbo->state["err_code"].'"}';
//     }
//     else {
//       $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$id.'"}';
//     }
//     return $ret;
//   }

//   /**
//    * 删除数据项
//    */
//   public function removeItem($id) {
//     $sql_remove = 'DELETE FROM '.$this->tab_name.' WHERE id='.$id;
//     $this->dbo->exec_delete($sql_remove);
//     $ret = '{"err_no": '.$this->dbo->state["err_no"].', "err_code": "'.$this->dbo->state["err_code"].'"}';
//     return $ret;
//   }

//   /**
//    * 获取案例总数
//    * @return {number} $counts: 返回案例总数;
//    */
//   public function getCounts($rule = null) {
//     $counts = 0;
//     if($this->queryTable($rule)) {
//       $counts = count($this->queryTable($rule));
//     }
//     return $counts;
//   }

//   /**
//    * 格式化插入字段数据
//    */
//   public function formatItem($src) {
//     $src = str_replace("\"", "\\\"", $src);
//     $src = str_replace("'", "\'", $src);
//     $src = str_replace("\n", "", $src);
//     $src = str_replace("\t", "", $src);
//     return $src;
//   }
// }

// /**
//  * 数据库操作类
//  */
// class DBOperator {
// //    主机名
//   public $hostname;
// //    数据库用户名
//   public $username;
// //    数据库密码
//   public $password;
// //    数据库名称
//   public $dbname;
// //    数据库连接字符串
//   public $links;
// //    数据库操作的状态信息
//   public $state;

// //    构造函数
//   function __construct($hostname, $username, $password, $dbname) {
//     $this->hostname = $hostname;
//     $this->username = $username;
//     $this->password = $password;
//     $this->dbname = $dbname;
//     $this->links = mysqli_connect($hostname, $username, $password, $dbname);
//     $this->state = array("err_no"=>mysqli_connect_errno(), "err_code"=>mysqli_connect_error());
//   }

// //    析构函数
//   function __destruct() {
//     $this->hostname = null;
//     $this->username = null;
//     $this->password = null;
//     $this->dbname = null;
//     $this->state = null;
//     !$this->links or $this->links->close();
//   }

//   /**
//    * 数据库初始化，创建表tab_admin及添加管理员账号
//    * @param $sqlArray: 创建表tab_admin以及添加数据的SQL语句数组
//    * 
//    * $sqlArray = array("create_table"=>"CREATE TABLE tab_admin(uid VARCHAR(16) NOT NULL, username VARCHAR(16) NOT NULL, password VARCHAR(16) NOT NULL,access VARCHAR(1) NOT NULL, PRIMARY KEY(uid), UNIQUE(username)) ENGINE=InnoDB", "insert_admin"=>"INSERT INTO tab_admin(uid, username, password, access) VALUES('000000', 'admin', 'admin', '0')");
//    */
//   public function init($sqlArray) {
//     mysqli_query($this->links, $sqlArray["create_table"]);
//     mysqli_query($this->links, $sqlArray["insert_admin"]);
//     $this->state = array("err_no"=>mysqli_errno($this->links), "err_code"=>mysqli_error($this->links));
//   }

//   /**
//   * 执行MYSQL操作
//   * $sql: 要执行的SQL语句;
//   * $return: 将执行结果返回
//   */
//   public function execute($sql) {
//     $ret = mysqli_query($this->links, $sql);
//     $this->state = array("err_no"=>mysqli_errno($this->links), "err_code"=>mysqli_error($this->links));
//     return $ret;
//   }
//   /**
//   * 执行MYSQL查询操作
//   * @param $sql: 要执行的SQL语句;
//   * @returen $ret: 将执行结果以数组形式返回
//   */
//   public function exec_query($sql) {
//     $result = mysqli_query($this->links, $sql);
//     if($result) {
//       if ($result->num_rows) {
// //        查询结果行数不为0，，将值格式化到数组中返回
//         $ret = array();
//         while ($tmp = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
// //          $ret[] = $tmp;
//           array_unshift($ret, $tmp);
//         }
//       }
//       else {
// //          查询结果行数为0，即没有查询到数据
//         $ret = false;
//       }
//     }
//     else {
// //        查询语句有误
// //        通过检查mysqli_error($this->links)的返回值判断语句是否有误
// //        $ret = mysqli_error($this->links);
//       $ret = false;
//     }

// //      更新操作后状态信息
//     $this->state = array("err_no"=>mysqli_errno($this->links), "err_code"=>mysqli_error($this->links));
//     return $ret;
//   }

//   /**
//   * 执行MYSQL插入操作
//   * @param $sql: 要执行的SQL语句;
//   * @returen $ret: 将执行结果返回
//   * INSERT INTO table(key1, key2, ..., keyN) VALUES(value1, value2, ..., valueN)
//   */
//   public function exec_insert($sql) {
//     return $this->execute($sql);
//   }
//   /**
//   * 执行MYSQL修改操作
//   * @param $sql: 要执行的SQL语句;
//   * @returen $ret: 将执行结果返回
//   * UPDATE table SET key1=value1, key2=value2, ..., keyN=valueN
//   */
//   public function exec_update($sql) {
//     return $this->execute($sql);
//   }
//   /**
//   * 执行MYSQL删除操作
//   * @param $sql: 要执行的SQL语句;
//   * @returen $ret: 将执行结果返回
//   * DELETE FROM table WHERE key=value
//   */
//   public function exec_delete($sql) {
//     return $this->execute($sql);
//   }
// }
