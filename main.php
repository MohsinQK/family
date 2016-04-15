<?php
	include 'connection.php';

	session_start();
	if(!isset($_SESSION['login']))
	{
		die("please login ");
		header('location:home.php');
	}
	if(isset($_POST['logout'])){
		unset($_SESSION['login']);
		header('location:home.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Main</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form method="post" class="form">
					<h2>Add Person</h2>
						<label>Name</label>
						<input type="input" name="name" required="required" class="form-control"></input>


						<label>Date</label>
						<input type="date" name="date" required="required" class="form-control"></input>

						<div class="col-md-3" style="margin-left: -15px;margin-top: 10px;">
							<input type="submit" value="Submit" name="submit" class="btn btn-lg btn-primary btn-block"></input>
						</div>
						<div class="col-md-4" style="margin-left: -15px;margin-top: 10px;">
							<a href="persons.php" class="btn btn-lg btn-primary btn-block" >All Persons</a>
						</div>
						<div class="col-md-4" style="margin-left: -15px;margin-top: 10px;">
							<a href="relation.php" class="btn btn-lg btn-primary btn-block" >Add Relation</a>
						</div>
						<?php
							if(isset($_POST['submit'])){
		                        $name = $_POST['name'];
		                        $dob = $_POST['date'];
		                        $dateofb = date("Y-m-d", strtotime($dob));

		                        $query = "INSERT INTO
	                                        person (id,name,birth_date)
	                                        VALUES ('','$name','$dateofb')";
		            			if ($con->query($query) === TRUE) {
			                        	echo "New Person Addded";
			                        }
		                        else {
								    echo "Error: " . $query . "<br>" . $conn->error;
								}
		                    }
						?>
				</form>
			</div>
				<form method="post">
					<input type="submit" value="logout" name="logout" class="btn btn-danger" style="float: right;margin: 10px 18px 10px 10px;"></input>
				</form>
			<div class="col-md-6">
				<div class="well">
	                    <h4> Search Person</h4>
	                    <div class="input-group">
	                        <form method="post">
									<input type="search" name="searchtext" required="required" class="form-control" placeholder="Search"></input>
									<input type="submit" name="search" value="search" class="btn btn-primary" style="margin-top: 5px;"></input>
								<?php
									if (isset($_POST['search'])) {
										$ser = $_POST['searchtext'];
										header( "Location: search.php?user=".$ser );
									}
								?>
							</form>

	                    </div>
	                    <!-- /.input-group -->
	                </div>
			</div>
		</div>
	</div>
</body>
</html>