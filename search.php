<?php
	include 'connection.php';
	$user = $_GET['user'];
	$query = "SELECT * FROM person WHERE name= '$user'";
	$result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<table class="table table-bordered">
				<tr>
					<th>Name</th>
					<th>DOB</th>
				</tr>
			 	<?php
			 	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
				?>
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['birth_date']; ?></td>
					</tr>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>