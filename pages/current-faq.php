<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php?no-access=1");
        exit();
    }

    require_once "../includes/db-connection.php";
    require "../includes/header.php";

    $message = "";

    if (isset($_POST['delete'])) {
        $post_id = $_POST['hidden-id'];
        $removeQuery = "DELETE FROM `faq` WHERE id = '$post_id';";
        $removeResult = $conn->query($removeQuery);

		if (!$removeResult) {
			$message = "<p class='alert alert-danger text-center'>Failed to remove FAQ.</p>";
		} else {
			$message = "<p class='alert alert-success text-center'>FAQ removed.</p>";
		}
    }

    if (isset($_POST['edit'])) {
        $post_id = $_POST['hidden-id'];
        $location = "edit-faq.php?faqID=" . $post_id;
        header("Location: $location");
        exit();
    }

?>
<div class="search-res">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <?php echo $message; ?>
        <h6 class="border-bottom pb-2 mb-0">Current FAQ</h6>
        <?php
        $faqQuery = "SELECT * FROM `faq`;";
        $faqResult = $conn->query($faqQuery);

        if ($faqResult->num_rows==0) {
            ?>
            <strong class="text-gray-dark">No current FAQ.</strong>
            <?php
        } else {
            while ($row = $faqResult->fetch_assoc()) {
                $question = $row['question'];
                $answer = $row['answer'];
        ?>
        <div class="d-flex text-muted pt-3">
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <p class="text-dark"><?php echo $question; ?></p>
                    <div class="d-flex justify-content-end">
                        <form method="post" action="current-faq.php">
                            <input type="hidden" name="hidden-id" value="<?php echo $row['id']; ?>" />
                            <input class="link-primary remove-button mr-3" type="submit" name="edit" value="Edit FAQ" />
                            <input class="link-primary remove-button" type="submit" name="delete" value="Delete FAQ" />
                        </form>
                    </div>
                </div>
                <span class="d-block"><?php echo $answer; ?></span>
            </div>
        </div>
        <?php } } ?>
    </div>
</div>

<?php
  require "../includes/footer.php";
?>