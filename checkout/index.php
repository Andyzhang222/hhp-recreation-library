<?php

if(isset($_POST['regBtn'])){

$FirstName = filter_input(INPUT_POST,'FirstName');
$LastName = filter_input(INPUT_POST,'LastName');
$email = $_POST['E-mail'];

$password = $_POST['Password'];
$confirmPassword = $_POST['ConfirmPassword'];


if(empty($FirstName)){
    $FirstName_error= "please enter the valid first name";
}
if(preg_match("/.*[0-9].*/", $FirstName)){
    $FirstName_error= "Numerical Number can not allowed in name";
}

if(empty($LastName)){
    $LastName_error= "please enter the valid Last name";
}elseif(preg_match("/.*[0-9].*/", $LastName)){
    $LastName_error= "Numerical Number can not allowed in name";
}

if (empty($email)){
    $email_error = "please enter a valid email";
}elseif(strlen($email) - strrpos($email, '.') <= 2 || strlen($email) - strrpos($email, '.') > 6){
    $email_error = "please enter the email with the damoin number between 2 to 5 ";
}


if(empty($password)){
    $password_error = "please enter a valid password";
}elseif(strlen($password)< 12){
    $password_error = "password should be at least 12 characters";
}elseif(  ! (preg_match( "`[A-Z]`",$password)) ){
    $password_error = "the passwaord should include at least one upper case letter";
}elseif(  ! (preg_match( "`[a-z]`",$password)) ){
    $password_error = "the passwaord should include at least one lower case letter";

}elseif(  ! (preg_match( "/\W/",$password)) ){
    $password_error = "the passwaord should include at least one special character";
}elseif(  ! (preg_match( "`[0-9]`",$password)) ){
    $password_error = "the passwaord should include at least one number";
}

if(empty($confirmPassword)){
    $cp_error = "please enter a valid confirm Password";
}elseif($password !== $confirmPassword){
    $cp_error = "the two password did not match";
}

$valid = !isset($FirstName_error) && !isset($LastName_error) && !isset($email_error) && !isset($password_error) && !isset($cp_error) ;

if($valid){
  echo'<form method="POST" action="welcome.php"> header("location: welcome.php? name=$Firstname"';
    header("location: welcome.php? name=$Firstname");
}
}
?>



<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main class = "min-vh-100 bg-light">

  
  <h7 class="text-center"> <br></h7>
  <h7 class="text-center"> <br></h7>
  <h7 class="text-center"> <br></h7>
  <h7 class="text-center"> <br></h7>
  <h2 class="text-center">Checkout Item</h2> 
 
    <div class = "vh-100 d-flex justify-content-center align-content-center">
    

    <form class="align-items-center" action="" method="post">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">First Name</label>
    <input type="text" class="form-control" id="inputName" aria-describedby="emailHelp" name="FirstName" value ="<?php echo htmlspecialchars($FirstName)?>" action="welcome.php" method="post">
    <div id="emailHelp" class="form-text"></div>

    <?php if(isset($FirstName_error))echo $FirstName_error; ?>
  
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="LastName" value ="<?php echo htmlspecialchars($LastName)?>">
    <div id="emailHelp" class="form-text"></div>

    <?php if(isset($LastName_error))echo $LastName_error; ?>

  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Iventory</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Iventory" value ="<?php echo htmlspecialchars($password)?>">
    <div id="emailHelp" class="form-text"></div>

    <?php if(isset($password_error))echo $password_error; ?>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">QTY</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="ConfirmPassword" value ="<?php echo htmlspecialchars($confirmPassword)?>">
   
    <?php if(isset($cp_error))echo $cp_error; ?>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">E-mail</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="E-mail" value ="<?php echo htmlspecialchars($email)?>">
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
</body>

</html>