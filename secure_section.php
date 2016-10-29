<?php
$TITLE="Home";
require_once "header.php";
?>

<?php
  $usr_map = array();

  $username = $_POST["username"];
  $password = $_POST["password"];

  $dir = getcwd();
  $file = fopen("$dir/users.txt", "r");
  while (! feof($file)) {
    while ($string = fgets($file)) {

      $tokens = explode("|", $string);
      $test_username = trim($tokens[0]);
      $test_password = trim($tokens[1]);

      array_push($usr_map, "$test_username");


      if (strcmp($test_username, $username) == 0 && strcmp($test_password, $password) == 0) {
        session_start();
        $_SESSION["username"] = $username;
        break;
      }
    }
  }

  if(session_status() === PHP_SESSION_ACTIVE) {
    echo "<h3>Users List </h3>";
    echo "<p>";
    foreach ($usr_map as $value) {
      echo "$value<br>";
    }
    echo "</p>";

  } else {
    unset($GLOBALS['usr_map']);
    unset($GLOBALS['pwd_map']);

    echo "<h3 style=\"color:red\">You need to login to see the contain of this page!</h3>";
  }
?>

<?php require_once "footer.php"; ?>