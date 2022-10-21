<?php
    require 'includes/header.php';
    require 'includes/db-connection.php';
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/inventory.css" rel="stylesheet" type="text/css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>

<body>

<div class="section wf-section">
    <h1 class="heading">Administration</h1>
    <h2 class="heading-2">Update Inventory</h2>
    <!-- FORMS COENTENT WAS LEARNED VIA https://www.w3schools.com/ -->
    <div class="w-form"> 
      <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form">
        <div class="div-block">
          <div class="div-block-4">
            <h3 class="heading-4">ITEM</h3>
            <div class="div-block-2">
              <h4 class="heading-5">Item</h4>
              <h4 class="heading-5">Item</h4>
              <h4 class="heading-5">Item</h4>
            </div>
          </div>
          <div class="div-block-4">
            <h3 class="heading-3">QTY</h3>
            <div class="div-block-3"><label class="w-checkbox checkbox-field">
                <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div><input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" style="opacity:0;position:absolute;z-index:-1"><span class="checkbox-label w-form-label" for="checkbox">Checkbox</span>
              </label><label class="w-checkbox checkbox-field">
                <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div><input type="checkbox" id="checkbox-5" name="checkbox-5" data-name="Checkbox 5" style="opacity:0;position:absolute;z-index:-1"><span class="checkbox-label w-form-label" for="checkbox-5">Checkbox</span>
              </label><label class="w-checkbox checkbox-field">
                <div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox"></div><input type="checkbox" id="checkbox-4" name="checkbox-4" data-name="Checkbox 4" style="opacity:0;position:absolute;z-index:-1"><span class="checkbox-label w-form-label" for="checkbox-4">Checkbox</span>
              </label></div>
          </div>
        </div><input type="submit" value="Submit"  class="submit-button w-button">
      </form>
  
    </div>
  </div>



</body>
</html> 