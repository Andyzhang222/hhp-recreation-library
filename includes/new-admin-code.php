<?php
require_once "db-connection.php";
require "header.php";

if(isset($_POST['submit'])) {
    $search = mysqli_real_escape_string($conn, $_POST['code']);
    $query = "INSERT INTO `admin_code` (code) VALUES ('$search')";
    $result = $conn->query($query);
    if ($result){
        echo "<p>Admin code added successfully</p>";
    }
    else{
        echo "<p>Failed to add new admin code</p>";
    }
}
else {
    header("Location: ../index.php");
    exit();
}
    ?>


