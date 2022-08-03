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


	$sql = "SELECT * FROM user WHERE username = '$username' AND password_user= '$password'";
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
        <title>MEYCAUAYAN-ID-HEALTHCARE Login Account</title>
        
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css?v=<?php echo time();?>" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <div class="container form-container">
            <div class="row">
                <div class="col-12 col-md-6 logo-section">
                    <h2>MEYC-ID-HEALTHCARE</h2>
                    <h3>City of Meycauayan</h3>
                    <div class="logo">
                        <img src="img/logo.png">
                    </div>
                </div>
                <div class="col-12 col-md-6 form-section">
                    <h2>Login Your Account</h2>
                    <form method="POST">
                        
                        <?php if(isset($_GET['error'])) { ?>
                            <p class="incorrect-msg">
							    <?php echo $_GET['error']; ?>
                            </p>
						<?php } ?>
                       
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"> 
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"> 
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary container" value="login" name="login">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
