<?php
  session_start();

  if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php?no-access=1");
    exit();
  }

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

  <label for="exampleInputEmail1" class="form-label">Item Category</label>
  <div class="d-flex gap-5 justify-content-center">
  <button class="btn dropdown-toggle" id="dropdown-button" data-toggle="dropdown">
  <ul class="dropdown-menu position-static d-grid gap-1 p-2 rounded-3 mx-0 shadow w-220px">
    <li><a id="drop" class="dropdown-item rounded-2 active" href="#">Learning Tools</a></li>
    <li><a class="dropdown-item rounded-2" href="#">Art Supplies</a></li>
    <li><a class="dropdown-item rounded-2" href="#">Outdoor Equipment</a></li>
  </ul>

</div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">QTY</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="ConfirmPassword">
   
    <?php if(isset($cp_error))echo $cp_error; ?>
  </div>

  <button type="submit" class="btn btn-primary"  name="regBtn">Submit</button>
</form>
    </div>
       
    </div>

    <script type="text/javascript">
    document.getElementById("btn dropdown-toggle").onclick = function () {
        document.getElementById("dropdown-button").dropdown("toggle");
    };
</script>