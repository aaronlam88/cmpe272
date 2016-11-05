<?php
$TITLE="Home";
require_once "header.php";
?>

<?php
//Print out
$mostVisited = $_COOKIE["mostVisited"];
$lastFive = $_COOKIE["lastFive"];
arsort($mostVisited);
asort($lastFive);

echo "
<table class=\"table\">
  <tr>
    <th> The most visited products: </th>
    <th> The last five visited products: </th>
  </tr>
  <tr>
    ";
    if(isset($mostVisited)) {
      echo "
      <td>
        <ul>";
          foreach ($mostVisited as $key => $value) {
            echo "
            <li> $key </li>";
          }
          echo "
        </ul>
      </td>";
    }

    if(isset($lastFive)) {
      echo "
      <td>
        <ul>";
          foreach ($lastFive as $key => $value) {
            echo "
            <li> $key </li>";
          }
          echo "
        </ul>
      </td>";
    }
    echo "
  </tr>
</table>";

?>

<?php require_once "footer.php"; ?>