<?php
  session_start();

  if (!isset($_SESSION['admin'])) {
    $location = 'https://'.$_SERVER['HTTP_HOST'].'/HHPRecLibrary/index.php?no-access=1';
    header("Location: $location");
    exit();
  }

  require_once "../dbconnect.php";
  require '../includes/header.php';

  $message = "";

  if (isset($_POST['submit-faq'])) {
    $question = htmlspecialchars(stripslashes(trim($_POST['question'])));
    $answer = htmlspecialchars(stripslashes(trim($_POST['answer'])));

    $insertQuery = "INSERT INTO `faq` VALUES(NULL, '$question', '$answer');";
    $insertResult = $conn->query($insertQuery);

    if ($insertResult) {
      $message = "<p class='alert alert-success text-center'>FAQ added to the database.</p>";
    } else {
      $message = "<p class='alert alert-danger text-center'>Failed to add FAQ.</p>";
    }
  }
?>

<main class="request-info">
  <div class="py-2 text-center">
    <?php echo $message; ?>
    <h2>Add new FAQ</h2>
  </div>
  <form class="needs-validation" method="post" action="add-faq.php">
    <div class="row g-3">
        <div class="col-12">
            <label for="question" class="form-label">Enter the question here:</label>
            <input type="text" class="form-control" id="question" name="question" required>
        </div>

        <div class="col-12">
            <label for="answer" class="form-label">Enter the answer here:</label>
            <textarea class="form-control" id="answer" name="answer" rows="8" required></textarea>
        </div>
    </div>

    <button class="w-100 btn btn-warning btn-lg mt-4" type="submit" name="submit-faq">Add FAQ</button>
  </form>
</main>

<?php
  require "../includes/footer.php";
?>