<?php
  require_once "../includes/db-connection.php";
  require "../includes/header.php";
?>

<main class="form-signin m-auto text-center">
  <form>
    <h1 class="h3 mb-3 fw-normal">Please enter admin code:</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Code</label>
    </div>
    
    <button id="submit-code" class="btn btn-warning" type="submit">Submit</button>
  </form>
</main>

<?php


  require "../includes/footer.php";
?>