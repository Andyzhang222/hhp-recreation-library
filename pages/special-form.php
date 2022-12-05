<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php?no-access=1");
        exit();
    }

    require "../includes/send-email.php";
    require '../includes/header.php';
    require '../includes/db-connection.php';

    $message = "";

    if (isset($_GET['invalid-name'])) {
        if ($_GET['invalid-name'] == 1) {
        $message = "<p class='alert alert-warning'>Please enter a valid name.</p>";
        }
    }

    if (isset($_GET['invalid-email'])) {
        if ($_GET['invalid-email'] == 1) {
        $message = "<p class='alert alert-warning'>Please enter a valid email.</p>";
        }
    }

    if (isset($_POST['submit-form'])) {
        $fullName = htmlspecialchars(stripslashes(trim($_POST['full-name'])));
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $program = htmlspecialchars(stripslashes(trim($_POST['program'])));
        $item = htmlspecialchars(stripslashes(trim($_POST['item-name'])));
        $purpose = $_POST['purpose'];

        $nameValidator = "/^[a-zA-Z]{2,}(?: [a-zA-Z]+){0,5}$/";
        $emailValidator = "/^[\w\-\.]+@dal.ca$/";

        if (preg_match($nameValidator, $fullName) != 1) {
            header("Location: special-form.php?invalid-name=1");
            exit();
        }

        if (preg_match($emailValidator, $email) != 1) {
            header("Location: special-form.php?invalid-email=1");
            exit();
        }

        try {
            $mail->addAddress('olive_blue@outlook.com');           // Add a recipient

            $mail->isHTML(true);                                  
            $mail->Subject = "Special item request";
            $mail->Body    = "Full name: " . $fullName . "\nEmail: " . $email . "\nProgram of Study: " . $program . "\nItem name: " . $item . "\nPurpose: " . $purpose;
            $mail->AltBody = 'Body in plain text for non-HTML mail clients';
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>

<main class="request-info">
    <div class="py-2 text-center">
      <h2>Special request form</h2>
      <p class="lead">Please fill out the following fields:</p>
    </div>

    <h4 class="mb-3">Your information</h4>
    <form method="post" action="checkout.php" class="needs-validation" novalidate>
        <div class="row g-3">
        <div class="col-12">
            <label for="fullName" class="form-label">Full name <span class="text-muted">(Required)</span></label>
            <input type="text" class="form-control" id="fullName" placeholder="Apple Smith" name="full-name" required>
        </div>

        <div class="col-12">
            <label for="email" class="form-label">Email <span class="text-muted">(Required - has to be a Dal email with @dal.ca)</span></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="you@dal.ca" required>
        </div>

        <div class="col-12">
            <label for="program" class="form-label">Program of Study <span class="text-muted">(Required)</span></label>
            <input type="text" class="form-control" name="program" id="program" placeholder="e.g. Bachelor of Applied Computer Science" required>
        </div>

        <div class="col-12">
            <label for="item-name" class="form-label">What is/are the item(s) that you are requesting? <span class="text-muted">(Required)</span></label>
            <input type="text" class="form-control" name="item-name" id="item-name" required>
        </div>

        <div class="col-12">
            <label for="purpose" class="form-label">For what purpose are you requesting this item/these items?  <span class="text-muted">(Required)</span></label>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="purpose" value="In-classroom use">
            <label class="form-check-label" for="purpose">
                In-classroom use
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="purpose" value="For use outside the classroom (i.e., in community), to fulfill a course requirement">
            <label class="form-check-label" for="purpose">
                For use outside the classroom (i.e., in community), to fulfill a course requirement 
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="purpose" value="For use with an extracurricular group on campus (i.e., SAHHPer)">
            <label class="form-check-label" for="purpose">
                For use with an extracurricular group on campus (i.e., SAHHPer)  
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="purpose" value="For use in a volunteer or work placement">
            <label class="form-check-label" for="purpose">
                For use in a volunteer or work placement   
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="purpose" value="For personal use">
            <label class="form-check-label" for="purpose">
                For personal use    
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="purpose" value="other">
            <label class="form-check-label" for="purpose">
                Other reason:    
            </label>
            <input type="text" class="form-control" name="other" id="other">
            </div>
        </div>

        <?php echo $message; ?>
        </div>

        <hr class="my-4">

        <input class=" w-100 mb-3 btn btn-warning btn-lg" type="submit" name="sumbit-form" value="Send the request">
    </form>
</main>

<?php
  require "../includes/footer.php";
?>