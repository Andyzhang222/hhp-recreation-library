<?php
  session_start();

  if (!isset($_SESSION['admin'])) {
    $location = 'https://'.$_SERVER['HTTP_HOST'].'/HHPRecLibrary/index.php?no-access=1';
    header("Location: $location");
    exit();
  }

  require_once "../dbconnect.php";
  require '../includes/header.php';

  $message = "";

  if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
      $message = "<p class='alert alert-success text-center'>Item added successfully.</p>";
    }

    if ($_GET['success'] == 0) {
      $message = "<p class='alert alert-danger text-center'>Failed to add item. Please try again.</p>";
    }
  }

?>

<main class="request-info">
  <div class="py-2 text-center">
    <?php echo $message; ?>
    <h2>Add new equipment</h2>
  </div>
  <form class="needs-validation" action="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/HHPRecLibrary/includes/add-item-processing.php'; ?>" method="post" enctype="multipart/form-data">
    <div class="row g-3">
      <div class="col-12">
        <label for="category" class="form-label">Category:</label>
          <?php
            $categoryQuery = "SELECT * FROM `equipment_category`;";
            $categoryResult = $conn->query($categoryQuery);

            if ($categoryResult->num_rows == 0) {
          ?>
          <select name="category" class="form-select" disabled>
            <option>No categories..</option>
          </select>
          <?php
            } else {
          ?>
          <select name="category" class="form-select">
            <?php
              while ($row = $categoryResult->fetch_assoc()) {
                $description = $row['description'];
            ?>
            <option><?php echo $description; ?></option>
            <?php } ?>
          </select>
          <?php
            }
          ?>
      </div>

      <div class="col-12">
        <label for="item-name" class="form-label">Item name</label>
        <input type="text" class="form-control" id="item-name" name="item-name" placeholder="e.g Sleeping bag">
      </div>

      <div class="col-12">
        <label for="item-code" class="form-label">Item code</label>
        <input type="text" class="form-control" id="item-code" name="item-code" placeholder="e.g SLEEP_BAG">
      </div>

      <div class="col-12">
        <label for="item-quantity" class="form-label">Item quantity</label>
        <input type="text" class="form-control" id="item-quantity" name="item-quantity">
      </div>

      <div class="col-12">
        <label for="item-image" class="form-label">Upload item image (please make sure the file extension is .png)</label>
        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
      </div>
    </div>

    <button class="w-100 btn btn-warning btn-lg mt-4 mb-4" type="submit" name="submit-item">Add item</button>
  </form>
</main>

<?php
  require "../includes/footer.php";
?>