<?php
    session_start();
    require "../includes/header.php";
?>

<div class="px-4 py-5 my-5 text-center confirmation">
    <h1 class="display-5 fw-bold">Order requested successfully!</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">An email will be sent once the request is approved and next steps on how to retrieve the items.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="../index.php" class="btn btn-outline-warning btn-lg px-4">Go back to homepage.</a>
        </div>
    </div>
</div>

<?php
    require "../includes/footer.php";
?>