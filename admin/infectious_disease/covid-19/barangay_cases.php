<?php
include("connect/connection.php");

$con = connection();

?>

<?php
if(isset($_POST['submit-btn']))
{

	$alert_level = $_POST['alert-level'];

	$sql = "UPDATE alert_level SET level_status = '$alert_level' ";

	$con->query($sql) or die ($con->error);

	if($con)
	{
		echo '<script>alert("Alert Level Status Updated")</script>';
	} 
	else
	{
		echo "error";
	}
}
?>


<?php
$sql = "SELECT * FROM alert_level";
$alert = $con->query($sql) or die($con->error);
$row = $alert->fetch_assoc(); 
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COVID-19 DashBoard - Barangay Cases</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
        <link href="css/barangay_cases.css?v=<?php echo time();?>" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

     
    <body class="bg-light">

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header-logo">
                    <a class="navbar-brand" href="index.html">
                        <img src="img/seal.png">
                    </a>
                    <a class="navbar-brand" href="#">Meycauayan ID HealthCare</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

              

                <ul class="nav navbar-right navbar-top-links">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> admin <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i>
                            <?php
				            if(!isset($_SESSION)){
					            session_start();
				            }
				            if(isset($_SESSION['userlogins'])){

					            echo $_SESSION['userlogins'];
				            }
                            ?>
                            </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="../../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="../dashboard-select.php"><i class="fa fa-dashboard fa-fw"></i> Main Dashboard</a>
                            </li>
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="patient_information.php" ><i class="fa fa-edit fa-fw"></i> Patient Information</a>
                            </li>
                            <li>
                                <a href="barangay_cases.php" class="active"><i class="fa fa-table fa-fw"></i>Barangay Cases</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Statistical Report<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="statistical_report.php">Current Year Report</a>
                                    </li>
                                    <li>
                                        <a href="yearly_report.php">Past Year Reports Report</a>
                                    </li>
                                    <li>
                                        <a href="comparative_report.php">Comparative Report</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="vaccination_report.php"><i class="fa fa-edit fa-fw"></i>Vaccination Report</a>
                            </li>
                            <li>
                                <a href="manage_user.php"><i class="fa fa-user fa-fw"></i>Manage User</a>
                            </li>
                            <li>
                                <a href="activity_log.php"><i class="fa fa-edit fa-fw"></i>Activity Log</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">DashBoard (COVID-19)</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user-plus fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"> 
                                                <?php
                                                    $sql = "SELECT COUNT(*) AS total FROM covid_19 ";
                                                    $result = mysqli_query($con,$sql);
                                                    $values = mysqli_fetch_assoc($result);
                                                    $total_cases = $values['total'];
                                                    echo $total_cases;
                                                 ?>
                                         </div>
                                            <div>Total Cases</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-medkit fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                            <?php
                                                    $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE status = 'Recovered'";
                                                    $result = mysqli_query($con,$sql);
                                                    $values = mysqli_fetch_assoc($result);
                                                    $total_cases = $values['total'];
                                                    echo $total_cases;
                                                 ?>
                                            </div>
                                            <div>Recovered Cases</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-heartbeat fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                            <?php
                                                    $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE status = 'Active'";
                                                    $result = mysqli_query($con,$sql);
                                                    $values = mysqli_fetch_assoc($result);
                                                    $total_cases = $values['total'];
                                                    echo $total_cases;
                                                 ?>
                                            </div>
                                            <div>Active Cases</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-window-close fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                            <?php
                                                    $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE status = 'Death'";
                                                    $result = mysqli_query($con,$sql);
                                                    $values = mysqli_fetch_assoc($result);
                                                    $total_cases = $values['total'];
                                                    echo $total_cases;
                                                 ?>
                                            </div>
                                            <div>Death Cases</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 form-container">
                            <div class="mb-3">
                                <h3>Alert Level Status</h3>
                                <form method="POST">
                                    <select class="form-select" aria-label="Default select example" name="alert-level">
                                        <option value= 0 <?php echo ($row ['level_status'] == 0) ? 'selected': '';?>> 0 </option>
     				                    <option value= 1 <?php echo ($row ['level_status'] == 1) ? 'selected': '';?>> 1 </option>
     				                    <option value= 2 <?php echo ($row ['level_status'] == 2) ? 'selected': '';?>> 2 </option>
     				                    <option value= 3 <?php echo ($row ['level_status'] == 3) ? 'selected': '';?>> 3 </option>
     				                    <option value= 4 <?php echo ($row ['level_status'] == 4) ? 'selected': '';?>> 4 </option>
     				                    <option value= 5 <?php echo ($row ['level_status'] == 5) ? 'selected': '';?>> 5 </option>
                                      </select>
                                      <div class="btn-container ">
                                        <button class="btn btn-primary d-block" name="submit-btn" onclick="return confirm('Click OK to confirm')">Submit</button>
                                      </div>
                                      
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                
                                <div class="panel-heading text-center panel-header">
                                    Barangay Cases
                                </div>

                                <div class="panel-body">

                                    <div class="table-responsive table-patient">
                                        <table class="table table-striped table-bordered table-hover dataTables" id="myTables">
                                            <thead>
                                                <tr>
                                                    <th>Barangay</th>
                                                    <th>Total Cases</th>
                                                    <th>Active Cases</th>
                                                    <th>Recovered Cases</th>
                                                    <th>Death Cases</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Bagbaguin
                                                        </td>
                                                        <td>
                                                            <?php
                                                                 $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bagbaguin '";
                                                                 $result = mysqli_query($con,$sql);
                                                                 $values = mysqli_fetch_assoc($result);
                                                                 $total_row = $values['total'];

                                                                  echo $total_row ;

						                                    ?>
                                                        </td>
                                                        <td>
                                                        <?php
                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bagbaguin ' AND status = 'Active'";
                         	                                $result = mysqli_query($con,$sql);
                         	                                $values = mysqli_fetch_assoc($result);
                         	                                $total_row = $values['total'];

                                                             echo $total_row ;

						                                ?>
                                                        </td>
                                                        <td>
                                                        <?php
                                                          $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bagbaguin ' AND status = 'Recovered'";
                         	                              $result = mysqli_query($con,$sql);
                                                          $values = mysqli_fetch_assoc($result);
                         	                              $total_row = $values['total'];

                         	                             echo $total_row ;

						                                ?>
                                                        </td>
                                                        <td>
                                                        <?php
                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bagbaguin ' AND status = 'Death'";
                                                            $result = mysqli_query($con,$sql);
                         	                                $values = mysqli_fetch_assoc($result);
                         	                                $total_row = $values['total'];

                                                            echo $total_row ;

						                                ?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/bagbaguin.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                           Bahay Pare
                                                        </td>
                                                        <td>
                                                        <?php
                            	                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bahay Pare '";
                         		                            $result = mysqli_query($con,$sql);
                         		                            $values = mysqli_fetch_assoc($result);
                         		                            $total_row = $values['total'];

		                                                    echo $total_row ;

							                            ?>  
                                                        </td>
                                                        <td>
                                                        <?php
                            		                        $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bahay Pare ' AND status = 'Active'";
                         		 	                        $result = mysqli_query($con,$sql);
                         			                        $values = mysqli_fetch_assoc($result);
                         		                        	$total_row = $values['total'];

                            	                            echo $total_row ;

								                        ?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		                        $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bahay Pare ' AND status = 'Recovered'";
                         		 	                        $result = mysqli_query($con,$sql);
                         			                        $values = mysqli_fetch_assoc($result);
                         			                        $total_row = $values['total'];

                            	                            echo $total_row ;

								                        ?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		                        $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bahay Pare ' AND status = 'Death'";
                         		 	                        $result = mysqli_query($con,$sql);
                         			                        $values = mysqli_fetch_assoc($result);
                         			                        $total_row = $values['total'];

                            	                            echo $total_row ;

								                        ?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/bahay-pare.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Bancal
                                                        </td>
                                                        <td>
                                                        <?php
                            		                        $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bancal'";
                         		 	                        $result = mysqli_query($con,$sql);
                         			                        $values = mysqli_fetch_assoc($result);
                         			                        $total_row = $values['total'];

                            	                            echo $total_row ;

								                        ?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		                        $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bancal ' AND status = 'Active'";
                         		 	                        $result = mysqli_query($con,$sql);
                         			                        $values = mysqli_fetch_assoc($result);
                         			                        $total_row = $values['total'];

                            	                            echo $total_row ;

								                        ?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		                        $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bancal' AND status = 'Recovered'";
                         		 	                        $result = mysqli_query($con,$sql);
                         			                        $values = mysqli_fetch_assoc($result);
                         		                        	$total_row = $values['total'];

                            	                            echo $total_row ;

								                        ?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bancal ' AND status = 'Death'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/bancal.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Banga
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Banga' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Banga ' AND status = 'Active'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?> 	
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Banga ' AND status = 'Recovered'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Banga' AND status = 'Death'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/banga.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Bayugo
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bayugo'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bayugo ' AND status = 'Active'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bayugo ' AND status = 'Recovered'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bayugo ' AND status = 'Death'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/bayugo.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Caingin
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Caingin' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Caingin ' AND status = 'Active'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Caingin ' AND status = 'Recovered'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Bancal ' AND status = 'Death'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/caingin.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Calvario
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Calvario '";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Calvario ' AND status = 'Active'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Calvario' AND status = 'Recovered'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	    echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Calvario' AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/calvario.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Camalig
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Camalig' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Camalig ' AND status = 'Active'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Camalig' AND status = 'Recovered'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Camalig' AND status = 'Death'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/camalig.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Hulo
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Hulo'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Hulo' AND status= 'Active'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Hulo' AND status= 'Recovered'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Hulo' AND status= 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/hulo.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Iba
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Iba'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Iba' AND status= 'Active'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Iba' AND status= 'Recovered'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Iba' AND status= 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/iba.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Langka
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Langka' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Langka' AND status= 'Active'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Langka' AND status= 'Recovered'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Langka' AND status= 'Death'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/langka.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Lawa
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Lawa'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'lawa' AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Lawa' AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Lawa' AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/lawa.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Libtong
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Libtong' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Libtong' AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Libtong' AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Libtong' AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/libtong.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Liputan
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Liputan'  ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Liputan' AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Liputan' AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Liputan' AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/liputan.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Longos
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Longos'  ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Longos'  AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Longos'  AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Longos'  AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/longos.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Malhacan
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Malhacan'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Malhacan' AND status = 'Active'";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Malhacan'  AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Malhacan'  AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/malhacan.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Pajo
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pajo' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pajo'  AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pajo'  AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pajo'  AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/pajo.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Pandayan
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pandayan' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pandayan'  AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pandayan'  AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pandayan'  AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/pandayan.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Pantoc
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pantoc' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pantoc'  AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pantoc'  AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Pantoc'  AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/pantoc.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Perez
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Perez'  ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Perez'  AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Perez'  AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Perez'  AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/perez.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Poblacion
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Poblacion' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Poblacion' AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Poblacion' AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Poblacion' AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/poblacion.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            St Francis Gasak
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Gasak' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Gasak' AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Gasak' AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Gasak' AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/st-francis.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                          Saluysoy
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Saluysoy' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Saluysoy' AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Saluysoy' AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Saluysoy' AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/saluysoy.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Tugatog
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Tugatog' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Tugatog' AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Tugatog' AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Tugatog' AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/tugatog.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Ubihan
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Ubihan' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Ubihan' AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Ubihan' AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Ubihan' AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/ubihan.php">summary report</a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Zamora
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Zamora' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Zamora' AND status = 'Active' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Zamora' AND status = 'Recovered' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                        <?php
                            		$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay  = 'Zamora' AND status = 'Death' ";
                         		 	$result = mysqli_query($con,$sql);
                         			$values = mysqli_fetch_assoc($result);
                         			$total_row = $values['total'];

                            	     echo $total_row ;

								?>
                                                        </td>
                                                        <td>
                                                            <a href="summary report/zamora.php  ">summary report</a>
                                                        </td>
                                                    </tr>

                                                   
                                                </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>


        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/startmin.js"></script>

        <!-- Custom Theme JavaScript -->
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

        
    

    </body>
</html>
