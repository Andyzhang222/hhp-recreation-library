<?php
if($_POST["q"] !== "null"){
    require "db-connection.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>HHP Recreation Library</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/styles.css">

        <!-- Bootstrap CSS Core -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>

    <body>
        <div class="container" id="main-content">
            <nav class="py-2 border-bottom">
                <div class="container d-flex flex-wrap">
                    <ul class="nav me-auto">
                        <li class="nav-item"><a href="../index.php" class="nav-link link-dark px-2 active" aria-current="page">Home</a></li>
                        <li class="nav-item"><a href="../index.php" class="nav-link link-dark px-2">Equipment</a></li>
                        <li class="nav-item"><a href="../pages/admin-login.php" class="nav-link link-dark px-2">Admin</a></li>
                        <li class="nav-item"><a href="#" class="nav-link link-dark px-2">FAQs</a></li>
                        <li class="nav-item"><a href="#" class="nav-link link-dark px-2">About</a></li>
                    </ul>
                    <div class="nav justify-content-end">
                        <div class="cart-div">
                            <a href="../pages/shopping-cart.php" class="text-dark text-decoration-none"><img src="../img/cart.svg" width="30" height="30" id="cart-icon">
                            <div id="cart-num" class="text-dark text-decoration-none">
                                <?php
                                    if (isset($_SESSION['cart'])) {
                                        echo sizeof($_SESSION['cart']);
                                    } else {
                                        echo 0;
                                    }
                                ?>
                            </div></a>
                        </div>
                        <a href="../pages/shopping-cart.php" class="nav-link link-dark px-2" id="shopping-basket">Cart</a>
                    </div>
                </div>
            </nav>
            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-wrap justify-content-center">
                    <a href="../index.php" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                        <img id="dal-logo" src="../img/dal-logo.png" width="50">
                        <span class="fs-4">HHP Recreation Library</span>
                    </a>
                    <form action="../pages/search.php" method="POST" id="searchForm">
                        <input type="text" name="q" id="searchBar" placeholder="Search..." maxlength="30" autocomplete="on"/>
                        <button type="submit" name="submit-search" id="searchBtn">Search</button>
                    </form>
                </div>
            </header>
<?php                
} else {
    header("Location: index.php");
  }
?>
