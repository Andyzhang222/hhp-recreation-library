<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php?no-access=1");
        exit();
    }

    require_once "../includes/db-connection.php";
    require "../includes/header.php";
?>

<div id="admin-portal">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="h2 fw-normal">Administrator Portal</h1>
    </div>

    <div class="row mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Manage inventory</h4>
            </div>
            <div class="card-body">
                <a href="add-item.php" id="add-item" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Add new item</a>
                <a href="update.php" id ="update-quantity" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Update item quantity</a>
                <a href="remove-item.php" id="remove-item" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Remove item</a>
            </div>
            </div>
        </div>

        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Manage orders</h4>
            </div>
            <div class="card-body">
                <a href="requests.php" class="btn-spacing w-100 btn btn-lg btn-outline-dark">View requests</a>
                <a href="admin-returns.php" class="btn-spacing w-100 btn btn-lg btn-outline-dark">View returns</a>
            </div>
            </div>
        </div>

        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Manage access</h4>
            </div>
            <div class="card-body">
                <a href="access-codes.php" id="access-code" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Current access codes</a>
                <a href="add-code.php" id="add-code" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Add new code</a>
                <a href="storage-code.php" id="storage-code" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Storage codes</a>
            </div>
            </div>
        </div>

        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Manage FAQ</h4>
            </div>
            <div class="card-body">
                <a href="add-faq.php" id="access-code" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Add new FAQ</a>
                <a href="current-faq.php" id="add-code" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Current FAQ</a>
            </div>
            </div>
        </div>
    </div>
</div>

<?php
  require "../includes/footer.php";
?>