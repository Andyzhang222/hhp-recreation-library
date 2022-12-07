<?php
  session_start();

  require_once "dbconnect.php";
  require 'includes/header.php';

  if (isset($_GET['search-empty'])) {
    if ($_GET['search-empty'] == 1) {
      echo "<p class='alert alert-warning' id='cart-empty'>Please enter some letters.</p>";
    }
  }

  if (isset($_GET['no-access'])) {
    if ($_GET['no-access'] == 1) {
      echo "<p class='alert alert-danger' id='cart-empty'>Access denied.</p>";
    }
  }
?>

<?php
  require 'pages/inventory.php';
  require 'includes/footer.php'; 
?>