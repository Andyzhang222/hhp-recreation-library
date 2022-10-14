<?php
    require 'includes/header.php';
    require 'includes/db-connection.php';
    $conn = OpenConn();
    CloseConn($conn);
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<section id="item-display">
	<h2>All Available Items</h2>
		<section id="display-item1" class="art-summary">
			<h3>ITEM 1</h3>
			<p>Short description of the product and details about the product such as it's primary uses</p>
			<p><a href="articles/main-reactor.html">Read more &raquo;</a></p>
		</section>
		<section id="display-item2" class="art-summary">
			<h3>ITEM 2</h3>
			<p>Short description of the product and details about the product such as it's primary uses.</p>
			<p><a href="articles/bad-motivator.html">Read more &raquo;</a></p>
		</section>
		<section id="display-item3" class="art-summary">
			<h3>ITEM 3</h3>
			<p>Short description of the product and details about the product such as it's primary uses.</p>
			<p><a href="articles/wookies.html">Read more &raquo;</a></p>
		</section>
		<section id="display-item4" class="art-summary">
			<h3>ITEM 4</h3>
			<p>Short description of the product and details about the product such as it's primary uses.</p>
			<p><a href="articles/human-cyborg-comm.html">Read more &raquo;</a></p>
		</section>
        <section id="display-item5" class="art-summary">
			<h3>ITEM 5</h3>
			<p>Short description of the product and details about the product such as it's primary uses.</p>
			<p><a href="articles/human-cyborg-comm.html">Read more &raquo;</a></p>
		</section>
        <section id="display-item6" class="art-summary">
			<h3>ITEM 6</h3>
			<p>Short description of the product and details about the product such as it's primary uses.</p>
			<p><a href="articles/human-cyborg-comm.html">Read more &raquo;</a></p>
		</section>
	</section>

    <?php
    require "includes/footer.php"; 
    ?>
</html> 





