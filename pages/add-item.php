<?php
    require '../includes/header.php';
    require '../includes/db-connection.php';

?>

<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-5 fw-normal">Add Item</h1>

        <div class = "vh-100 d-flex justify-content-center align-content-center">
    

    <form class="align-items-center" action="" method="post">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Item Name</label>
    <input type="text" class="form-control" id="inputName" name="FirstName" action="welcome.php" method="post">
    <div id="emailHelp" class="form-text"></div>

    <?php if(isset($FirstName_error))echo $FirstName_error; ?>
  
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1">
    <div id="emailHelp" class="form-text"></div>

    <?php if(isset($LastName_error))echo $LastName_error; ?>

  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Iventory</label>
    <input type="password" class="form-control" id="exampleInputEmail1" >
    <div id="emailHelp" class="form-text"></div>

    <?php if(isset($password_error))echo $password_error; ?>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">QTY</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="ConfirmPassword">
   
    <?php if(isset($cp_error))echo $cp_error; ?>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">E-mail</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="E-mail">
    <div id="emailHelp" class="form-text"></div>

    <?php if(isset($email_error))echo $email_error; ?>
  </div>

 

  <button type="submit" class="btn btn-primary"  name="regBtn">Submit</button>
</form>
    </div>
       
    </div>