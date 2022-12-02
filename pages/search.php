<?php
    session_start();
    require "../includes/header.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $searchKey = htmlspecialchars(stripslashes(trim($_POST['search-keywords'])));

        require_once "../includes/db-connection.php";

        if (empty($searchKey)) {
            header("Location: ../index.php?search-empty=1");
            exit();
        } else {
            $searchQuery = "SELECT * FROM `equipment_type` WHERE description LIKE '%$searchKey%';";
            $searchResult = $conn->query($searchQuery);
            ?>
            <div class="album py-5 search-res">
                <div class="container">
                    <h2 class="fw-light text-center">Search Result</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 p-3">
            
        <?php
            if ($searchResult->num_rows == 0) {
                echo "<p class='alert alert-warning'>There is no item with that name.</p>";
            } else {
                while ($result = $searchResult->fetch_assoc()) {
                    $description = $result['description'];
                    $item_id = $result['id'];
                    $item_code = $result['code'];
                    $imageSrc = "../img/item-images/" . $item_code . ".png";
                    ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <a href="item.php?id=<?php echo $item_id?>" class="text-dark align-items-center text-center"><img class="item-image-main" src="<?php echo $imageSrc ?>" /></a>

                                <div class="card-body">
                                    <a href="item.php?id=<?php echo $item_id?>" class="text-dark align-items-center text-center"><p><?php echo $description; ?></p></a>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }
            ?>

            </div>
            </div>
            </div>

            <?php
        }
    }

    require "../includes/footer.php";
?>