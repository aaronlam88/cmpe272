<?php
$TITLE="Products";
require_once "header.php";
?>

<?php

$name = $_GET['name'];
$dir = getcwd();
$imgdir = "$dir/images/product_images/$name";
$files=scandir($imgdir);

echo "
<table class=\"table table-striped table-hover\">
  <tr>
    <th style=\"width: 80%\"> 
      <img id=\"image\" class=\"image-full\" src=\"/CMPE-272/images/product_images/$name//x01.png\"> 
    </th>
    <th>
      <div>";
        foreach ($files as $fileName) {
          if(strcmp($fileName[0], "x") == 0) {
            $imgName="/CMPE-272/images/product_images/$name/$fileName";
            echo "
            <img class=\"image-icon\" src=\"$imgName\" onmouseover=\"show_image('$imgName')\"> <br>";
          }
        }
        echo "
      </div>
    </th>
  </tr>
</table>
<table>";
  ?>

  <?php require_once "footer.php"; ?>