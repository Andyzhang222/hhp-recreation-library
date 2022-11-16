<?php
  require "../includes/header.php";
?>

<main class="form-signin m-auto text-center">
  <form method="post" id="admin-form" action="../includes/admin-login-process.php">
    <h1 class="h3 mb-3 fw-normal">Please enter admin code:</h1>

    <div class="form-floating" id="admin-input">
      <input type="text" class="form-control" id="floatingInput" name="code-submitted">
      <label for="floatingInput">Code</label>
    </div>

    <?php
      if (isset($_GET["access-denied"])) {
        if ($_GET["access-denied"] == 1) {
          echo "<p class='lead text-danger text-center'>Access denied. Please contact administrators for access.</p>";
        }
      }
    ?>
    
    <input id="submit-code" class="btn btn-lg btn-warning" type="submit" value="Submit" name="submit-admin-code">
  </form>
</main>

<?php
  require "../includes/footer.php";
?>