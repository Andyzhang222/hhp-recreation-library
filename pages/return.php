<?php
  require "../includes/header.php";
  require_once "../includes/db-connection.php";

if(isset($_POST['regBtn'])){

  
session_start();
$Fname = filter_input(INPUT_POST,'FirstName');
$Lname = filter_input(INPUT_POST,'LastName');
 $name = $Fname.' '.$Lname;
$email = $_POST['E-mail'];
$Item_ID = $_POST['Item_ID'];
$QTY = $_POST['QTY'];

if(empty($Fname)){
    $Fname_error= "Please fill out this field.";
  }
  if(preg_match("/.*[0-9].*/", $Fname)){
    $Fname_error= "Numerical Number can not allowed in first name";
  }
  if(preg_match( "/\W/",$Fname)){
    $Fname_error = "last name can not have special character";
  }

  
  if(empty($Lname)){
    $Lname_error= "Please fill out this field.";
  }
  if(preg_match("/.*[0-9].*/", $Lname)){
    $Lname_error= "Numerical Number can not allowed in last name";
  }
  if(preg_match( "/\W/",$Lname)){
    $Lname_error = "last name can not have special character";
  }


  if(empty($Item_ID)){
    $ItemID_error= "Please fill out this field.";
  }
  if(preg_match("/.*[a-z].*/", $QTY)){
    $ItemID_error= " Item ID can only be the numerical number";
  }
  if(preg_match("/.*[A-Z].*/", $QTY)){
    $ItemID_error= " Item ID can only be the numerical number";
  }
  if(preg_match( "/\W/",$QTY)){
    $ItemID_error = "Item ID can not have special character";
  }


  if(empty($QTY)){
    $QTY_error= "Please fill out this field.";
  }
  if(preg_match("/.*[a-z].*/", $QTY)){
    $QTY_error= " QTY can only be the numerical number";
  }
  if(preg_match("/.*[A-Z].*/", $QTY)){
    $QTY_error= " QTY can only be the numerical number";
  }
  if(preg_match( "/\W/",$QTY)){
    $QTY_error = "QTY can not have special character";
  }






  if (empty($email)){
    $email_error = "please enter a valid email";
}elseif(strlen($email) - strrpos($email, '.') <= 2 || strlen($email) - strrpos($email, '.') > 6){
    $email_error = "please enter the email with the damoin number between 2 to 5 ";
}



$valid = !isset($Fame_error) && !isset($Lname_error) && !isset($email_error) &&  !isset($ItemID_error) && !isset($QTY_error);

if($valid){

  $_SESSION["name"] = "$name";

  $insertQuery = "INSERT INTO `order`
VALUES (NULL, 1, '$QTY', '$name', '$email', CURDATE(), CURDATE(), 1);";

$insertResult = $conn->query($insertQuery);

if (!$insertResult) {
    trigger_error('Error: ' . $conn->error);
}

if ($insertResult == true) {

    echo "<p>Order placed</p>";
    header("Location: returnConfirm.php");
    exit();
}
  

}
}
?>
  <main>
    <header>
   
    </header>

  
  <h7 class="text-center"> <br></h7>
  <h7 class="text-center"> <br></h7>
 
  <h7 class="text-center"> <br></h7>
  <h2 class="text-center">Return Item</h2> 
 
  <form class="row" method="post">

  
  <div class="col-4">
    <label for="validationServer01" class="form-label">First name</label>
    <input type="text" class="form-control <?php if(isset($Fname_error)){echo 'is-invalid';} elseif(isset($_POST['regBtn']) && !isset($Fname_error)) {echo 'is-valid';} ?>" 
    id="validationServer01" name="FirstName">

    <div class="invalid-feedback">
    <?php if(isset($Fname_error))echo $Fname_error; ?>
    </div>
    <div class="valid-feedback">
    Looks good!
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationServer01" class="form-label">Last name</label>
    <input type="text" class="form-control <?php if(isset($Lname_error)){echo 'is-invalid';} elseif(isset($_POST['regBtn']) && !isset($Lname_error)) {echo 'is-valid';} ?>" 
    id="validationServer01" name="LastName">

    <div class="invalid-feedback">
    <?php if(isset($Lname_error))echo $Lname_error; ?>
    </div>
    <div class="valid-feedback">
    Looks good!
    </div>
  </div>

  <div class="col-md-4">
    <label for="validationServer01" class="form-label">Item ID</label>
    <input type="text" class="form-control  <?php if(isset($ItemID_error)){echo 'is-invalid';} elseif(isset($_POST['regBtn'])
     && !isset($ItemID_error)) {echo 'is-valid';} ?>" 
    id="validationServer01" name="Item_ID">


    <div class="invalid-feedback">
    <?php if(isset($ItemID_error))echo $ItemID_error; ?>
    </div>
    <div class="valid-feedback">
    Looks good!
    </div>
  </div>

  <p><br></p>
  
  <p><br></p>

  <div class="col-md-6">
    <label for="validationServer01" class="form-label">QTY</label>
    <input type="text" class="form-control <?php if(isset($QTY_error)){echo 'is-invalid';} 
    elseif(isset($_POST['regBtn']) && !isset($QTY_error)) {echo 'is-valid';} ?>" 
    id="validationServer01" name="QTY">

    <div class="invalid-feedback">
    <?php if(isset($QTY_error))echo $QTY_error;  ?>
    </div>
    <div class="valid-feedback">
    Looks good!
    </div>

  </div>

  <div class="col-md-6">
    <label for="validationServer01" class="form-label">E-mail</label>
    <input type="text" class="form-control <?php if(isset($email_error)){echo 'is-invalid';} elseif(isset($_POST['regBtn']) && !isset($email_error)) {echo 'is-valid';} ?> " 
    id="validationServer01" name="E-mail">

    <div class="invalid-feedback">
    <?php if(isset($email_error))echo $email_error;  ?>
    </div>
    <div class="valid-feedback">
    Looks good!
    </div>
  </div>

  

<p><br></p>
  <div class="col-md-3"> </div>
  <div class="col-4 mx-auto">
    <button class="btn btn-primary " name="regBtn"  type="submit">Submit</button>
  </div>
</form>
  

</main>

  <footer>
    <!-- place footer here -->
    <?php
  require "../includes/footer.php"
?>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>