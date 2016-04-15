<?php 
	include 'connection.php';	

	session_start();
	if(!isset($_SESSION['login']))
	{
		die("please login ");
		header('location:home.php');
	}
	$query = "SELECT * FROM Person";
	$result = mysqli_query($con,$query);

	$child = "SELECT * FROM Person";
	$childresult = mysqli_query($con,$child);


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
				<form>
					<form method="get" class="form">
						<h2>Create Relation</h2>
						<div class="col-md-6">
							<label>Father</label>
							<select class="form-control" name="father">
								<?php 
									while($childrow=mysqli_fetch_array($childresult,MYSQLI_ASSOC))	
								    {
								?>
									<option value="<?php echo $childrow['id']; ?>"><?php echo $childrow['name']; ?></option>
								<?php } ?>
							</select>
						</div>	
						<div class="col-md-6">
							<label>Child</label>
							<select class="form-control" name="child">
								<?php 
									while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))	
								    {
								?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
								<?php } ?>
							</select>
						</div>	
						<div class="col-md-2" style="margin-left: 0px;margin-top: 10px;float: right;">
							<input type="submit" value="submit" name="submit" class="btn btn-lg btn-primary btn-block"></input>
						</div>

						<?php 
							if(isset($_GET['submit'])){
	                        	$father = $_GET['father'];
	                        	$child = $_GET['child'];

	                        	$query = "INSERT INTO 
	                                    Parent (parent_id,child_id)
	                                    VALUES ('$father','$child')";
                                if ($con->query($query) === TRUE) {
	                        		echo "New Relation Addded";	
		                        } 
		                        else {
								    echo "Error: " . $query . "<br>" . $con->error;
								}      
	                    	}
						?>
				</form>
			</div>
		</div>	
	</div>	
</body>
</html>