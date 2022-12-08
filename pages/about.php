<?php
    session_start();
    require "../includes/header.php";
?>

<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">About</h1>
        <p>The Recreation Library is a collection of supplies, equipment, and electronic resources available for use by students and student clubs within the School of Health and Human Performance (HAHP) at Dalhousie. HAHP students can borrow items from the library for use in coursework, extracurricular clubs or activities, or other settings. The Recreation Library offers opportunities for experiential learning, particularly related to supporting peers in accessing the library, contributing to the creation and maintenance of library items, and using items to enhance course-based and extracurricular learning. The Recreation Library is housed in a closet on the fourth floor of the Dentistry Building, and was established with support from a Teaching and Learning Enhancement Grant from the Centre for Learning and Teaching at Dalhousie. For more information, contact reclib@dal.ca or Dr. Karen Gallant, karen.gallant@dal.ca.</p>
        <a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/HHPRecLibrary/index.php'; ?>" class="btn btn-warning btn-lg">View available equipment</a>
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2>How to borrow items:</h2>
          <p>Need equipment or supplies for class projects or extracurricular activities? Simply browse through or search the list of available supplies to see if the items you need are available. Add items to your cart and then check them out to request a loan. You'll receive a three-digit code that will give you access to the Recreation Library, which is a large storage closet on the fourth floor of the Dentistry Building. When you're done with the items, you can use the same code to return the items to the closet. That's it! Please request items at least two weekdays before they are needed.</p>
          <a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/HHPRecLibrary/pages/faq.php'; ?>" class="btn btn-outline-light">More questions? FAQ</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light rounded-3">
          <h2>Contact us</h2>
          <p>For more information, contact reclib@dal.ca or Dr. Karen Gallant, karen.gallant@dal.ca. If the item you need is not listed, please send us a message through the special item request form below.</p>
          <a href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/HHPRecLibrary/pages/special-form.php'; ?>" class="btn btn-outline-secondary">Special item request form</a>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
  require "../includes/footer.php";
?>