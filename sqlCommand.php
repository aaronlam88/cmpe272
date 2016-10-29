<?php
$TITLE="Home";
require_once "header.php";
?>

<?php
$servername = "localhost";
$username = "root";
$password = "toor";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$add = $_POST["add"];
$search = $_POST["search"];

if (isset($add)) {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST["email"];
  $homeAddress = $_POST["homeAddress"];
  $homePhone = $_POST["homePhone"];
  $cellPhone = $_POST["cellPhone"];

  $sql = 
  "
  INSERT INTO 
    CMPE272.user_info
    (first_name, last_name, email, home_address, homephone, cellphone)
  VALUES 
    ('$firstName', 'lastName', 'email', '$homeAddress', '$homePhone', '$cellPhone');
  ";
  if (mysqli_query($conn, $sql)) {
    echo "ADD";
  } else {
    echo "SELECT ERROR: $sql" . mysqli_error($conn);
  }
} else if (isset($search)) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];

  $tokens = explode(" ", $name);

  if (count($tokens) == 2) {
    $firstName = $tokens[0];
    $lastName = $tokens[1];
  }

  $sql = 
  "
  SELECT * FROM CMPE272.user_info
  WHERE
  ";

  if (count($tokens) == 2) {
    $sql = $sql . " first_name=\"$firstName\" OR last_name=\"$lastName\" ";
  } else {
    $sql = $sql . " first_name=\"$name\" OR last_name=\"$name\" ";
  }

  $sql = $sql . " OR email=\"$email\" OR cellphone=\"$phone\" OR homephone=\"phone\" ;";

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
} else {
    echo "SELECT ERROR: " . mysqli_error($conn);
  }
}

?>

<?php require_once "footer.php"; ?>