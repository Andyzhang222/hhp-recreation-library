<?php
    require '../includes/header.php';
    require_once '../includes/db-connection.php';

	if (isset($_POST['remove-button'])) {
		$itemID = $_POST['id'];
		$removeQuery = "DELETE FROM `equipment_type` WHERE id='$itemID';";
		$removeResult = $conn->query($removeQuery);

		if (!$removeResult) {
			echo "Deletion failed";
		} else {
			echo "Success.";
		}
	}
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
								<form method="post" action="remove-item.php">
									<input onclick="return confirm('Are you sure! want to delete this data? Once deleted, you will not be able to recover this.')" type="submit" name="remove-button" value="Delete" />
									<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
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
