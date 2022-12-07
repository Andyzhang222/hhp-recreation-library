<?php
    session_start();
    require_once "../dbconnect.php";
    require "../includes/header.php";

    $faqQuery = "SELECT * FROM `faq`;";
    $faqResult = $conn->query($faqQuery);
?>

<main>
    <div class="container py-4">
        <div class="p-5 mb-4 bg-light rounded-3">
            <h3 class="display-5 fw-bold">Frequently Asked Questions</h3>
            <div class="container-fluid py-5">
        <?php
            if ($faqResult->num_rows == 0) {
        ?>
            <h6 class="fw-bold">No FAQ available</h6>
        
        <?php
            } else {
                while ($row = $faqResult->fetch_assoc()) {
        ?>
            <h6 class="fw-bold"><?php echo $row['question']; ?></h6>
            <p><?php echo $row['answer']; ?></p>
        <?php } } ?>
            </div>
        </div>
    </div>
</main>

<?php
  require "../includes/footer.php";
?>