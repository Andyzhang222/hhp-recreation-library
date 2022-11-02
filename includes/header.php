<?php
if($_GET["q"] == "Search..."){
    header("Location: index.php");
}
if($_GET["q"] !== ""){
    require "includes/db-connection.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HHP Recreation Library</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }
            nav  {
                margin-right: 2%;
            }
            #searchBar {
                border: 2px solid #000000;
                border-left: none;
                font-size: 16px;
                padding: 10px;
                outline: none;
                width: 250px;
                float: right;
            }
            #searchBtn {
                border: 2px solid #000000;
                font-size: 16px;
                padding: 10px;
                background: #f1d829;
                font-weight: bold;
                cursor: pointer;
                outline: none;
                float: right;

            }
            
        </style>

        <link rel="stylesheet" href="../css/styles.css">

        <!-- Bootstrap CSS Core -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>

    <body>
        <div class="container py-3" id="main-content">
            <header>
                <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                    <img src="http://localhost:8888/img/dal-logo.png"> 
                    <span class="fs-4"><a href="http://localhost:8888/" class="text-dark text-decoration-none">HHP Recreation Library</a></span>

                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                        <a class="me-3 py-2 text-dark text-decoration-none" href="#">About</a>
                        <a class="me-3 py-2 text-dark text-decoration-none" href="http://localhost:8888/">Equipment</a>
                        <a class="py-2 text-dark text-decoration-none" href="http://localhost:8888/pages/admin-login.php">Admin</a>
                    </nav>
                    <form action="index.php" method="GET" id="searchForm">
                        <input type="text" name="q" id="searchBar" placeholder="Search..." maxlength="30" autocomplete="on"/>
                        <input type="submit" id="searchBtn" value="Search"/>
                    </form>
                    <?php
                    if(!isset($q)){
                        echo " ";
                    } else {
                    $searchQuery = "SELECT * FROM `equipment_type` WHERE description LIKE '%$q%';";
                    $searchResult = $conn->query($searchQuery);
                    
                    if ($searchResult->num_rows == 0) {
                      echo "<p>No item returned.</p>";
                    } else {
                      while ($result = $searchResult->fetch_assoc()) {
                        $description
                      }
                    }

                    ?> 
            </header>
<?php
} else {
    header("Location: index.php");
}
?>