<?php
$username = "testuser";
$password = "testpassword";
$salt = openssl_random_pseudo_bytes(32);

echo $salt . "<br>";
echo $password . "<br>";

$test = $password . $salt;
echo $test . "<br>";

echo hash('sha256', $password + $salt, false);


?>