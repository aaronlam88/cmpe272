<?php
$TITLE="User";
require_once "header.php";
?>

<div class="container-fluid">

  <h3>Search</h3>

  <form class="form-horizontal" method="post" action="sqlCommand.php">

    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name: </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name or First or Last Name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email: </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone Number: </label>
      <div class="col-sm-6">
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Home Phone or Cell Phone">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default " value="search" id="search" name="search">Search</button>
      </div>
    </div>

  </form>

  <h3>Add User</h3>
  <form method="post" action="sqlCommand.php">
    <div class="form-group">
      <label for="firstName">First Name:</label>
      <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required="">
    </div>

    <div class="form-group">
      <label for="lastName">Last Name:</label>
      <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required="">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="example@sjsu.com" required="">
    </div>

    <div class="form-group">
      <label for="homeAddress">Home Address:</label>
      <input type="text" class="form-control" id="homeAddress" name="homeAddress" placeholder="Home Address" required="">
    </div> 

    <div class="form-group">
      <label for="homePhone">Home Phone:</label>
      <input type="tel" class="form-control" id="homePhone" name="homePhone" placeholder="Home Phone" required="">
    </div> 

    <div class="form-group">
      <label for="cellPhone">Cell Phone:</label>
      <input type="tel" class="form-control" id="cellPhone" name="cellPhone" placeholder="Cell Phone" required="">
    </div> 

    <div style="text-align: center;">
    <button type="submit" class="btn btn-default " value="add" id="add" name="add">Add User</button>
    <div>
  </form>
</div>

<br>
<?php require_once "footer.php"; ?>