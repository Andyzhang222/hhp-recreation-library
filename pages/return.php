<?php
  session_start();
  require "../includes/header.php";
  require_once "../includes/db-connection.php";

  $message = "";

  if (isset($_GET['success'])) {
    if ($_GET['success'] == 1) {
      $message = "<p class='alert alert-success text-center'>Return submitted successfully.</p>";
    }

    if ($_GET['success'] == 0) {
      $message = "<p class='alert alert-danger text-center'>Failed to submit a return. Please try again.</p>";
    }
  }

  if(isset($_POST['submit-return'])) {
    $order_id = $_POST['order-num'];
    $notes = htmlspecialchars(stripslashes(trim($_POST['notes'])));

    $findOrderQuery = "SELECT * FROM `returns` WHERE order_number = '$order_id' AND order_returned=0;";
    $findOrderResult = $conn->query($findOrderQuery);
    if ($findOrderResult->num_rows == 0) {
      $returnQuery = "INSERT INTO `returns` VALUES(NULL, '$order_id', '$notes', CURDATE(), 0);";
      $returnResult = $conn->query($returnQuery);

      if ($returnResult) {
        header("Location: return.php?success=1");
        exit();
      } else {
        header("Location: return.php?success=0");
        exit();
      }
    } else {
      $message = "<p class='alert alert-warning text-center'>The return process for this order has already started.</p>";
    }
  }

  $orderQuery = "SELECT order_number FROM `order`;";
  $orderResult = $conn->query($orderQuery);
?>
<main class="request-info">
  <div class="py-2 text-center">
    <?php echo $message; ?>
    <h2>Return form</h2>
    <p class="lead">Please fill out the information below:</p>
  </div>
    <form class="needs-validation" method="post" action="return.php">
      <div class="row g-3">
        <div class="col-12">
          <label for="order-num" class="form-label">Your request number:</label>
          <?php
            if ($orderResult->num_rows == 0) {
          ?>
          <select name="order-num" class="form-select" aria-label="Your request number" disabled>
            <option>No orders to return.</option>
          </select>
          <?php
            } else {
          ?>
          <select name="order-num" class="form-select" aria-label="Your request number">
            <?php
              while ($row = $orderResult->fetch_assoc()) {
                $order_num = $row['order_number'];
            ?>
            <option><?php echo $order_num; ?></option>
            <?php } ?>
          </select>
          <?php
            }
          ?>
        </div>

        <div class="col-12">
          <label for="notes" class="form-label">Notes (if any)</label>
          <input type="text" class="form-control" id="notes" name="notes" placeholder="Any damaged or missing item?">
        </div>
      </div>

      <button class="w-100 btn btn-warning btn-lg mt-4" type="submit" name="submit-return">Submit your return</button>
    </form>
</main>

<?php
  require "../includes/footer.php";
?>