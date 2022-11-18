<main>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Equipment List</h1>
        <p class="fs-5 text-muted" id="intro-p">Welcome to the recreation library, a resource for students in the School of Health and Human Performance, where you can sign out recreation equipment for program and project use. Below you will find a list of available equipment for borrow.</p>
    </div>

    <div class="album py-5">
        <div class="container">
            <?php
                $catCountQuery = "SELECT COUNT(*) FROM `equipment_category`;";
                $catCountResult = $conn->query($catCountQuery);
                
                if ($catCountResult->num_rows == 0) {
                    echo "<p class='text-dark'>No category found.</p>";
                } else {
                    $fetchResult = $catCountResult->fetch_assoc();
                    $numCat = (int) $fetchResult['COUNT(*)'];

                    for ($i=1; $i <= $numCat; $i++) {
                        $retrieveCatQuery = "SELECT * 
                        FROM `equipment_category` 
                        WHERE id = $i;";

                        $retrieveCatResult = $conn->query($retrieveCatQuery);
                        if ($retrieveCatResult->num_rows == 0) {
                            echo "<p class='text-dark'>No category with id " . $i . " exist.</p>";
                        } else {
                            $queryResult = $retrieveCatResult->fetch_assoc();
                            $category = $queryResult['description'];
                        }
                        ?>
            <h2 class="fw-light"><?php echo $category; ?></h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 p-3">
                        <?php
                        $catQuery = "SELECT * 
                        FROM `equipment_type` 
                        WHERE category = $i;";
                        $catResult = $conn->query($catQuery);

                        if ($catResult->num_rows == 0) {
                            echo "<p class='text-dark'>No items available for borrow in this category.</p>";
                        } else {
                            $k = 1;
                            while ($result = $catResult->fetch_assoc()) {
                                $description = $result['description'];
                                $item_id = $result['id'];
                                $item_code = $result['code'];
                                $imageSrc = "img/item-images/" . $item_code . ".png";
                                ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="item-image-main" src="<?php echo $imageSrc ?>" />
                        <a href="pages/item.php?id=<?php echo $item_id?>" class="text-dark align-items-center text-center"></a>

                        <div class="card-body">
                            <a href="pages/item.php?id=<?php echo $item_id?>" class="text-dark align-items-center text-center"><p><?php echo $description; ?></p></a>
                        </div>
                    </div>
                </div>
                            <?php
                                $k++;
                            }
                        }
                        ?>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</main>
