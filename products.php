<?php
$TITLE="Products";
require_once "header.php";
?>

<div class="container">
  <table class="table table-striped table-hover">
    <thead>
    <tr>
      <th>Images</th>
      <th>Description</th>
      <th>Price</th>
    </tr>
    </thead>
    <tbody>
      <?php
        $dir = getcwd();
        $imgdir = "$dir/images/product_images/";
        $files=scandir($imgdir);

        foreach ($files as $fileName) {
          if(strcmp($fileName[0], ".") != 0) {

            $curDir="/CMPE-272/images/product_images/$fileName";

            $curFile = scandir("$imgdir$fileName");

            $images=preg_grep('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $curFile);

            echo "
              <tr>
                <td>
                  <a href=\"/CMPE-272/product_spec.php?name=$fileName\">
                  <img class=\"image-icon\" src=\"$curDir/$images[2]\">
                  </a>
                </td>
                <td> 
                " . 
                "<h3>" . strtoupper(str_replace('_', ' ', $fileName)) . "</h3>" .
                file_get_contents("$imgdir/$fileName/description.txt") .
                "
                <a href=\"/CMPE-272/product_spec.php?name=$fileName\"> more... </a>
                </td>
                  <td>" .
                file_get_contents("$imgdir/$fileName/price.txt") .
                "
                  </td>
                <tr>";
          }
        }
      ?>
    </tbody>
  </table>
</div>

<?php require_once "footer.php"; ?>