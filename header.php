<?php
if (!isset($TITLE)) {
  $TITLE = "UNTITLED PAGE";
}

function setActive($currentPage, $compare) {
  if(strcmp ($currentPage, $compare) == 0) {
    echo "class=\"active\"";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title> <?php echo $TITLE; ?> </title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="/CMPE-272/stylesheet.css?v=1.1">
  <script src="/CMPE-272/javascript.js"></script>
</head>

<body class="container">
  <header>
    <div class="container-fluid header">
      <img src="/CMPE-272/images/icon1.png" alt="Air Run Inc. logo">
    </div>

    <nav class="container navbar navbar-inverse" data-spy="affix" data-offset-top="97">
      <ul class="nav navbar-nav">
        <li <?php setActive($TITLE, "Home"); ?>> <a href="/CMPE-272/home.php">Home</a></li>
        <li <?php setActive($TITLE, "Products"); ?>> <a href="/CMPE-272/products.php">Products</a></li>
        <li <?php setActive($TITLE, "Services"); ?>> <a href="/CMPE-272/services.php">Services</a></li>
        <li <?php setActive($TITLE, "News"); ?>> <a href="/CMPE-272/news.php">News</a></li>
        <li <?php setActive($TITLE, "Contacts"); ?>> <a href="/CMPE-272/contacts.php">Contacts</a></li>
        <li <?php setActive($TITLE, "About"); ?>> <a href="/CMPE-272/about.php">About</a></li>
        <li <?php setActive($TITLE, "User"); ?>> <a href="/CMPE-272/user.php">User</a></li> 
        <li <?php setActive($TITLE, "Login"); ?>> <a href="/CMPE-272/login.php">Login</a></li> 
        <li <?php setActive($TITLE, "History"); ?>> <a href="/CMPE-272/history.php">History</a></li>  
        <li <?php setActive($TITLE, "List"); ?>> <a href="/CMPE-272/list.php">List of Users</a></li> 
      </ul>
    </nav>
  </header>

    <?php
    $productName = $_GET["productName"];

    if (isset($productName)) {
      //Most Visited
      $mostVisited = $_COOKIE["mostVisited"];

      if(isset($mostVisited)) {

        $find = false;

        foreach ($mostVisited as $key => $value) {
          if (strcmp($key, $productName) == 0) {
            $value = $value + 1;
            setcookie("mostVisited[$productName]", "$value", time() + 3600, '/');
            $find = true;
            break;
          }
          if ($value == 1) {
            $min = $key;
          }
        }

        if(!$find) {
          if(isset($min)) {
            setcookie("mostVisited[$productName]", 1, time() + 3600, '/');
          } else {
            setcookie("mostVisited[$productName]", 1, time() + 3600, '/');
          }
        }
      } else {
        setcookie("mostVisited[$productName]", 1, time() + 3600, '/');
      }


      //Last Five
      $lastFive = $_COOKIE["lastFive"];

      if(isset($lastFive)) {
        asort($lastFive);
        $lastItem = end($lastFive);
        setcookie("lastFive[$lastItem]", "", time()-3600);
        setcookie("lastFive[$productName]", microtime(), time() + 3600, '/');
      } else {
        setcookie("lastFive[$productName]", microtime(), time() + 3600, '/');
      }
    }
    ?>

