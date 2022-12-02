<?php
  session_start();

  require 'includes/header.php';
  require 'includes/db-connection.php';

  if (isset($_GET['search-empty'])) {
    if ($_GET['search-empty'] == 1) {
      echo "<p class='alert alert-warning' id='cart-empty'>Please enter some letters.</p>";
    }
  }
?>

<?php
  require 'pages/inventory.php';
  require 'includes/footer.php'; 
?>