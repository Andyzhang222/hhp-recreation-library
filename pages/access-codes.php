<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        $location = 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/index.php?no-access=1';
        header("Location: $location");
        exit();
    }

    require_once "../dbconnect.php";
    require "../includes/header.php";

    $message = "";

    if (isset($_POST['remove-code'])) {
        $code = $_POST['hidden-code'];

        $removeQuery = "DELETE FROM `admin_code` WHERE code='$code';";
		$removeResult = $conn->query($removeQuery);

		if (!$removeResult) {
			$message = "<p class='alert alert-danger text-center'>Failed to delete code.</p>";
		} else {
			$message = "<p class='alert alert-success text-center'>Code removed successfully.</p>";
		}
    }

    $codeQuery = "SELECT * FROM `admin_code`;";
    $codeResult = $conn->query($codeQuery);
?>


<div class="list-group request-info">
    <h3 class="text-center mb-3">Current admin access codes:</h3>
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
                <h6 class="mb-0"><?php echo $row['code']; ?></h6>
                <p class="mb-0 opacity-75"><?php echo "Expiry date: " . $row['expire_date']; ?></p>
            </div>
            <form method="post" action="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/HHPRecLibrary/pages/access-codes.php'; ?>">
                <input type="hidden" name="hidden-code" value="<?php echo $row['code']; ?>">
                <input class="link-primary remove-button" onclick="return confirm('Are you sure you want to remove this access code?')" type="submit" name="remove-code" value="Remove code" />
            </form>
        </div>
    </div>
    <?php } } ?>
</div>

<?php
    require "../includes/footer.php";
?>