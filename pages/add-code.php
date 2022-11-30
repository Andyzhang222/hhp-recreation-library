<?php
  require '../includes/header.php';
  require '../includes/db-connection.php';

?>

<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-5 fw-normal">Add New Code</h1>

        <div class = "vh-100 d-flex justify-content-center align-content-center">
    

<form class="align-items-center" action="../includes/new-admin-code.php" method="POST">

  <div class="mb-3">
    <label for="new-code-to-add" class="form-label">New Admin Code</label>
    <input type="text" class="form-control" id="code-input" name="code" placeholder="Enter code..." maxlength=6>
</div>
  <button type="submit" id="submit-code" name="submit">Create new code</button>
</form>
