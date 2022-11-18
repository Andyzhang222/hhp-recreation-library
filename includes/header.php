<?php
require_once "../includes/db-connection.php";
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
        </style>

        <link rel="stylesheet" href="../css/styles.css">

        <!-- Bootstrap CSS Core -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>

    <body>
        <div class="container py-3" id="main-content">
            <header>
                <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                    <img src="../img/dal-logo.png"> 
                    <span class="fs-4"><a href="../index.php" class="text-dark text-decoration-none">HHP Recreation Library</a></span>

                    <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                        <a class="me-3 py-2 text-dark text-decoration-none" href="../index.php">Equipment</a>
                        <a class="me-3 py-2 text-dark text-decoration-none" href="#">About</a>
                        <a class="me-3 py-2 text-dark text-decoration-none" href="../pages/return-page.php">Return</a>
                        <a class="py-2 text-dark text-decoration-none" href="../pages/admin-login.php">Admin</a>
                    </nav>
                </div>
            </header>