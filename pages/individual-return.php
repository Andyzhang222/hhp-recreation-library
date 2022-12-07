<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php?no-access=1");
        exit();
    }

    require_once "../dbconnect.php";
    require "../includes/header.php";

    $message = "";
    if (isset($_GET['mark-damaged'])) {
        if ($_GET['mark-damaged'] == "success") {
            $message = "<p class='alert alert-success text-center'>Item marked as damaged.</p>";
        }
    }

    if (!isset($_SESSION['damaged-items'])) {
        $_SESSION['damaged-items'] = array();
    }

    if (isset($_POST['mark-damaged'])) {
        $post_item_id = $_POST['hidden-item-id'];
        $post_damaged_quant = $_POST['damaged-quant'];
        $post_return_id = $_POST['hidden-return-id'];
        $_SESSION['damaged-items'][$post_item_id] = $post_damaged_quant;
        $location = "individual-return.php?returnID=" . $post_return_id . "&mark-damaged=success";
        header("Location: $location");
        exit();
    }

    if (isset($_POST['approve-request'])) {
        $post_order_num = $_POST['hidden-order-id'];
        $post_return_id = $_POST['hidden-return-id'];
        $requestQuery = "SELECT * FROM `order` WHERE order_number='$post_order_num';";
        $requestResult = $conn->query($requestQuery);
        $requestInfo = $requestResult->fetch_assoc();
        $itemList = json_decode($requestInfo['item_list'], true);
        
        foreach($_SESSION['damaged-items'] as $damageID => $damageQuant) {
            $itemList[$damageID] -= $damageQuant;
        }

        foreach($itemList as $itemID => $itemQuant) {
            $updateQuery = "UPDATE `equipment_type` SET quantity=quantity+$itemQuant WHERE id='$itemID';";
		    $updateResult = $conn->query($updateQuery);
        }

        $updateOrderQuery = "UPDATE `order` SET order_returned=1 WHERE order_number='$post_order_num';";
        $updateOrderResult = $conn->query($updateOrderQuery);

        $updateReturnQuery = "UPDATE `returns` SET processed=1 WHERE return_id='$post_return_id';";
        $updateReturnResult = $conn->query($updateReturnQuery);
        $_SESSION['damaged-items'] = array();
        $location = "processed-return.php?returnID=" . $post_return_id . "&success=1";
        header("Location: $location");
        exit();
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
                <form method="post" action="individual-return.php">
                    <div class="d-flex justify-content-between">
                        <strong class="text-dark"><?php echo $description; ?></strong>
                        <input type="hidden" name="hidden-item-id" value="<?php echo $itemID; ?>">
                        <input type="hidden" name="hidden-return-id" value="<?php echo $return_id; ?>">
                        <input class="link-primary remove-button"  type="submit" name="mark-damaged" value="Mark item as damaged" />
                    </div>
                    <?php
                        if (array_key_exists($itemID, $_SESSION['damaged-items'])) {
                            echo "<span class='d-block'>" . $_SESSION['damaged-items'][$itemID] . " " . $description . " marked as damaged</span>";
                        }
                    ?>
                    <select class="form-select w-25" name="damaged-quant">
                    <?php
                        for ($i=1; $i<=$itemQuant; $i++) {
                            if ($i == $itemQuant) {
                                echo "<option value='$i' selected>$i</option>";
                            } else {
                                echo "<option value='$i'>$i</option>";
                            }
                        }
                    ?>
                    </select>
                </form>
            </div>
        </div>
    <?php } ?>
    </div>

    <div class="d-grid mt-3 mb-3 gap-2 d-sm-flex justify-content-sm-center mb-5">
        <form method="post" action="individual-return.php">
            <input type="hidden" name="hidden-order-id" value="<?php echo $requestInfo['order_number']; ?>">
            <input type="hidden" name="hidden-return-id" value="<?php echo $return_id; ?>">
            <input type="submit" name="approve-request"class="btn btn-warning btn-lg px-4 me-sm-3" value="Process return"/>
        </form>
    </div>
</div>

<?php

    }
  require "../includes/footer.php";
?>