<?php

$username = "testuser";
$password = "testpassword";
$salt = openssl_random_pseudo_bytes(32);

$password = hash('sha256', $password . $salt, false);

$con = mysqli_connect("localhost","root","toor","CMPE272");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"INSERT INTO CMPE272.user_auth (username, password, salt) VALUES ('$username', '$password', '$salt');");

var_dump($result);

?>