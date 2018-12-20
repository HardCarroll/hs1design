<?php
// $str = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/case/template.html");
// $str = str_replace("<replace#title>", "标题替换测试", $str);
// $str = str_replace("<replace#addr>", "地址替换测试", $str);
// $str = str_replace("<replace#area>", "面积替换测试", $str);
// $str = str_replace("<replace#type>", "类型替换测试", $str);
// $str = str_replace("<replace#team>", "团队替换测试", $str);
// $str = str_replace("<replace#company>", "公司替换测试", $str);
// $result = file_put_contents($_SERVER["DOCUMENT_ROOT"]."/cms/update/save.html", $str);
// var_dump($result);

$url = "http://192.168.0.216:8888/case/template.php";
// $url = "http://192.168.0.216:6510";
$str = curl_request($url);
// $str = str_replace("<replace#title>", "标题替换测试", $str);
// $str = str_replace("<replace#addr>", "地址替换测试", $str);
// $str = str_replace("<replace#area>", "面积替换测试", $str);
// $str = str_replace("<replace#type>", "类型替换测试", $str);
// $str = str_replace("<replace#team>", "团队替换测试", $str);
// $str = str_replace("<replace#company>", "公司替换测试", $str);
$result = file_put_contents($_SERVER["DOCUMENT_ROOT"]."/cms/update/save.html", $str);
var_dump($result);

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