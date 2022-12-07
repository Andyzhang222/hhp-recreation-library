<?php
    session_start();
    require_once "../dbconnect.php";
    if (isset($_POST['submit-admin-code'])) {
        $codeSubmitted = trim(htmlspecialchars(stripslashes($_POST["code-submitted"])));

        if (empty($codeSubmitted)) {
            $location = 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/pages/admin-login.php?empty-input=1';
            header("Location: $location");
            exit();
        }
    }

    $codeQuery = "SELECT * 
    FROM `admin_code`
    WHERE code='$codeSubmitted'
    AND expire_date > CURDATE();";

    $codeResult = $conn->query($codeQuery);
    if ($codeResult->num_rows === 0) {
        $location = 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/pages/admin-login.php?access-denied=1';
        header("Location: $location");
        exit();
    } else {
        $_SESSION['admin'] = "admin";
        $location = 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/pages/admin-page.php';
        header("Location: $location");
        exit();
    }
    
?>