<?php
session_start();
  require "../includes/header.php";
 
  require_once "../includes/db-connection.php";

 
//  include"../pages/checkout.php";

if(isset($_POST['regBtn'])){



  
  $to = "reclib@dal.ca";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" . "CC: somebodyelse@exampl.com";

mail($to,$subject,$txt,$headers);


echo "<p>send successfully!</p>";

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
    <?php
 
?>
  </header>
  <main>

  <p class="text-center display-1">
    <?php echo $name?> Thanks! <br></P>

  <p class="text-center display-1">
    <?php echo $_SESSION["name"]?> checkout successfully!</P>

    <form class="row" method="post">

  
  <div class="col-4">
    
  </div>

  <div class="col-md-4">
    
  </div>

  <div class="col-md-4">
    
  </div>

  <p><br></p>
  
  <p><br></p>

  <div class="col-md-6">
    

  </div>

  <div class="col-md-6">
    
  </div>

  

<p><br></p>
  <div class="col-md-3"> </div>
  <div class="col-4 mx-auto">
    <button class="btn btn-primary " name="regBtn"  type="submit">send the locker code to your email!</button>
  </div>
</form>
  

</main>


  </main>

 
  <footer>
  <?php
  // require 'pages/inventory.php';
  require '../includes/footer.php'; 
?>

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