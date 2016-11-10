<?php
$TITLE="List";
require_once "header.php";
require_once "mysqli_connect.php";
?>

<?php
$sql = "SELECT * FROM CMPE272.user_info;";

if (mysqli_query($conn, $sql)) {
  ;
} else {
  echo "SELECT ERROR: $sql" . mysqli_error($conn);
}

if ($result = mysqli_query($conn, $sql)) {
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

        if (mysqli_num_rows($result) > 0) {
    // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
              <td>" . $row["first_name"] . "</td>
              <td>" . $row["last_name"] . "</td>
              <td>" . $row["email"] . "</td>
              <td>" . $row["home_address"] . "</td>
              <td>" . $row["homephone"] . "</td>
              <td>" . $row["cellphone"] . "</td>
            </tr>";
          }
        }

        echo "
      </tbody>
    </table>
  </div>";
}

?>

<?php
require_once "simple_html_dom.php";
require_once "header.php";
//step1
$cSession = curl_init(); 

curl_setopt($cSession,CURLOPT_URL,"http://davidmhou.com/searchuser.php");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 

$result=curl_exec($cSession);

$dom = new simple_html_dom();

$dom->load($result);

$dom->preserveWhiteSpace = false;

echo "
<div class=\"container\">
  <table class=\"table table-striped table-hover\">
    <tbody>";

      $rows = $dom->find('tr');
      foreach ($rows as $row) {
        echo $row;
      }

      echo "
    </tbody>
  </table>
</div>";


curl_setopt($cSession,CURLOPT_URL,"http://lasertonesanjose.com/CMPE272/cURLlab/list_of_users_B.php");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 

$result=curl_exec($cSession);

$dom = new simple_html_dom();

$dom->load($result);

$dom->preserveWhiteSpace = false;

echo "
<div class=\"container\">
  <table class=\"table table-striped table-hover\">
    <tbody>";

      $rows = $dom->find('tr');
      foreach ($rows as $row) {
        echo "
        $row
        ";
      }

      echo "
    </tbody>
  </table>
</div>";

curl_close($cSession);
?>



<?php require_once "footer.php"; ?>