<?php
  session_start();
  require "../includes/header.php";
  require_once "../includes/db-connection.php";

  if (isset($_GET['empty-input'])) {
    if ($_GET['empty-input'] == 1) {
      $message = "<p class='alert alert-warning'>Please fill out all required fields.</p>";
    }
  }

  if (isset($_GET['invalid-name'])) {
    if ($_GET['invalid-name'] == 1) {
      $message = "<p class='alert alert-warning'>Please enter a valid name.</p>";
    }
  }

  if (isset($_GET['invalid-email'])) {
    if ($_GET['invalid-email'] == 1) {
      $message = "<p class='alert alert-warning'>Please enter a valid email.</p>";
    }
  }

  if (isset($_GET['insert-error'])) {
    if ($_GET['insert-error'] == 1) {
      $message = "<p class='alert alert-warning'>Failed to place an order.</p>";
    }
  }

  if (isset($_GET['invalid-date'])) {
    if ($_GET['invalid-date'] == 2) {
      $message = "<p class='alert alert-warning'>Maximum duration for a loan is 30 days.</p>";
    }

    if ($_GET['invalid-date'] == 1) {
      $message = "<p class='alert alert-warning'>We need at lease 2 days in advance to process your request.</p>";
    }
  }

  if (isset($_POST['place-order'])) {
    $fullName = htmlspecialchars(stripslashes(trim($_POST['full-name'])));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $program = htmlspecialchars(stripslashes(trim($_POST['program'])));
    $dateNeededString = $_POST['date-needed'];
    $purpose = $_POST['purpose'];
    $returnDateString = $_POST['return-date'];

    if (empty($fullName) || empty($email) || empty($returnDateString)) {
      header("Location: checkout.php?empty-input=1");
      exit();
    }

    $nameValidator = "/^[a-zA-Z]{2,}(?: [a-zA-Z]+){0,5}$/";
    $emailValidator = "/^[\w\-\.]+@dal.ca$/";

    if (preg_match($nameValidator, $fullName) != 1) {
      header("Location: checkout.php?invalid-name=1");
      exit();
    }

    if (preg_match($emailValidator, $email) != 1) {
      header("Location: checkout.php?invalid-email=1");
      exit();
    }

    $dateNeeded = date("Y-m-d", strtotime($dateNeededString));
    $minDate = date("Y-m-d", strtotime("+2 days", strtotime("now")));

    if (($minDate <= $dateNeeded) != 1) {
      header("Location: checkout.php?invalid-date=1");
      exit();
    }

    $returnDate = date("Y-m-d", strtotime($returnDateString));
    $maxDate = date("Y-m-d", strtotime("+30 days", strtotime("now")));

    if (($maxDate > $returnDate) != 1) {
      header("Location: checkout.php?invalid-date=2");
      exit();
    }

    if (strcmp($purpose, "other") == 0) {
      $purpose = htmlspecialchars(stripslashes(trim($_POST['other'])));;
    }

    $itemList = json_encode($_SESSION['cart']);
    $insertQuery = "INSERT INTO `order` VALUES(NULL, '$itemList', '$fullName', '$email', '$program', '$dateNeeded', '$purpose', '$returnDate', 0, 0);";

    $insertResult = $conn->query($insertQuery);

    if ($insertQuery) {
      foreach($_SESSION['cart'] as $itemID => $itemQuant) {
        $updateQuery = "UPDATE `equipment_type`
        SET quantity = quantity - $itemQuant
        WHERE id='$itemID';";

        $updateResult = $conn->query($updateQuery);
      }
      $_SESSION['cart'] = array();
      header("Location: confirmation.php");
      exit();
    } else {
      header("Location: checkout.php?insert-error=1");
      exit();
    }
  }
?>

  <main class="search-res">
    <div class="py-2 text-center">
      <h2>Checkout</h2>
      <p class="lead">Please fill out the following fields:</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-secondary">Your cart</span>
          <span class="badge bg-secondary rounded-pill"><?php
            if (isset($_SESSION['cart'])) {
                echo sizeof($_SESSION['cart']);
            } else {
                echo 0;
            }
        ?></span>
        </h4>
        <ul class="list-group mb-3">
          <?php
            foreach($_SESSION['cart'] as $itemID => $itemQuant) {
              $itemQuery = "SELECT * 
              FROM `equipment_type`
              WHERE id='$itemID';";
    
              $itemResult = $conn->query($itemQuery);
              $itemInfo = $itemResult->fetch_assoc();
    
              $description = $itemInfo['description'];
          ?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?php echo $description; ?></h6>
              <small class="text-muted"><?php echo "Quantity: $itemQuant"; ?></small>
            </div>
          </li>
          <?php
            }
          ?>
        </ul>
      <a href="shopping-cart.php" class="w-40 btn btn-warning">Go back to cart</a>

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Your information</h4>
        <form method="post" action="checkout.php" class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-12">
              <label for="fullName" class="form-label">Full name <span class="text-muted">(Required)</span></label>
              <input type="text" class="form-control" id="fullName" placeholder="Apple Smith" name="full-name" required>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Required - has to be a Dal email with @dal.ca)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@dal.ca" required>
            </div>

            <div class="col-12">
              <label for="program" class="form-label">Program of Study <span class="text-muted">(Required)</span></label>
              <input type="text" class="form-control" name="program" id="program" placeholder="e.g. Bachelor of Applied Computer Science" required>
            </div>

            <div class="col-12">
              <label for="date-needed" class="form-label">Date needed <span class="text-muted">(Required - at least 2 days in advance.)</span></label>
              <input type="date" class="form-control" id="date-needed" name="date-needed" min="<?php echo date("Y-m-d"); ?>" required>
            </div>

            <div class="col-12">
              <label for="purpose" class="form-label">For what purpose are you borrowing this item/these items?  <span class="text-muted">(Required)</span></label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="purpose" value="In-classroom use">
                <label class="form-check-label" for="purpose">
                  In-classroom use
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="purpose" value="For use outside the classroom (i.e., in community), to fulfill a course requirement">
                <label class="form-check-label" for="purpose">
                  For use outside the classroom (i.e., in community), to fulfill a course requirement 
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="purpose" value="For use with an extracurricular group on campus (i.e., SAHHPer)">
                <label class="form-check-label" for="purpose">
                  For use with an extracurricular group on campus (i.e., SAHHPer)  
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="purpose" value="For use in a volunteer or work placement">
                <label class="form-check-label" for="purpose">
                  For use in a volunteer or work placement   
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="purpose" value="For personal use">
                <label class="form-check-label" for="purpose">
                  For personal use    
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="purpose" value="other">
                <label class="form-check-label" for="purpose">
                  Other reason:    
                </label>
                <input type="text" class="form-control" name="other" id="other">
              </div>
            </div>

            <div class="col-12">
              <label for="return-date" class="form-label">Estimated return date <span class="text-muted">(Required)</span></label>
              <input type="date" class="form-control" id="return-date" name="return-date" min="<?php echo date("Y-m-d"); ?>" required>
            </div>

            <?php echo $message; ?>
          </div>

          <hr class="my-4">

          <button class=" w-100 mb-3 btn btn-warning btn-lg" type="submit" name="place-order">Place a request</button>
        </form>
      </div>
    </div>
  </main>


<?php
  require "../includes/footer.php";
?>