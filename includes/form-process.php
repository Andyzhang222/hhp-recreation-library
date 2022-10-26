<?php

require_once "db-connection.php";

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


