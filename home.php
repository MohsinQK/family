<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Family Tree</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="col-md-6" style="    margin: 0px 0px 0px 300px;">
			<form method="post" class="form-signin">
				<h2 style="margin-top: 200px;">Please Login First</h2>

					<label>Email</label>
					<input type="input" name="uname" required="required" class="form-control"></input>


					<label>Password</label>
					<input type="password" name="pass" required="required" class="form-control"></input>

					<div class="col-md-3" style="margin-left: -15px;margin-top: 10px;">
						<input type="submit" value="Login" name="submit" class="btn btn-lg btn-primary btn-block"></input>
					</div>

				<?php
	                    session_start();
	                        if (!isset($_SESSION["attempts"])){
					         	echo $_SESSION["attempts"] = 0;
					        }
					        $attempt=$_SESSION['attempts'];
					        // if ($_SESSION["attempts"] < 3)
					        // {

					        // }
							$counter=0;
	                    if(isset($_POST['submit'])){
	                     	$uname = $_POST['uname'];
	                        $pass = $_POST['pass'];

	                        // Perform queries
	                        $result = mysqli_query($con,"SELECT * FROM user WHERE name ='$uname'  ");
	                        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	                        if($row){
	                            if (crypt($pass, $row['password']) == $row['password']) {
	                            $_SESSION['login']= $uname;
		                            header('location:main.php');
	                        	}
	                        	else{
	                            	echo ("Invalid Password Please Try Again...");
	                            	$counter++;
	                        		echo $counter;
	                        	}
	                        }
	                        else{
	                            echo ("Invalid Email / Password Please Try Again...");
	                        }
	                    }
	                ?>
			</form>
		</div>
	</div>
</body>
</html>