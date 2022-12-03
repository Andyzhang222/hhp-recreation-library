<?php
  session_start();
  require "../includes/header.php";
  require_once "../includes/db-connection.php";
?>

<div class="search-res">
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Returns</h6>
    <?php
    $returnQuery = "SELECT * FROM `returns`;";
    $returnResult = $conn->query($returnQuery);

    if ($returnResult->num_rows==0) {
      ?>
      <strong class="text-gray-dark">No returns.</strong>
      <?php
    } else {
        while ($row = $returnResult->fetch_assoc()) {
          $return_id = $row['return_id'];
          $order_num = $row['order_number'];
    ?>
    <div class="d-flex text-muted pt-3">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <a href="individual-return.php?returnID=<?php echo $return_id; ?>" class="text-gray-dark">Return ID: <?php echo $return_id; ?></a>
          <a href="individual-return.php?returnID=<?php echo $return_id; ?>">View request</a>
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