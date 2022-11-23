<?php
    require '../includes/header.php';
    require '../includes/db-connection.php';
	?>

	<div>
		<table width= 100%>
			<thead>
	<th>ID</th>
	<th> CODE </th>
	<th> CATEGORY </th>
	<th> DESCRIPTION</th> 
	<th> QUANTITY</th>
	
				<th>Remove</th>
			
			
				<?php
					
					$query=mysqli_query($conn,"select * from `equipment_type` ");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['code']; ?></td>
							<td><?php echo $row['category']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><?php echo $row['quantity']; ?></td>
							
							<td>
								<form method="post" action="../includes/delete.php">
									<input type="submit" value="Delete" />
									<input type="hidden" value="<?php echo $row['id']; ?>" />
								</form>
							</td>
						</tr>
						<?php
					}
				?>
			
		</table>
	</div>


	<?php
		 
    require "../includes/footer.php";
?>
