<?php
  require_once "../includes/db-connection.php";
  require "../includes/header.php";
?>

<div id="admin-portal">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Administrator Portal</h1>
    </div>

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Manage inventory</h4>
            </div>
            <div class="card-body">
                <button type="button" id="add-item" class="btn-spacing w-100 btn btn-lg btn btn-outline-dark">Add new item</button>
                <button type="button" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Update item quantity</button>
                <button type="button" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Remove item</button>
            </div>
            </div>
        </div>

        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Manage loans</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn-spacing w-100 btn btn-lg btn-outline-dark">View expired loans</button>
                <button type="button" class="btn-spacing w-100 btn btn-lg btn-outline-dark">View current loans</button>
            </div>
            </div>
        </div>

        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Manage admin access</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Current access codes</button>
                <button type="button" class="btn-spacing w-100 btn btn-lg btn-outline-dark">Add new code</button>
            </div>
            </div>
        </div>
    </div>
</div>

<?php


  require "../includes/footer.php";
?>

<script type="text/javascript">
    document.getElementById("add-item").onclick = function () {
        location.href = "add-item.php";
    };
</script>