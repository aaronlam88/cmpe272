<?php
$TITLE="Home";
require_once "header.php";
?>

<form method="post" action="secure_section.php">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="username" class="form-control" id="username" name="username" placeholder="username" required="">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="password" required="">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>


<?php require_once "footer.php"; ?>