<?php
if(!isset($_SESSION)){
	session_start();
}

include_once ("connection.php");
$con = connection();

if(isset($_POST['login']))

{
	$username = $_POST['email'];
	$password = $_POST['password'];


	$sql = "SELECT * FROM administrator WHERE username = '$username' AND password= '$password'";
	$user = $con->query($sql) or die ($con-> error);
	$row =  $user->fetch_assoc();
	$total_num = $user->num_rows;

	if($total_num > 0)
	{
		$_SESSION['userlogins'] = $row['firstname'];
		$_SESSION['barangay'] = $row['barangay_accessed'];

		echo header("Location: infectious_disease/dashboard-select.php");
	}
	else
	{
	    header("Location: index.php?error=Incorrect Username or Password");
	}
	
}
?>



<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Login</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time();?>">
</html>
<body>
    <div class="container-fluid header-top">
        <div class="logo">
            <img src="img/seal.png">
            <h1>Meycauayan City Health Office</h1>
        </div>
        
        
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Admin Login</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <?php if(isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <span>
                                    <?php echo $_GET['error']; ?>
                                </span>
                            </div>
                        <?php } ?>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            
                            
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Login" name="login">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>