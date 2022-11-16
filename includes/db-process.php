<?php

    require_once "db-connection.php";

    if(isset($_POST['Update'])){

        $numOfItemsInDbQuery = "SELECT COUNT(*) FROM `equipment_type`;";
        $numOfItemsInDbResult = $conn->query($numOfItemsInDbQuery);

        if ($numOfItemsInDbResult->num_rows == 0) {
            echo "<p class='text-dark'>No category found.</p>";
        } else {
            $fetchResult = $numOfItemsInDbResult->fetch_assoc();
            $numItems = (int) $fetchResult['COUNT(*)'];

            for ($i=1; $i <= $numItems; $i++) {
                $quantName = "quant" . $i;
                $quantName = $_POST[$i];

                $querySQL = "UPDATE `equipment_type` SET `quantity`='$quantName' WHERE `id` = $i";

                $result = $conn->query($querySQL);

                if($result == true){
                    echo "it worked";
                }
                else{
                    die("noooo" . $conn->error);
            }
        }
        }
    }
    header("Location: ../index.php?submit=1");
?>