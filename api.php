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

$data = json_decode(file_get_contents("php://input"), true);

if(!isset($data)) {
  $data[] = array("action" => $_GET["sql"], "sql" => $_GET["sql"]);
}

$action = $data["action"];

switch ($action) {
  case 'test':
  $data["ack"] = "true";
  echo json_encode($data);
  break;

  case 'sql':
  $sql = $data["sql"];
  $result = mysqli_query($conn, $sql);

  $names = [];

  echo "
  <thead>
    <tr>";
      while ($finfo = mysqli_fetch_field($result)) {
        $field = $finfo->name;
        echo "
        <th> $field </th>";
        $names[] = $field;
      }
      echo "
    </tr>
  </thead>";

  echo "
  <tbody>";

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        echo "
        <tr>";
          foreach ($names as $name) {
            echo "
            <td>" . $row[$name] . "</td>";
          }
          echo "
        </tr>";
      }
    }

    echo "
  </tbody>";

  mysqli_free_result($result);

  $data["ack"] = "true";

  break;

  case "test_result":
  $sql = $data["sql"];

  $myArray = array();
  if ($result = $conn->query($sql)) {
    $data["ack"] = "true";

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $myArray[] = $row;
    }
    echo json_encode($myArray);
  }

  $result->close();
  $conn->close();
  echo json_encode($data);
  break;

  default:
    # code...
  break;
}
?>