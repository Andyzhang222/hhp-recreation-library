<?php
    require_once "db-connection.php";

    $id=$_GET['id'];

    mysqli_query($conn, "delete from `equipment_type` where id='$id';"); 
    header('location: ../pages/remove-item-khaleda.php');
?>