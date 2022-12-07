<?php
	session_start();

	if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php?no-access=1");
        exit();
    }

	require_once "../dbconnect.php";
    require '../includes/header.php';

	$message = "";
	if (isset($_POST['remove-button'])) {
		$itemID = $_POST['id'];
		$removeQuery = "DELETE FROM `equipment_type` WHERE id='$itemID';";
		$removeResult = $conn->query($removeQuery);

		if (!$removeResult) {
			$message = "<p class='alert alert-danger text-center'>Failed to remove item.</p>";
		} else {
			$message = "<p class='alert alert-success text-center'>Item removed.</p>";
		}
	}
?>
<div class="request-info">
	<div class="my-3 p-3 bg-body rounded shadow-sm">
		<?php echo $message; ?>
		<h6 class="border-bottom pb-2 mb-0">Remove available equipment</h6>
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
			<div class="d-flex justify-content-between">
				<strong class="text-dark"><?php echo $description; ?></strong>
				<form method="post" action="remove-item.php">
					<input type="hidden" name="id" value="<?php echo $item_id; ?>" />
					<input onclick="return confirm('Are you sure you want to delete this item from the database? Once deleted, you will not be able to recover this action.')" class="link-primary remove-button" type="submit" name="remove-button" value="Remove item" />
				</form>
			</div>
			<span class="d-block"><?php echo "Quantity: " . $row['quantity']; ?></span>
		</div>
		</div>
		<?php } ?>
	</div>
</div>

<?php
	require "../includes/footer.php";
?>
