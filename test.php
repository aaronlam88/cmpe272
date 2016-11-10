<?php
require_once "simple_html_dom.php";
require_once "header.php";
//step1
$cSession = curl_init(); 

curl_setopt($cSession,CURLOPT_URL,"http://davidmhou.com/searchuser.php");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 

$result=curl_exec($cSession);

curl_close($cSession);


$dom = new simple_html_dom();

$dom->load($result);

$dom->preserveWhiteSpace = false;

echo "
  <div class=\"container\">
    <table class=\"table table-striped table-hover\">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Home Address</th>
          <th>Home Phone</th>
          <th>Cell Phone</th>
        </tr>
      </thead>
      <tbody>";

$rows = $dom->find('tr');
foreach ($rows as $row) {
  echo $row;
}

  echo "
      </tbody>
    </table>
  </div>";
?>

<?php
require_once "footer.php";
?>