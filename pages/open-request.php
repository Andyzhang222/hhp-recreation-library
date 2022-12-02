<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php?no-access=1");
        exit();
    }

    require_once "../includes/db-connection.php";
    require "../includes/header.php";

    if (isset($_POST['approve-request'])) {
        $order_id = $_POST['hidden-id'];
        $approveQuery = "UPDATE `order`
        SET order_processed = 1
        WHERE order_number='$order_id';";
        $approveResult = $conn->query($approveQuery);
        $location1 = "active-request.php?id=" . $order_id;
        $location2 = "open-request.php?id=" . $order_id . "&approve-fail=1";

        if ($approveResult) {
            header("Location: $location1");
            exit();
        } else {
            header("Location: $location2");
            exit();
        }
    }

    if (isset($_GET['approve-fail'])) {
        if ($_GET['approve-fail'] == 1) {
            echo "<p class='alert alert-warning'>Fail to approve this request.</p>";
        }
    }

    if (isset($_GET['id'])) {
        $order_num = $_GET['id'];
        $requestQuery = "SELECT * FROM `order` WHERE order_number='$order_num';";
        $requestResult = $conn->query($requestQuery);
        $requestInfo = $requestResult->fetch_assoc();
        $itemList = json_decode($requestInfo['item_list'], true);
    
?>
<div class="request-info">
    <h2 class="text-center"><?php echo "Request number: " . $order_num; ?></h2>
    <table class="table table-sm">
        <tbody>
            <tr>
                <th scope="row">Full name</th>
                <td><?php echo $requestInfo['borrower_name']; ?></td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td><?php echo $requestInfo['borrower_email']; ?></td>
            </tr>
            <tr>
                <th scope="row">List of requested equipment</th>
                <td>
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
                                <div class="list-group-item list-group-item-action d-flex justify-content-between mb-3" aria-current="true">
                                    <div class="d-flex gap-2 w-100 justify-content-start align-items-center" method="POST" action="shopping-cart.php">
                                        <img class="item-in-cart" src="<?php echo $imageSrc; ?>" alt="<?php echo $description; ?>" class="rounded-circle flex-shrink-0">
                                        <div>
                                            <h6 class="mb-0"><?php echo $description; ?></h6>
                                            <small class="text-muted"><?php echo "Quantity: $itemQuant"; ?></small>
                                        </div>
                                    </div>
                                </div>

                            <?php
                        } 
                    ?>
                </td>
            </tr>
            <tr>
                <th scope="row">Program of Study</th>
                <td><?php echo $requestInfo['study_program']; ?></td>
            </tr>
            <tr>
                <th scope="row">Date needed</th>
                <td><?php echo $requestInfo['date_needed']; ?></td>
            </tr>
            <tr>
                <th scope="row">Purpose</th>
                <td><?php echo $requestInfo['purpose']; ?></td>
            </tr>
            <tr>
                <th scope="row">Estimated return date</th>
                <td><?php echo $requestInfo['return_date']; ?></td>
            </tr>
        </tbody>
    </table>

    <div class="d-grid mt-3 gap-2 d-sm-flex justify-content-sm-center mb-5">
        <form method="post" action="open-request.php">
            <input type="submit" name="approve-request"class="btn btn-warning btn-lg px-4 me-sm-3" value="Approve request"/>
            <input type="submit" name="cancel-request" class="btn btn-outline-secondary btn-lg px-4" value="Cancel request"/>
            <input type="hidden" name="hidden-id" value="<?php echo $requestInfo['order_number']; ?>">
        </form>
    </div>
</div>
<?php
    }
  require "../includes/footer.php";
?>