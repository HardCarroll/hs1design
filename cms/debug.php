<?php
// $url = "http://192.168.0.216:8888/template/case_temp.php";
// $post = '{"token": "test", "key": "中文测试"}';
// $str = curl_request($url, $post);
// // $str = curl_request($url);
// $result = file_put_contents($_SERVER["DOCUMENT_ROOT"]."/case/upload/save.html", $str);
// var_dump($result);
if (isset($_POST["dataJson"]) && !empty($_POST["dataJson"])) {
  $dataArray = json_decode($_POST["dataJson"], true);
  switch ($dataArray["token"]) {
    case "test":
      echo $dataArray["value"];
      break;
    default:
      echo "default branch";
      break;
  }
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