<?php 
	include 'connection.php';	
	if(isset($_POST['login'])){
		header('location:home.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
				<form method="post">
					<input type="submit" value="login" name="login" class="btn btn-danger" style="float: right;margin: 10px 18px 10px 10px;"></input>
				</form>
			<div class="col-md-12">
				<div class="col-md-8">
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
		            </div>
				</div>
				<div class="col-md-4">
					<form method="post">
						<a href="oneparent.php" class="btn btn-lg btn-primary btn-block" >Childrens with One Parent</a>
				</form>
				</div>
			</div>
		</div>
	</div>		
</body>
</html>