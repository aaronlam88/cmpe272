<?php
require_once "header.php";

$data = array ("action" => "sql", "sql" => "select * from davidmm7_db.product;");

$url_send ="davidmhou.com/api.php";
$str_data = json_encode($data);

function sendPostData($url, $post){
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

$result = sendPostData($url_send, $str_data);

echo "
<div class=\"container\">
  <table class=\"table table-striped table-hover\">";

  echo $result;

    echo "
  </table>
</div>";
?>