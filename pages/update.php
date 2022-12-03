<?php
	session_start();

	if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php?no-access=1");
        exit();
    }

    require '../includes/header.php';
    require_once '../includes/db-connection.php';

	$message = "";
	if (isset($_POST['update-button'])) {
        $newQuant = htmlspecialchars(stripslashes(trim($_POST['update-quant'])));
		$itemID = $_POST['id'];
		$updateQuery = "UPDATE `equipment_type` SET quantity='$newQuant' WHERE id='$itemID';";
		$updateResult = $conn->query($updateQuery);

		if (!$updateResult) {
			$message = "<p class='alert alert-success text-center'>Failed to update item quantity.</p>";
		} else {
			$message = "<p class='alert alert-success text-center'>Item updated.</p>";
		}
	}
?>
<div class="request-info">
	<div class="my-3 p-3 bg-body rounded shadow-sm">
		<?php echo $message; ?>
		<h6 class="border-bottom pb-2 mb-0">Update equipment quantity</h6>
		<?php
			$itemQuery = "SELECT * FROM `equipment_type`;";
			$itemResult = $conn->query($itemQuery);
			while ($row = $itemResult->fetch_assoc()) {
				$description = $row['description'];
				$item_id = $row['id'];
				$item_code = $row['code'];
				$imageSrc = "../img/item-images/" . $item_code . ".png";
		?>
		<div class="d-flex text-muted pt-3">
		    <img src="<?php echo $imageSrc; ?>" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"/>

            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <form method="post" action="update.php">
                    <div class="d-flex justify-content-between">
                        <strong class="text-dark"><?php echo $description; ?></strong>
                        <input type="hidden" name="id" value="<?php echo $item_id; ?>" />
                        <input class="link-primary remove-button" type="submit" name="update-button" value="Update quantity" />
                    </div>
                    <span class="d-block">
                        <label for="update-quant">Quantity:</label>
                        <textarea id="update-quant" name="update-quant"><?php echo $row['quantity']; ?></textarea>
                    </span>
                </form>
		    </div>
	    </div>
		<?php } ?>
	</div>
</div>

<?php
	require "../includes/footer.php";
?>