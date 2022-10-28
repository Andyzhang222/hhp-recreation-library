<?php
  require_once "../includes/db-connection.php";
  require "../includes/header.php";
  ?>

<main>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Update Inventory</h1>
      
    <div class="album py-5">
        <div class="container">
            <form action="">
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
                <div class=" row-cols-sm-2 row-cols-md-3 g-3 p-3">
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
                                    ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            
                            <div class="card-body">
                                <H3 class="fw-light"><?php echo $description?></H3>
                                
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
            </form>
        </div>
    </div>
</main>





<?php
  
    require "../includes/footer.php";
?>