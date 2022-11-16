<?php

  require "../includes/header.php";
  require_once "../includes/db-connection.php";

if(isset($_POST['regBtn'])){

$FirstName = filter_input(INPUT_POST,'FirstName');
$LastName = filter_input(INPUT_POST,'LastName');

$name = $LastName.$FirstName;
$email = $_POST['E-mail'];
$Item_ID = $_POST['Item_ID'];
$QTY = $_POST['QTY'];

$insertQuery = "INSERT INTO `order`
VALUES (NULL, 1, '$QTY', '$name', '$email', CURDATE(), CURDATE(), 0);";

$insertResult = $conn->query($insertQuery);

if (!$insertResult) {
    trigger_error('Error: ' . $conn->error);
}

if ($insertResult == true) {

    echo "<p>Order placed</p>";
    header("Location: checkConfirm.php");
    exit();
}

}
?>





  <main class = "min-vh-100 bg-light">

  
  <h7 class="text-center"> <br></h7>
  <h7 class="text-center"> <br></h7>
  <h7 class="text-center"> <br></h7>
  <h7 class="text-center"> <br></h7>
  <h2 class="text-center">Return Item</h2> 
 
    <div class = "vh-100 d-flex justify-content-center align-content-center">
    

    <form class="align-items-center" action="" method="post">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">First Name</label>
    <input type="text" class="form-control" id="inputName" aria-describedby="emailHelp" name="FirstName" value ="" action="welcome.php" method="post">
    <div id="emailHelp" class="form-text"></div>

  
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="LastName" value ="">
    <div id="emailHelp" class="form-text"></div>

    <?php if(isset($LastName_error))echo $LastName_error; ?>

  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Item_ID</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Item_ID" value ="">
    <div id="emailHelp" class="form-text"></div>


  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">QTY</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="QTY" value ="">
   
    <?php if(isset($cp_error))echo $cp_error; ?>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">E-mail</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="E-mail" value ="">
    <div id="emailHelp" class="form-text"></div>

    <?php if(isset($email_error))echo $email_error; ?>
  </div>

 

  <button type="submit" class="btn btn-primary"  name="regBtn">Submit</button>
</form>
    </div>


</main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

<?php
  require "../includes/footer.php"
?>