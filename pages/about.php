<?php
    session_start();
  require_once "../includes/db-connection.php";
  require "../includes/header.php";
?>

<div id="admin-portal">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">ABOUT US</h1>
		 <div class="about-cont" style="padding-top: 30px;">
                        <p>This is an online searchable platform that includes photos of available supplies, equipments, and electronic resources in real time online, and allows student of Dalhousie university to request them through the online platform. Recreation Library administrators can also track the items that is borrowed and send follow up emails for items that are not returned 
						using the platform.The platform is easy to use, easy to maintain and free.</p>
                    </div>
                </div> 
    </div>

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            
            <div >
                <h4 class="my-0 fw-normal" style="padding-top: 50px;">HOW IT WORKS</h4>
            </div>
            <div style="padding-top: 30px;">
                <p>The recreation library allows students to borrow items by choosing them from the equipment lists available through the online platform of the library to use for course works, extra curricular club activities and so on.</p>
            </div>
            
        </div>

     
      

        <div class="col">
            <div>
                <h4 class="my-0 fw-normal"></h4>
            </div>
        </div>
		   
		   <div class="col">
            <div >
                <h4 class="my-0 fw-normal" style="padding-top: 50px;">FEATURES</h4>
            </div>
             <div style="padding-top: 30px;">
			 <p>Students can pick items and equipments that is stored in the the online platform of the library,  and check them out from the physical Recreation library that is near the Dentistry building, near the offices of Recreation faculty. And later return them after their designated physical usable time.</p>
               
            </div>
            </div>
    </div>
</div>

<?php


  require "../includes/footer.php";
?>