<?php
  session_start();
  require "../includes/header.php";
  require_once "../includes/db-connection.php";

  $message = "";

  if (isset($_POST['clear'])) {
    $_SESSION['cart'] = array();
    header("Location: shopping-cart.php");
  }

  if (isset($_POST['remove'])) {
    unset($_SESSION['cart'][$_POST['remove-id']]);
    header("Location: shopping-cart.php");
  }

  if (isset($_POST['update'])) {
    $id = $_POST['remove-id'];
    $maxQuantity = $_POST['max-quant'];
    $newQuant = stripslashes(htmlspecialchars($_POST['update-quant']));
    if ($newQuant > $maxQuantity) {
      $message = '
      <p class="alert alert-danger text-center">Quantity surpassed quantity available.</p>
      ';
    } else {
      $_SESSION['cart'][$id] = $newQuant;
      header("Location: shopping-cart.php?success=1");
    }
  }
  
?>

<?php
  if (!empty($_SESSION['cart'])) {
?>

<div class="shopping-items">
  <h2 class="text-center">Your cart</h2>
  <div class="list-group">

    <?php
        foreach($_SESSION['cart'] as $itemID => $itemQuant) {
          $itemQuery = "SELECT * 
          FROM `equipment_type`
          WHERE id='$itemID';";

          $itemResult = $conn->query($itemQuery);
          $itemInfo = $itemResult->fetch_assoc();

          $description = $itemInfo['description'];
          $code = $itemInfo['code'];
          $maxQuant = $itemInfo['quantity'];
          $imageSrc = "../img/item-images/" . $code . ".png";

    ?>

    <div class="list-group-item list-group-item-action d-flex justify-content-between mb-3" aria-current="true">
      <form class="d-flex gap-2 w-100 justify-content-between align-items-center" method="POST" action="shopping-cart.php">
        <img class="item-in-cart" src="<?php echo $imageSrc; ?>" alt="<?php echo $description; ?>" class="rounded-circle flex-shrink-0">
        <div>
          <h6 class="mb-0"><?php echo $description; ?></h6>
          <label for="update-quant">Quantity:</label>
          <textarea id="update-quant" name="update-quant"><?php echo $itemQuant; ?></textarea>
        </div>
        <input id='update' class='btn btn-secondary' type='submit' value='Update quantity' name='update'>
        <input id='remove-item' class='btn btn-secondary' type='submit' value='Remove' name='remove'>
        <input type='hidden' name='remove-id' value='<?php echo $itemID; ?>' >
        <input type='hidden' name='max-quant' value='<?php echo $maxQuant; ?>' >
      </form>
    </div>


    <?php
        }
    ?>
  </div>

  <?php
    echo $message;

    if (isset($_GET['success'])) {
      if ($_GET['success'] == 1) {
        echo '<p class="alert alert-success text-center">Cart updated.</p>';
      }
    }
  ?>

  <div class='d-flex justify-content-end button-cart'>
    <form method="POST" action="shopping-cart.php">
      <input id='clear' class='btn btn-lg btn-warning' type='submit' value='Clear cart' name='clear'>
      <a href="checkout.php" id='checkout' class='btn btn-lg btn-success' name='cart-checkout'>Proceed to checkout</a>
    </form>
  </div>
</div>

<?php
  } else {
?>
<div class="shopping-items">
  <h2 class="text-center">Your cart</h2>
  <p class='alert alert-warning' id='cart-empty'>Your cart is empty.</p>
</div>

<?php
  }

  require "../includes/footer.php";
?>