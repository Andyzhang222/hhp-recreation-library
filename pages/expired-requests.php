<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php?no-access=1");
        exit();
    }

    require_once "../includes/db-connection.php";
    require "../includes/header.php";
?>
<div class="search-res">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Expired requests</h6>
        <?php
        $expireQuery = "SELECT * FROM `order` WHERE CURDATE() > return_date;";
        $expireResult = $conn->query($expireQuery);

        if ($expireResult->num_rows==0) {
            ?>
            <strong class="text-gray-dark">No expired requests.</strong>
            <?php
        } else {
            while ($row = $expireResult->fetch_assoc()) {
                $order_num = $row['order_number'];
        ?>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <a href="expired-view.php?id=<?php echo $order_num; ?>" class="text-gray-dark">Request number <?php echo $order_num; ?></a>
                    <a href="expired-view.php?id=<?php echo $order_num; ?>">View request</a>
                </div>
                <span class="d-block"><?php echo $row['borrower_email']; ?></span>
            </div>
        </div>
        <?php } } ?>
    </div>
</div>

<?php
  require "../includes/footer.php";
?>