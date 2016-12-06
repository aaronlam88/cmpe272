<?php

$username = "testuser";
$password = " ";

$auth = false;

$con = mysqli_connect("localhost","root","toor","CMPE272");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM CMPE272.user_auth;");

while($row = mysqli_fetch_assoc($result))
{
  $salt = $row["salt"];
  $password = hash('sha256', $password . $salt, false);

  if ($password == $row["password"]) {
    $auth = true;
  }
}

if ($auth) {
  echo "LOGIN";
} else {
  echo "NOT LOGIN";
}


?>