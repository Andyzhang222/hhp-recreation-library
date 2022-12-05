<?php
    include_once "db-connection.php";

    if (isset($_POST['submit-item'])) {
        $category = $_POST['category'];
        $item_name = htmlspecialchars(trim(stripslashes($_POST['item-name'])));
        $item_code = htmlspecialchars(trim(stripslashes($_POST['item-code'])));
        $item_quantity = htmlspecialchars(trim(stripslashes($_POST['item-quantity'])));

        $catIDQuery = "SELECT id FROM `equipment_category` WHERE description LIKE '$category';";
        $catIDResult = $conn->query($catIDQuery);
        $catIDRow = $catIDResult->fetch_assoc();
        $catID = $catIDRow['id'];

        $insertQuery = "INSERT INTO `equipment_type` VALUES(NULL, '$item_code', '$catID', '$item_name', '$item_quantity');";
        $insertResult = $conn->query($insertQuery);

        $target_dir = $_SERVER["DOCUMENT_ROOT"] . "/img/item-images/";
        $target_file = $target_dir . $item_code . ".png";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 8000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        } 

        if ($imageFileType != "png") {
            echo "Sorry, only PNG files are allowed.";
            $uploadOk = 0;
        } 

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        if ($insertResult) {
            header("Location: ../pages/add-item.php?success=1");
            exit();
        } else {
            header("Location: ../pages/add-item.php?success=0");
            exit();
        }
    }
?>
