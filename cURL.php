<?php
require_once "mysqli_connect.php";

$sql = "SELECT * FROM CMPE272.user_info;";

if (mysqli_query($conn, $sql)) {
  ;
} else {
  echo "SELECT ERROR: $sql" . mysqli_error($conn);
}

if ($result = mysqli_query($conn, $sql)) {
 
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

}

?>