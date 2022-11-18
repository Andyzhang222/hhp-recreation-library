<?php
  require_once "../includes/db-connection.php";
  require "../includes/header.php";

  if (isset($_GET["id"])) {
    $itemID = $_GET["id"];

    $itemQuery = "SELECT * 
      FROM `equipment_type`
      WHERE id=$itemID;";

    $itemResult = $conn->query($itemQuery);

    if ($itemResult->num_rows == 0) {
      echo "<p class='text-dark'>404 Item Not Found</p>";
    } else {
      $itemInfo = $itemResult->fetch_assoc();

      $category = $itemInfo['category'];
      $description = $itemInfo['description'];
      $quantity = $itemInfo['quantity'];
      $code = $itemInfo['code'];
      $imageSrc = "../img/item-images/" . $code . ".png";

      $retrieveCatQuery = "SELECT * 
      FROM `equipment_category` 
      WHERE id = $category;";

      $retrieveCatResult = $conn->query($retrieveCatQuery);
      if ($retrieveCatResult->num_rows == 0) {
        echo "<p class='text-dark'>No category with id " . $i . " exist.</p>";
      } else {
        $queryResult = $retrieveCatResult->fetch_assoc();
        $categoryDesc = $queryResult['description'];
      }
    }

  
?>

<div class="row featurette item-display">
  <div class="col-md-7 order-md-2 item-desc">
    <h2 class="featurette-heading fw-normal lh-1"><?php echo $description ?></h2>
    <p class="lead">Category: <?php echo $categoryDesc; ?></p>
    <p class="lead">Quantity available: <?php echo $quantity; ?></p>

    <hr>
    <br>

    <select class="form-select select-quant" aria-label="Default select example">
      <option value="" selected>Select quantity</option>
      <?php
        for ($i=1; $i<=$quantity; $i++) {
          echo "<option value='$i'>$i</option>";
        }
      ?>
    </select>
    
    <button type="button" id="form-page" class="btn-styling btn btn-warning">Request item</button>
  </div>
  <div class="col-md-5 order-md-1">
    <img class="item-image" src="<?php echo $imageSrc; ?>" alt="<?php echo $description; ?>" />
  </div>
</div>

<?php
  }
    require "../includes/footer.php";
?>

<script type="text/javascript">
    document.getElementById("form-page").onclick = function () {
        location.href = "form-page.php";
    };
</script>