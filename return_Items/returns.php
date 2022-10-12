<?php
$firstname = $_post['firstname'];
$Lastname = $_post['Lastname'];
$Inventory = $_post['Inventory'];
$QTY = $_post['QTY'];
$Email = $_post['Email'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>HHP </title>
	<link rel="stylesheet" href="css/checkItemMain.css">
</head>

<body>
	<?php include 'includes/header.php'; ?>
	


	<main id="pg-main-content-other">
		

		<article id="main-article2">
			
			<h2>Returns</h2> 
			
			<div id="contactform">
				<form action="#">
					<label for="First-Name">First Name</label>
					<input type="text" id="First-Name" name="firstname" placeholder="please enter here">

					<label for="First-Name">Last Name</label>
					<input type="text" id="Last-Name" name="Lastname" placeholder="please enter here">

					<label for="First-Name">Inventory</label>
					<input type="text" id="Inventory" name="Inventory" placeholder="please enter here">

					<label for="First-Name">QTY</label>
					<input type="text" id="QTY" name="QTY" placeholder="please enter here">

					<label for="First-Name">Email</label>
					<input type="text" id="Email" name="Email" placeholder="please enter here">
					
					<input type="submit" value="Submit">
		      </form>
			</div>
		
		</article>

	</main>
	
	<?php include 'includes/footer.php'; ?>
</body>
</html>