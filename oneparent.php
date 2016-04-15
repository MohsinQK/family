<?php  
	include 'connection.php';
	$query = "SELECT * FROM parent  GROUP BY parent_id HAVING COUNT(*) =1";
	$result = mysqli_query($con,$query);
								
?>
<!DOCTYPE html>
<html>
<head>
	<title>Only One Parent</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<table class="table table-bordered">
				<h2>All Persons With One Parent</h2>
				<tr>
					<th>Person Name</th>
					<th>Date Of Berth</th>
				</tr>	
				<?php 
					while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))	
					{	
						$id= $row['child_id'];	
						$personquery= "SELECT * FROM Person 
										WHERE id= '$id' ORDER BY birth_date DESC ";
						$personresult = mysqli_query($con,$personquery);
						$personrow=mysqli_fetch_array($personresult,MYSQLI_ASSOC)
				?>
				<tr>
					<td><?php echo $personrow['name']; ?></td>
					<td><?php echo $personrow['birth_date']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>			
</body>
</html>