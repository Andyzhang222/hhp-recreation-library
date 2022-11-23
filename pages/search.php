<?php
    require '../includes/header.php';
    require '../includes/db-connection.php';
?>

<h1>Search page</h1>
<link rel="stylesheet" href="../css/styles.css">

<?php

    if (isset($_POST['submit-search'])){
        $search = mysqli_real_escape_string($conn, $_POST['q']);

        $searchQuery = "SELECT * FROM `equipment_type` WHERE description LIKE '%$search%';";
        $searchResult = $conn->query($searchQuery);
                    
        if ($searchResult->num_rows == 0) {
            echo "<p>No item returned.</p>";
        } else {
        while ($result = $searchResult->fetch_assoc()) {
            $description = $result['description'];
            $item_id = $result['id'];
            ?>
            <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><a href="http://localhost:8888/pages/item.php?id=<?php echo $item_id?>" class="text-dark align-items-center text-center"><title>item's photo</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></a></svg>

                        <div class="card-body">
                            <a href="http://localhost:8888/pages/item.php?id=<?php echo $item_id?>" class="text-dark align-items-center text-center"><p><?php echo $description; ?></p></a>
                        </div>
                    </div>
                </div>
        <?php
        }
        }
    }
?> 
