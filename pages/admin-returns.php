<?php
  session_start();

  if (!isset($_SESSION['admin'])) {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/index.php?no-access=1';
    header("Location: $location");
    exit();
  }
  
  require_once "../dbconnect.php";
  require "../includes/header.php";
?>

<div class="search-res">
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Unprocessed returns</h6>
    <?php
    $returnQuery = "SELECT * FROM `returns` WHERE processed=0;";
    $returnResult = $conn->query($returnQuery);

    if ($returnResult->num_rows==0) {
      ?>
      <strong class="text-gray-dark">No returns need to be processed.</strong>
      <?php
    } else {
        while ($row = $returnResult->fetch_assoc()) {
          $return_id = $row['return_id'];
          $order_num = $row['order_number'];
    ?>
    <div class="d-flex text-muted pt-3">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/pages/individual-return.php?returnID=' . $return_id; ?>" class="text-gray-dark">Return ID: <?php echo $return_id; ?></a>
          <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/pages/individual-return.php?returnID=' . $return_id; ?>">View return</a>
        </div>
        <span class="d-block"><?php echo $row['return_date']; ?></span>
      </div>
    </div>
    <?php } } ?>
  </div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Processed returns</h6>
    <?php
    $returnQuery = "SELECT * FROM `returns` WHERE processed=1;";
    $returnResult = $conn->query($returnQuery);

    if ($returnResult->num_rows==0) {
      ?>
      <strong class="text-gray-dark">No processed returns.</strong>
      <?php
    } else {
        while ($row = $returnResult->fetch_assoc()) {
          $return_id = $row['return_id'];
          $order_num = $row['order_number'];
    ?>
    <div class="d-flex text-muted pt-3">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/pages/processed-return.php?returnID=' . $return_id; ?>" class="text-gray-dark">Return ID: <?php echo $return_id; ?></a>
          <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/pages/processed-return.php?returnID=' . $return_id; ?>">View return</a>
        </div>
        <span class="d-block"><?php echo $row['return_date']; ?></span>
      </div>
    </div>
    <?php } } ?>
  </div>
</div>

<?php
  require "../includes/footer.php";
?>