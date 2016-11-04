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
      <img id=\"image\" class=\"image-full\" src=\"/CMPE-272/images/product_images/$name/01.png\"> 
    </th>
    <th>
      <div>";
        foreach ($files as $fileName) {
          if(pathinfo($fileName, PATHINFO_EXTENSION) == "png") {
            $imgName="/CMPE-272/images/product_images/$name/$fileName";
            echo "
            <img class=\"image-icon\" src=\"$imgName?<?=Date('U')?>\" onmouseover=\"show_image('$imgName')\"> <br>";
          }
        }
        echo "
      </div>
    </th>
  </tr>
</table>
";

$spec = fopen("$imgdir/spec.txt", "r");
$first = true;

echo "<table class=\"table table-striped table-hover\">";

if ($spec) {

  while (($line = fgets($spec)) !== false) {

    if($first) {
      $line = trim($line);
      echo "<tr> <th colspan=\"2\" style=\"text-align:center\"> $line </th> </tr>";
      $first = false;
    } else {
      echo "
      <tr>
        <th> $line </th>
        <td>";
      while (($line = fgets($spec)) !== false && !ctype_alnum($line[0])) {
        echo "
        $line <br>";
      }
      echo "
        </td>
      </tr>";
      if (!feof($spec)) {
       fseek($spec, ftell($spec)-strlen($line));
      }
    }
  }

  fclose($spec);
} else {
    // error opening the file.
} 
echo "</table>";
?>

<?php require_once "footer.php"; ?>