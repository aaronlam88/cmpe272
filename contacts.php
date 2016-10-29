<?php
$TITLE="Contacts";
require_once "header.php";
?>

<h2>Contacts</h2>

<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" placeholder="First Last" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" placeholder="Enter email" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Message:</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="5" name="message" required></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="hidden" name="subject" value="Contacts-AirRun">
      <button type="submit" id="submit" name="submit" class="btn btn-default">Send</button>
    </div>
  </div>

</form>

<?php 
if (isset($_POST['submit'])) {
 echo "<p style=\"color:red\">Thank you for contacting us!</p>";
}
?>

<div class="container-fluid">
  <h4>Company directory</h4>
  <?php
  $dir = getcwd();
  $file = fopen("$dir/contacts.txt", "r");
  while (! feof($file)) {
    while ($string = fgets($file)) {
      echo "$string<br>";
    }
  }
  ?>
</div>

<?php require_once "footer.php" ?>