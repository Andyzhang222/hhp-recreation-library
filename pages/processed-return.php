<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php?no-access=1");
        exit();
    }

    require_once "../includes/db-connection.php";
    require "../includes/header.php";

    $message = "";
    if (isset($_GET['success'])) {
        if ($_GET['success'] == 1) {
            $message = "<p class='alert alert-success text-center'>Return processed successfully.</p>";
        }
    }

    if (isset($_GET['returnID'])) {
        $return_id = $_GET['returnID'];
        $returnQuery = "SELECT * FROM `returns` WHERE return_id='$return_id';";
        $returnResult = $conn->query($returnQuery);
        $returnInfo = $returnResult->fetch_assoc();

        $order_num = $returnInfo['order_number'];
        $requestQuery = "SELECT * FROM `order` WHERE order_number='$order_num';";
        $requestResult = $conn->query($requestQuery);
        $requestInfo = $requestResult->fetch_assoc();
        $itemList = json_decode($requestInfo['item_list'], true);
?>

<div class="request-info">
    <?php echo $message; ?>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Order information</h6>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-dark">Full name</strong>
                </div>
                <span class="d-block"><?php echo $requestInfo['borrower_name']; ?></span>
            </div>
        </div>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-dark">Email</strong>
                </div>
                <span class="d-block"><?php echo $requestInfo['borrower_email']; ?></span>
            </div>
        </div>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-dark">Program of Study</strong>
                </div>
                <span class="d-block"><?php echo $requestInfo['study_program']; ?></span>
            </div>
        </div>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-dark">Purpose</strong>
                </div>
                <span class="d-block"><?php echo $requestInfo['purpose']; ?></span>
            </div>
        </div>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-dark">Estimated return date</strong>
                </div>
                <span class="d-block"><?php echo $requestInfo['return_date']; ?></span>
            </div>
        </div>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-dark">Actual return date</strong>
                </div>
                <span class="d-block"><?php echo $returnInfo['return_date']; ?></span>
            </div>
        </div>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-dark">Notes</strong>
                </div>
                <span class="d-block"><?php echo $returnInfo['notes']; ?></span>
            </div>
        </div>
    </div>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Equipment in the order</h6>
        <?php
            foreach($itemList as $itemID => $itemQuant) {
                $itemQuery = "SELECT * 
                FROM `equipment_type`
                WHERE id='$itemID';";
        
                $itemResult = $conn->query($itemQuery);
                $itemInfo = $itemResult->fetch_assoc();
        
                $description = $itemInfo['description'];
                $code = $itemInfo['code'];
                $imageSrc = "../img/item-images/" . $code . ".png";
        ?>
        <div class="d-flex text-muted pt-3">
            <img src="<?php echo $imageSrc; ?>" alt="<?php echo $description; ?>" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32">

            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-dark"><?php echo $description; ?></strong>
                </div>
                <span class="d-block"><?php echo $itemQuant; ?></span>
            </div>
        </div>
    <?php } ?>
    </div>

<?php
    }
    require "../includes/footer.php";
?>