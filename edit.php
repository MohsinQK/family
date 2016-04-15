<?php 
	include 'connection.php';	

	session_start();
	if(!isset($_SESSION['login']))
	{
		die("please login ");
		header('location:home.php');
	}
	$id= $_GET['person_id'];

	$query = "SELECT * FROM Person WHERE id= '$id'";
	$result = mysqli_query($con,$query);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	// echo $dateofb = date("m-d-Y", strtotime($dbdate));
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Relation Page</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form method="post" class="form">
					<h2>Update Person</h2>
					<label>Name</label>
					<input type="input" name="name" value="<?php echo $row['name'] ?>" required="required" class="form-control"></input>
				
				
					<label>Date</label>
					<input type="date" name="date" required="required" class="form-control"></input>
				
					<div class="col-md-3" style="margin-left: -15px;margin-top: 10px;">
						<input type="submit" value="Submit" name="submit" class="btn btn-lg btn-primary btn-block"></input>
					</div>
					
						<?php 
							if(isset($_POST['submit'])){
	                        	$name = $_POST['name'];
	                        	$dob = $_POST['date'];
	                        	$dateofb = date("Y-m-d", strtotime($dob));
	                        	$query = "UPDATE Person SET name='$name',`birth_date`='$dateofb' WHERE id ='$id'";
	                        	if ($con->query($query) === TRUE) {
		                        	echo "Person Data Updated";	
		                        	header('location:persons.php');
		                        } 
		                        else {
								    echo "Error: " . $query . "<br>" . $conn->error;
								}       
	                    	}
						?>
				</form>
			</div>
		</div>	
	</div>	
</body>
</html>