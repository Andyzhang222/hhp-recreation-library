<?php
    require '../includes/header.php';
    require '../includes/db-connection.php';

?>

<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-5 fw-normal">Remove Item</h1>

        <div class = "vh-100 d-flex justify-content-center align-content-center">
    

    <form class="align-items-center" action="" method="post">

  <div class="mb-3">
    <label class="form-label">Item Name</label>
    <input type="text" class="form-control" id="inputName" name="FirstName" method="post">
    <label for="exampleInputPassword1" class="form-label">Admin Passcode</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="ConfirmPassword">
</div>

  <button type="submit" class="btn btn-primary"  name="regBtn">Submit</button>
</form>
    </div>
       
    </div>