<?php
  session_start();

  if (!isset($_SESSION['admin'])) {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/index.php?no-access=1';
    header("Location: $location");
    exit();
  }

  require_once "../dbconnect.php";
  require '../includes/header.php';

  $message = "";

  if (isset($_POST['submit-code'])) {
    $newCode = htmlspecialchars(stripslashes(trim($_POST['new-code'])));
    $expiryDate = date("Y-m-d", strtotime($_POST['expiry-date']));

    $insertQuery = "INSERT INTO `admin_code` VALUES('$newCode', CURDATE(), '$expiryDate');";
    $insertResult = $conn->query($insertQuery);

    if ($insertResult) {
      $message = "<p class='alert alert-success text-center'>Code added to the database.</p>";
    } else {
      $message = "<p class='alert alert-danger text-center'>Failed to add code.</p>";
    }
  }
?>

<main class="request-info">
  <div class="py-2 text-center">
    <?php echo $message; ?>
    <h2>Add new admin code</h2>
  </div>
  <form class="needs-validation" method="post" action="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/HHPRecLibrary/pages/add-code.php'; ?>">
    <div class="row g-3">
      <div class="col-12">
        <label for="new-code" class="form-label">Enter new code here:</label>
        <input type="text" class="form-control" id="new-code" name="new-code" required>
      </div>

      <div class="col-12">
        <label for="expiry-date" class="form-label">Expiry date</label>
        <input type="date" class="form-control" id="expiry-date" name="expiry-date" min="<?php echo date("Y-m-d"); ?>" required>
      </div>
    </div>

    <button class="w-100 btn btn-warning btn-lg mt-4" type="submit" name="submit-code">Add code</button>
  </form>
</main>

<?php
  require "../includes/footer.php";
?>