<?php
  require '../includes/header.php';
  require '../includes/db-connection.php';

?>

<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-5 fw-normal">Add New Code</h1>

        <div class = "vh-100 d-flex justify-content-center align-content-center">
    

    <form class="align-items-center" action="" method="post">

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">New Admin Code</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="ConfirmPassword">
</div>
  <input id="submit-code" class="btn btn-lg btn-warning" type="submit" value="Submit" name="submit-admin-code">
</form>
<?php

  if (isset($_POST['submit-admin-code'])) {
      $codeSubmitted = trim(htmlspecialchars(stripslashes($_POST["code-submitted"])));
      $codeQuery = "SELECT * 
      FROM `admin_code`
      WHERE code=$codeSubmitted;";

      $codeResult = $conn->query($codeQuery);
      if ($codeResult->num_rows > 0) {
        echo "<p class='text-dark'>That is already an admin code, please choose another one</p>";
      }
      else{
        echo "<p class='text-dark'> New admin code successfully added!</p>";
      }
       
  


  }
?>
    </div>
       
    </div>