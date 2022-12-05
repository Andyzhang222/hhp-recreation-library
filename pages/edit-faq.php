<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php?no-access=1");
        exit();
    }

    require_once "../includes/db-connection.php";
    require "../includes/header.php";

    if (isset($_GET['success'])) {
        if ($_GET['success'] == 1) {
            echo "<p class='alert alert-success'>FAQ updated.</p>";
        }

        if ($_GET['success'] == 0) {
            echo "<p class='alert alert-danger'>Failed to update FAQ</p>";
        }
    }

    if (isset($_POST['edit-faq'])) {
        $faqID = $_POST['hidden-id'];
        $newQuestion = htmlspecialchars(stripslashes(trim($_POST['question'])));
        $newAnswer = htmlspecialchars(stripslashes(trim($_POST['answer'])));
		$updateQuery = "UPDATE `faq` SET question='$newQuestion', answer='$newAnswer' WHERE id='$faqID';";
		$updateResult = $conn->query($updateQuery);

        if ($updateResult) {
            $location = "edit-faq.php?faqID=" . $faqID . "&success=1";
            header("Location: $location");
            exit();
        } else {
            $location = "edit-faq.php?faqID=" . $faqID . "&success=0";
            header("Location: $location");
            exit();
        }
    }

    if (isset($_GET['faqID'])) {
        $faqID = $_GET['faqID'];

        $faqQuery = "SELECT * FROM `faq` WHERE id='$faqID';";
        $faqResult = $conn->query($faqQuery);

        $faq = $faqResult->fetch_assoc();
?>

<main class="request-info">
  <div class="py-2 text-center">
    <h2>Update FAQ</h2>
  </div>

  <form class="needs-validation" method="post" action="edit-faq.php">
    <div class="row g-3">
        <div class="col-12">
            <label for="question" class="form-label">Edit the question:</label>
            <textarea class="form-control" id="question" name="question" rows="8" required><?php echo $faq['question']; ?></textarea>
        </div>

        <div class="col-12">
            <label for="answer" class="form-label">Edit the answer:</label>
            <textarea class="form-control" id="answer" name="answer" rows="8" required><?php echo $faq['answer']; ?></textarea>
        </div>
    </div>

    <input type="hidden" name="hidden-id" value="<?php echo $faqID; ?>" />
    <button class="w-100 btn btn-warning btn-lg mt-4 mb-4" type="submit" name="edit-faq">Update FAQ</button>
  </form>
</main>

<?php
    }
    require "../includes/footer.php";
?>