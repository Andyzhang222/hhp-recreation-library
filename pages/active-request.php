<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        $location = 'https://'.$_SERVER['HTTP_HOST'].'/HHPRecLibrary/index.php?no-access=1';
        header("Location: $location");
        exit();
    }

    require_once "../dbconnect.php";
    require "../includes/header.php";

    if (isset($_GET['id'])) {
        $order_num = $_GET['id'];
        $requestQuery = "SELECT * FROM `order` WHERE order_number='$order_num';";
        $requestResult = $conn->query($requestQuery);
        $requestInfo = $requestResult->fetch_assoc();
        $itemList = json_decode($requestInfo['item_list'], true);
    
?>
<div class="request-info">
    <h2 class="text-center"><?php echo "Order number: " . $order_num; ?></h2>
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
                            $imageSrc = 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/img/item-images/' . $code . '.png';
                            ?>
                                <div class="list-group-item list-group-item-action d-flex justify-content-between mb-3" aria-current="true">
                                    <div class="d-flex gap-2 w-100 justify-content-start align-items-center">
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
</div>
<?php
    }
  require "../includes/footer.php";
?>