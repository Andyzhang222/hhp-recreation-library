<?php
  require_once "../includes/db-connection.php";
  require "../includes/header.php";
 

  ?>

<main>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Current Access codes</h1>  
        <div class = "card shadow-sm">
            <h3 class = "fw-light">
        <?php
            $sql = "SELECT * FROM admin_code;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            
            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo $row['code'] . " | Code Status - " ;
                    echo $row['code_status'] . "<br>";

                }

            }
            
        ?>
            </h3>
        </div>         
    </div>
</main>





<?php
  
    require "../includes/footer.php";
?>