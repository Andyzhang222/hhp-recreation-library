<?php
    $servername = "localhost:8889";
    $username = "root";
    $password = "root";
    $db = "hhp_recreation_library";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    return $conn;
?> 