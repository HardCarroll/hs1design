<?php
header("Content-type:text/html; charset:utf-8;");
date_default_timezone_set("Asia/Shanghai");

/**
 * 用户管理类
 * 
 */
class UserManager {
  public $dbo;
  public $tab_name;
  public $sql_query;

  // 构造函数
  function __construct($dbo, $tab_name) {
    $this->dbo = $dbo;
    $this->tab_name = $tab_name;
    $this->sql_query = "SELECT * FROM " . $tab_name;
  }

  // 析构函数
  function __destruct() {
    $this->dbo = null;
    $this->tab_name = null;
  }

  /**
   * 按条件查询表记录并按升序排序
   */
  public function queryTable($rule = null) {
    $sql = $this->sql_query;
    if($rule) {
      $sql .= " WHERE $rule";
    }
    $sql .= " ORDER BY id ASC";
    return $this->dbo->exec_query($sql);
  }
  
  /**
   * 获取用户总数
   * @return $counts: 返回用户总数;
   */
  public function getCounts($rule = null) {
    $counts = 0;
    if($this->queryTable($rule)) {
      $counts = count($this->queryTable($rule));
    }
    return $counts;
  }
}

/**
 * 案例管理类
 */
class CaseManager {
  public $dbo;
  public $tab_name;
  public $sql_query;

  // 构造函数
  function __construct($dbo, $tab_name) {
    $this->dbo = $dbo;
    $this->tab_name = $tab_name;
    $this->sql_query = "SELECT * FROM " . $tab_name;
  }

  // 析构函数
  function __destruct() {
    $this->dbo = null;
    $this->tab_name = null;
    $this->sql_query = null;
  }

  /**
   * 按条件查询表并按升序排序
   */
  public function queryTable($rule = null) {
    $sql = $this->sql_query;
    if($rule) {
      $sql .= " WHERE $rule";
    }
    $sql .= " ORDER BY id ASC";
    return $this->dbo->exec_query($sql);
  }

  /**
   * 插入数据项
   * @param $data: json格式数据
  */
  public function addItem($data) {
    // 格式化上传图片字符串
    $dataArray = json_decode($data, true);
    $imageStr = $this->transferImageJson($dataArray["c_image"]);
    // 往数据库添加数据项
    // $sql_insert = "INSERT INTO ".$this->tab_name."(p_title, p_keywords, p_description, c_path, c_title, c_area, c_address, c_class, c_team, c_company, c_description, c_image, c_recommends, c_posted) VALUES('".$dataArray["p_title"]."','".$dataArray["p_keywords"]."','".$dataArray["p_description"]."','".$dataArray["c_path"]."','".$dataArray["c_title"]."', '".$dataArray["c_area"]."', '".$dataArray["c_address"]."', '".$dataArray["c_class"]."', '".$dataArray["c_team"]."', '".$dataArray["c_company"]."', '".$dataArray["c_description"]."', '".$imageStr."', '".$dataArray["c_recommends"]."','".$dataArray["c_posted"]."')";
    $sql_insert = "INSERT INTO ".$this->tab_name."(p_title, p_keywords, p_description, c_path, c_title, c_area, c_address, c_class, c_team, c_company, c_description, c_image, c_recommends, c_posted) VALUES('".$dataArray["p_title"]."','".$dataArray["p_keywords"]."','".$dataArray["p_description"]."','".$dataArray["c_path"]."','".$dataArray["c_title"]."', '".$dataArray["c_area"]."', '".$dataArray["c_address"]."', '".$dataArray["c_class"]."', '".$dataArray["c_team"]."', '".$dataArray["c_company"]."', '".$dataArray["c_description"]."', '".$imageStr."', '0','F')";
    $this->dbo->exec_insert($sql_insert);

    $id = $this->queryTable()[0]["id"];
    // 生成JSON文件
    $path = ROOT_PATH.PATH_UPLOAD."/case/";
    if(is_dir($path) or @mkdir($path, 0777, true)) {
      file_put_contents($path."/$id.json", $this->transferJson("id=$id"));
    }
    
    if($this->dbo->state["err_no"]) {
      $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$this->dbo->state["err_code"].'"}';
    }
    else {
      $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$id.'"}';
    }
    return $ret;
  }

  /**
   * 发布数据项
   */
  public function postItem($id) {
    // 从对应JSON文件读取数据
    $path = ROOT_PATH.PATH_UPLOAD."/case/";
    $data = file_get_contents($path."/$id.json");
    // 生成html文件
    $siteinfo = json_decode(file_get_contents(ROOT_PATH.PATH_JSON."/siteinfo.json"), true);
    $url = "http://".$siteinfo["domain"]."/template/case_temp.php";
    $str = curl_request($url, $data);
    file_put_contents(ROOT_PATH."/case/$id.html", $str);
    // 更新数据库文件路径
    $ret = $this->updateItem($id, '{"c_path": "/case/'.$id.'.html", "c_posted": "T"}');
    $retArray = json_decode($ret, true);
    if(!$retArray["err_no"]) {
      $retArray["err_code"] = "案例已成功发布！";
      $ret = json_encode($retArray);
    }
    return $ret;
  }

  /**
   * 更新数据项
   * @param   int $id 数据库对应的id
   * @param   string $data JSON格式的数据字符串
   * @return  string $ret JSON格式的结果字符串
   */
  public function updateItem($id, $data) {
    if(!$data) {
      return  '{"err_no": -1, "err_code": "数据不能为空！"}';
    }
    // UPDATE table SET key1=value1, key2=value2, ..., keyN=valueN
    $dataArray = json_decode($data, true);
    // 格式化上传图片字符串
    $imageStr = $this->transferImageJson($dataArray["c_image"]);
    
    $sql_update = "UPDATE $this->tab_name SET ";
    foreach($dataArray as $key=>$value) {
      if($key !== "c_image") {
        $sql_update .= ($key."='".$value."'");
      }
      else {
        $sql_update .= ($key."='".$imageStr."'");
      }
      if(end($dataArray) !== $value) {
        $sql_update .= ",";
      }
      $sql_update .= " ";
    }
    $sql_update .= "WHERE id=$id";
    $this->dbo->exec_update($sql_update);

    // 同时更新JSON文件
    $path = ROOT_PATH.PATH_UPLOAD."/case/";
    if(is_dir($path) or @mkdir($path, 0777, true)) {
      file_put_contents($path."/$id.json", $this->transferJson("id=$id"));
    }
    if($this->queryTable("id=$id")[0]["c_posted"] === "T") {
      // 如果已发布则同时更新html文件
      $siteinfo = json_decode(file_get_contents(ROOT_PATH.PATH_JSON."/siteinfo.json"), true);
      $url = "http://".$siteinfo["domain"]."/template/case_temp.php";
      $str = curl_request($url, $this->transferJson("id=$id"));
      file_put_contents(ROOT_PATH."/case/$id.html", $str);
    }

    // 格式化返回值
    if($this->dbo->state["err_no"]) {
      $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$this->dbo->state["err_code"].'"}';
    }
    else {
      $ret = '{"err_no":'.$this->dbo->state["err_no"].', "err_code": "'.$id.'"}';
    }
    return $ret;
  }

  /**
   * 删除数据项
   */
  public function removeItem($id) {
    $sql_remove = 'DELETE FROM '.$this->tab_name.' WHERE id='.$id;
    $this->dbo->exec_delete($sql_remove);
    $ret = '{"err_no": '.$this->dbo->state["err_no"].', "err_code": "'.$this->dbo->state["err_code"].'"}';
    return $ret;
  }

  /**
   * 将以数组形式保存的数据转换成JSON格式的字符串
   * @param Array $dataArray: 数组形式的数据
   * @return JSON $dataString: JSON格式的字符串
   */
  public function transferImageJson($dataArray) {
    $dataString = '';
    if($dataArray) {
      $dataString .= '[';
      foreach($dataArray as $item) {
        $dataString .= '{"';
        foreach($item as $key=>$value) {
          $dataString .= $key;
          $dataString .= '":"';
          $dataString .= $value;
          if($value !== end($item)) {
            $dataString .= '","';
          }
        }
        $dataString .= '"}';
  
        if($item !== end($dataArray)) {
          $dataString .= ',';
        }
      }
      $dataString .= ']';
    }
    return $dataString;
  }

  /**
   * 转换数据库记录为json字符串
   */
  public function transferJson($rule) {
    if(!$rule) {
      return '{"err_no": -1, "err_code": "转换参数不能为空！"}';
    }
    $result = $this->queryTable($rule)[0];
    $json = '{';
    foreach($result as $key=>$value) {
      if($key === "c_image") {
        if($value) {
          $json .= ('"'.$key.'":'.$value);
        }
        else {
          $json .= ('"'.$key.'":""');
        }
      }
      else {
        $json .= ('"'.$key.'":"'.$value.'"');
      }
      if($value !== end($result)) {
        $json .= ',';
      }
    }
    $json .= '}';

    return $json;
  }

  /**
   * 获取案例总数
   * @return {number} $counts: 返回案例总数;
   */
  public function getCounts($rule = null) {
    $counts = 0;
    if($this->queryTable($rule)) {
      $counts = count($this->queryTable($rule));
    }
    return $counts;
  }
}

/**
 * 文章管理类
 */
class ArticleManager {
  
}

/**
 * 数据库操作类
 */
class DBOperator {
//    主机名
  public $hostname;
//    数据库用户名
  public $username;
//    数据库密码
  public $password;
//    数据库名称
  public $dbname;
//    数据库连接字符串
  public $links;
//    数据库操作的状态信息
  public $state;

//    构造函数
  function __construct($hostname, $username, $password, $dbname) {
    $this->hostname = $hostname;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;
    $this->links = mysqli_connect($hostname, $username, $password, $dbname);
    $this->state = array("err_no"=>mysqli_connect_errno(), "err_code"=>mysqli_connect_error());
  }

//    析构函数
  function __destruct() {
    $this->hostname = null;
    $this->username = null;
    $this->password = null;
    $this->dbname = null;
    $this->state = null;
    !$this->links or $this->links->close();
  }

  /**
   * 数据库初始化，创建表tab_admin及添加管理员账号
   * @param $sqlArray: 创建表tab_admin以及添加数据的SQL语句数组
   * 
   * $sqlArray = array("create_table"=>"CREATE TABLE tab_admin(uid VARCHAR(16) NOT NULL, username VARCHAR(16) NOT NULL, password VARCHAR(16) NOT NULL,access VARCHAR(1) NOT NULL, PRIMARY KEY(uid), UNIQUE(username)) ENGINE=InnoDB", "insert_admin"=>"INSERT INTO tab_admin(uid, username, password, access) VALUES('000000', 'admin', 'admin', '0')");
   */
  public function init($sqlArray) {
    mysqli_query($this->links, $sqlArray["create_table"]);
    mysqli_query($this->links, $sqlArray["insert_admin"]);
    $this->state = array("err_no"=>mysqli_errno($this->links), "err_code"=>mysqli_error($this->links));
  }

  /**
  * 执行MYSQL操作
  * $sql: 要执行的SQL语句;
  * $return: 将执行结果返回
  */
  public function execute($sql) {
    $ret = mysqli_query($this->links, $sql);
    $this->state = array("err_no"=>mysqli_errno($this->links), "err_code"=>mysqli_error($this->links));
    return $ret;
  }
  /**
  * 执行MYSQL查询操作
  * @param $sql: 要执行的SQL语句;
  * @returen $ret: 将执行结果以数组形式返回
  */
  public function exec_query($sql) {
    $result = mysqli_query($this->links, $sql);
    if($result) {
      if ($result->num_rows) {
//        查询结果行数不为0，，将值格式化到数组中返回
        $ret = array();
        while ($tmp = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//          $ret[] = $tmp;
          array_unshift($ret, $tmp);
        }
      }
      else {
//          查询结果行数为0，即没有查询到数据
        $ret = false;
      }
    }
    else {
//        查询语句有误
//        通过检查mysqli_error($this->links)的返回值判断语句是否有误
//        $ret = mysqli_error($this->links);
      $ret = false;
    }

//      更新操作后状态信息
    $this->state = array("err_no"=>mysqli_errno($this->links), "err_code"=>mysqli_error($this->links));
    return $ret;
  }

  /**
  * 执行MYSQL插入操作
  * @param $sql: 要执行的SQL语句;
  * @returen $ret: 将执行结果返回
  * INSERT INTO table(key1, key2, ..., keyN) VALUES(value1, value2, ..., valueN)
  */
  public function exec_insert($sql) {
    return $this->execute($sql);
  }
  /**
  * 执行MYSQL修改操作
  * @param $sql: 要执行的SQL语句;
  * @returen $ret: 将执行结果返回
  * UPDATE table SET key1=value1, key2=value2, ..., keyN=valueN
  */
  public function exec_update($sql) {
    return $this->execute($sql);
  }
  /**
  * 执行MYSQL删除操作
  * @param $sql: 要执行的SQL语句;
  * @returen $ret: 将执行结果返回
  * DELETE FROM table WHERE key=value
  */
  public function exec_delete($sql) {
    return $this->execute($sql);
  }
}
