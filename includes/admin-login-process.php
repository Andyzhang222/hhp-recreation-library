<?php
    require_once "db-connection.php";
    if (isset($_POST['submit-admin-code'])) {
        $codeSubmitted = trim(htmlspecialchars(stripslashes($_POST["code-submitted"])));

        if (empty($codeSubmitted)) {
            header("Location: ../pages/admin-login.php?empty-input=1");
            exit();
        }
    }

    $codeQuery = "SELECT * 
    FROM `admin_code`
    WHERE code=$codeSubmitted
    AND code_status LIKE 'ACTIVE';";

    $codeResult = $conn->query($codeQuery);
    if ($codeResult->num_rows === 0) {
        header("Location: ../pages/admin-login.php?access-denied=1");
        exit();
    } else {
        header("Location: ../pages/admin-page.php");
        exit();
    }
?>