<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php?no-access=1");
        exit();
    }

    require_once "../dbconnect.php";
    require "../includes/header.php";

    $message = "";

    if (isset($_POST['remove-code'])) {
        $code = $_POST['hidden-code'];

        $removeQuery = "DELETE FROM `locker_code` WHERE code_combination='$code';";
		$removeResult = $conn->query($removeQuery);

		if (!$removeResult) {
			$message = "<p class='alert alert-danger text-center'>Failed to delete code.</p>";
		} else {
			$message = "<p class='alert alert-success text-center'>Code removed successfully.</p>";
		}
    }

    if (isset($_POST['submit-code'])) {
        $newCode = htmlspecialchars(stripslashes(trim($_POST['new-code'])));
    
        $insertQuery = "INSERT INTO `locker_code` VALUES('$newCode');";
        $insertResult = $conn->query($insertQuery);
    
        if ($insertResult) {
          $message = "<p class='alert alert-success text-center'>Code added to the database.</p>";
        } else {
          $message = "<p class='alert alert-danger text-center'>Failed to add code.</p>";
        }
    }

    $codeQuery = "SELECT * FROM `locker_code`;";
    $codeResult = $conn->query($codeQuery);
?>


<div class="list-group request-info">
    <h3 class="text-center mb-3">Current storage locker code:</h3>
    <?php echo $message; ?>
    <?php
        if ($codeResult->num_rows == 0) {
            echo "<p class='alert alert-warning' id='cart-empty'>There are no access codes.</p>";
        } else {
            while ($row = $codeResult->fetch_assoc()) {
    ?>
    <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0"><?php echo $row['code_combination']; ?></h6>
            </div>
            <form method="post" action="storage-code.php">
                <input type="hidden" name="hidden-code" value="<?php echo $row['code_combination']; ?>">
                <input class="link-primary remove-button" onclick="return confirm('Are you sure you want to remove this access code?')" type="submit" name="remove-code" value="Remove code" />
            </form>
        </div>
    </div>
    <?php } } ?>

    <h3 class="text-center mt-4">Add new locker code</h3>
    <form class="needs-validation" method="post" action="storage-code.php">
        <div class="row g-3">
            <div class="col-12">
            <label for="new-code" class="form-label text-center">Enter new locker code here:</label>
            <input type="text" class="form-control" id="new-code" name="new-code" required>
            </div>
        </div>

        <button class="w-100 btn btn-warning btn-lg mt-4" type="submit" name="submit-code">Add code</button>
    </form>
</div>

<?php
    require "../includes/footer.php";
?>