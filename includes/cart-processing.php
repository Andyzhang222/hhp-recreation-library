<?php
    session_start();
    require_once "../dbconnect.php";

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if(isset($_POST['add-to-cart'])) {
        $itemID = $_POST['hidden-id'];
        $itemQuant = $_POST['item-quantity'];

        if (empty($itemQuant)) {
            $location = 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/pages/item.php?id=' . $_POST['hidden-id'] . '&success=0';
            header("Location: $location");
            exit();
        }

        $itemQuery = "SELECT * 
        FROM `equipment_type`
        WHERE id='$itemID';";

        $itemResult = $conn->query($itemQuery);
        $itemInfo = $itemResult->fetch_assoc();
        $maxQuant = $itemInfo['quantity'];

        if (isset($_SESSION['cart'][$itemID])) {
            $currentQuant = $_SESSION['cart'][$itemID];
            if ($currentQuant + $itemQuant > $maxQuant) {
                $location = 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/pages/item.php?id=' . $_POST['hidden-id'] . '&success=2';
                header("Location: $location");
                exit();
            } else {
                $_SESSION['cart'][$itemID] += $itemQuant;
                $location = 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/pages/item.php?id=' . $_POST['hidden-id'] . '&success=1';
                header("Location: $location");
                exit();
            }
        } else {
            $_SESSION['cart'][$itemID] = $itemQuant;
            $location = 'https://' . $_SERVER['HTTP_HOST'] . '/HHPRecLibrary/pages/item.php?id=' . $_POST['hidden-id'] . '&success=1';
            header("Location: $location");
            exit();
        }
    }
?>