
<?php
if(!isset($_SESSION)){
	session_start();
}

include ('connect/connection.php');
$con = connection();


if(isset($_POST['login']))

{
	$username = $_POST['username'];
	$password = $_POST['password'];


	$sql = "SELECT * FROM user WHERE username = '$username' AND password= '$password'";
	$user = $con->query($sql) or die ($con-> error);
	$row =  $user->fetch_assoc();
	$total_num = $user->num_rows;

	$_SESSION['userlastname'] = $row['lastname'];
	$_SESSION['useraccessed'] = $row['barangay_accessed'];

	if($total_num > 0)
	{
		$_SESSION['userlogin'] = $row['firstname'];
		
		echo header("Location: infectious_disease/registration-select.php");
	}
	else
	{
	    header("Location: index.php?error=Incorrect Username or Password");
	}
	
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MEYC ID-HEALTHCARE</title>
	<link rel="stylesheet" type="text/css" href="css/login.css?v=<?php echo time(); ?>">
	<link rel="icon" href="img/seal.png">
</head>
<body>
	<div class="container">
		<div class="section-1">
			<div class="text-1">
			   
			   <h1 class="text-1-1">MEYC-ID-HEALTHCARE</h2>
			   <h2 class="text-1-2">City of Meycauayan</h2>
			   <div class="logo-img">
			   	   <img class="img-logo" src="img/logo.png">
			   </div>
			</div>
	    </div>

	    <div class="section-2">
	    	<div class="text-2">
	    		<div class="logo-img-1">
	    			<img class="img-logo-1" src="img/user.jpg">
	    		</div>
	    		<h1>Welcome</h1>
	    	   <h1 class="text-2-1">Please LOG IN</h1>
	        </div>

	        <div class="login-form">
	        	<form method="POST">
	        		   <?php if(isset($_GET['error'])) { ?>
						<span>
							<?php echo $_GET['error']; ?>
						</span>
						<?php } ?>

	        		   <div class="login-form">

	        		      <label class="login-lbl">Username</label>
	        		  		<br>
	        		  		<input type="text" name="username" class="login-inp" >
	        		 
	        		 
	        		   </div>

	        			<div class="login-form">

	        		  		<label class="login-lbl">Password</label>
	        		  		<br>
	        		  		<input type="password" name="password" class="login-inp">
	        		 
	        		
	        		  </div>

	
	        			<div class="grid-1-btn">
	        			  <button class="submit-btn" id="login" name="login">LOGIN </button>
	        		    </div>
                 
	        	</form>
	        </div>
	    </div>
	</div>

	
	<script type="text/javascript">
		window.history.forward();
	</script>

</body>
</html>