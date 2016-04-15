<?php 
	include 'connection.php';	

	$query = "SELECT * FROM Person";
	$result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>All Persons In System</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="col-md-12">
				<table class="table table-bordered">
					<h2>All Persons In System</h2>
					<tr>
						<th>No#</th>
						<th>Person Name</th>
						<th>Date Of Berth</th>
						<th colspan="2">Actions</th>
					</tr>	
					<?php 
						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)or die(mysqli_error($con)))	
					    {
					    	$personid=$row['id'];
					?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['birth_date']; ?></td>
							<td>
								<a href="edit.php?person_id=<?php echo $personid ?>" class="btn btn-success">Update</a>
								
							</td>
							<td>
								<form method='post' action="persons.php">
									<input type='hidden' name='itemid' value='<?php echo $row['id']; ?>'>
									<input type='submit' name='dlteBtn' value='delete' class="btn btn-danger" onClick="window.location.reload()">
									<?php 
										if(isset($_POST['dlteBtn'])){
											$id=$_POST['itemid'];

											$delquery="DELETE FROM Person WHERE id= '$id' ";
											if ($con->query($delquery) === TRUE) {
													header("location:persons.php");
					                        } 
					                        else {
											    echo "Error: " . $query . "<br>" . $conn->error;
											}
										}
									?>
								</form>
							</td>
						</tr>	
					<?php } ?>
				</table>	
			</div>
		</div>		
	</body>
	</html>	