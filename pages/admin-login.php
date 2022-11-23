<?php
  session_start();
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
          echo "<p class='alert alert-danger' id='wrong-password'>Access denied. Please contact administrators for access.</p>";
        }
      }

      if (isset($_GET["empty-input"])) {
        if ($_GET["empty-input"] == 1) {
          echo "<p class='alert alert-danger' id='empty-input'>No code entered.</p>";
        }
      }
    ?>
    
    <input id="submit-code" class="btn btn-lg btn-warning" type="submit" value="Submit" name="submit-admin-code">
  </form>
</main>

<?php
  require "../includes/footer.php";
?>