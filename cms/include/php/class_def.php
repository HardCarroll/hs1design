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
  private $sql_query;

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

  public function queryTable($rule = null) {
    $sql = $this->sql_query;
    if($rule) {
      $sql .= " WHERE $rule";
    }
    return $this->dbo->exec_query($sql);
  }
  
  /**
   * 获取用户总数
   * @return $counts: 返回用户总数;
   */
  public function getCounts() {
    $counts = 0;
    $sql = $this->sql_query;
    if($this->dbo->exec_query($sql)) {
      $counts = count($this->dbo->exec_query($sql));
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
  private $sql_query;

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

  // 按条件查询表
  public function queryTable($rule = null) {
    $sql = $this->sql_query;
    if($rule) {
      $sql .= " WHERE $rule";
    }
    return $this->dbo->exec_query($sql);
  }

  // 插入数据项
  public function addItem($data) {
    $dataArray = json_decode($data, true);
    $sql_insert = "INSERT INTO ".$this->tab_name."(p_title, p_keywords, p_description, c_path, c_title, c_area, c_address, c_class, c_team, c_company, c_description, c_image, c_recommends) VALUES('".$dataArray["page_title"]."','".$dataArray["meta_keywords"]."','".$dataArray["meta_description"]."','".$dataArray["case_url"]."','".$dataArray["case_name"]."', '".$dataArray["case_area"]."', '".$dataArray["case_address"]."', '".$dataArray["case_type"]."', '".$dataArray["case_team"]."', '".$dataArray["case_company"]."', '".$dataArray["case_description"]."', '".json_encode($dataArray["case_images"])."', '0')";
    $sql_insert = str_replace("\\", "", $sql_insert);
    $ret = $this->dbo->exec_insert($sql_insert);
    return $sql_insert;
  }

  /**
   * 获取案例总数
   * @return $counts: 返回案例总数;
   */
  public function getCounts() {
    $counts = 0;
    $sql = $this->sql_query;
    if($this->dbo->exec_query($sql)) {
      $counts = count($this->dbo->exec_query($sql));
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
   * 数据库初始化，创建tab_admin及管理员账号
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
  * @returen $ret: 将执行结果返回
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
