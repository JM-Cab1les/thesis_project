<?php 
  include("connect/connection.php");
  $con = connection();
?>

<?php
if(isset($_POST['update']))
{


   $lockdown_stats = $_POST['lockdown'];

   $sql = "UPDATE lockdown SET lockdown_status = '$lockdown_stats' WHERE Barangay = 'Camalig'";

   $con->query($sql) or die ($con->error);

  
   $remarks = $_POST['sitio'];
   $sqls = "UPDATE street SET Sitio = '$remarks' WHERE Barangay ='Camalig'";
   $con->query($sqls) or die ($con->error);

   if($con)
   {
    echo '<script>alert("Lockdown Status in Barangay Updated")</script>';
   }

   else
   {
    echo "error";
   }
}
?>
<?php
   	$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig' AND status = 'Active' ";
 	$result = mysqli_query($con,$sql);
 	$values = mysqli_fetch_assoc($result);
 	$total_active = $values['total'];
?>

<?php 
  $sql = "SELECT * FROM lockdown WHERE Barangay = 'Camalig'";
  $status = $con->query($sql) or die ($con->error);
  $row = $status->fetch_assoc();

?>

<?php
    $sql = "SELECT Sitio FROM street WHERE Barangay = 'Camalig'";
    $stats = $con->query($sql) or die($con->error);
    $executed = $stats->fetch_assoc();
 			
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
       
        <link href="css/summary.css?v=<?php echo time();?>" rel="stylesheet">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

     
    <body class="bg-light">

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header-logo">
                    <a class="navbar-brand" href="#">
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
                            <li><a href="../../../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="../../dashboard-select.php"><i class="fa fa-dashboard fa-fw"></i> Main Dashboard</a>
                            </li>
                            <li>
                                <a href="../index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="../patient_information.php" ><i class="fa fa-edit fa-fw"></i> Patient Information</a>
                            </li>
                            <li>
                                <a href="../barangay_cases.php"><i class="fa fa-table fa-fw"></i>Barangay Cases<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="camalig.php" class="active">Summary Report Per Barangay</a>
                                    </li>
                                  
                                </ul>
                            </li>
                            <li>
                                <a href="../statistical_report.php"><i class="fa fa-bar-chart-o fa-fw"></i>Statistical Report</a>
                              
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="../vaccination_report.php"><i class="fa fa-edit fa-fw"></i>Vaccination Report</a>
                            </li>
                            <li>
                                <a href="../manage_user.php"><i class="fa fa-user fa-fw"></i>Manage User</a>
                            </li>
                            <li>
                                <a href="../activity_log.php"><i class="fa fa-edit fa-fw"></i>Activity Log</a>
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
                        

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                
                                <div class="panel-heading text-center panel-header">
                                    Camalig Summary Report
                                </div>

                                <div class="panel-body">

                                    <div class="table-responsive table-patient">
                                        <table class="table table-striped table-bordered table-hover dataTables" id="myTables">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Total Cases</th>
                                                    <th>Active Cases</th>
                                                    <th>Recovered Cases</th>
                                                    <th>Death Cases</th>
                                                    
                                                </tr>
                                                <tbody>
                                                    <tr>
                                                        
                                                    <td>
                                                        <?php


 							                             $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig' ";
 							                             $result = mysqli_query($con,$sql);
                                                         $values = mysqli_fetch_assoc($result);
 							                             $total_caingin_confirmed_cases = $values['total'];

 							                             echo $total_caingin_confirmed_cases;

							                            ?>
                                                    </td>
                                                    <td>
					 		                            <?php
 							

 							                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig' AND status = 'Active' ";
 						                            	$result = mysqli_query($con,$sql);
 							                            $values = mysqli_fetch_assoc($result);
 							                            $total_caingin_active_cases = $values['total'];

 							                            echo $total_caingin_active_cases;

							                            ?>
                                                        </td>
                                                        <td>					 	
					 		                                <?php
 							

 							                                $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig' AND status = 'Recovered' ";
 							                                $result = mysqli_query($con,$sql);
 							                                $values = mysqli_fetch_assoc($result);
 							                                $total_caingin_recovered_cases = $values['total'];

 							                                echo $total_caingin_recovered_cases;

							                                ?>
					 	                                </td>
                                                         <td>
					 		                                <?php
 							

 							                                $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig' AND status = 'Death' ";
 							                                $result = mysqli_query($con,$sql);
 							                                $values = mysqli_fetch_assoc($result);
 							                                $total_caingin_death_cases = $values['total'];

 							                                echo $total_caingin_death_cases;

							                                ?>
					 	                                </td>
                                                        
                                                    </tr>

                                                   
                                                   
                                                </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="form-container">
                                        <h5>Lockdown Implementation</h5>
                                        <form method="POST">
                                            <div class="form-group">
                                            <select class="form-select mb-3" name="lockdown">
                                                    <option value= 0 <?php echo ($row['lockdown_status'] == 0)? 'selected' : '' ;?>>Not Implemented</option>
					                                <option value= 1 <?php echo ($row['lockdown_status'] == 1)? 'selected' : '' ;?>>Implemented</option>
                                                </select>
                                            </div>
                                            <div class="row sitio_street">
                                                <div class="col-lg-3 col-md-6 col-xs-3">
                                                    <input type="textbox" name="sitio" value="<?php echo $executed['Sitio']; ?>" class="form-control">  
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="submit" name="update" class="btn btn-primary btn-lg" onclick="return confirm('Click OK to confirm Update Lockdown Status in this barangay')">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row alert-container">
                                    <div class="col-lg-9 col-md-6 col-xs-8">
                                            <?php
			                                    if($total_active >= 2 && $row['lockdown_status'] == 0 )
			                                    {
                                                    echo "<div class='alert alert-warning text-center' >'Recommend: Impose Granular Lockdown in this barangay cause of increasing no. of active cases'</div>";
			         
			           
			                                    }
			                                    if($total_active >= 2 && $row['lockdown_status'] == 1)
			                                    {
			                                    echo "<div class='alert alert-info text-center' >Granular Lockdown Currently Imposed in Barangay</div>";
			         
			           
			                                    }
			                                    else if ($total_active < 2 && $row['lockdown_status'] == 1)
                                                {
                                                   echo "<div class='alert alert-success text-center' >'Recommend: No needed to impose granular lockdown in this Barangay'</div>";
			            
			                                    }
			                                 else if ($total_active < 2 && $row['lockdown_status'] == 0)
			                                    {
			                                     echo "<div class='alert alert-info text-center' >Granular Lockdown Currently not Imposed in Barangay</div>";
			                                    }
			                                ?>
                                        </div>
                                    </div>
                                    <canvas id="barangay_stats"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>


        </div>
        <?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 1 AND barangay = 'Camalig'";
  $result_jan = mysqli_query($con,$sql);
  $values_jan = mysqli_fetch_assoc($result_jan);
  $total_jan = $values_jan['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 2 AND barangay = 'Camalig'";
  $result_feb = mysqli_query($con,$sql);
  $values_feb = mysqli_fetch_assoc($result_feb);
  $total_feb = $values_feb['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 3 AND barangay = 'Camalig'";
  $result_march = mysqli_query($con,$sql);
  $values_march = mysqli_fetch_assoc($result_march);
  $total_march = $values_march['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 4 AND barangay = 'Camalig'";
  $result_april = mysqli_query($con,$sql);
  $values_april = mysqli_fetch_assoc($result_april);
  $total_april = $values_april['total'];
?>


<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 5 AND barangay = 'Camalig'";
  $result_may = mysqli_query($con,$sql);
  $values_may = mysqli_fetch_assoc($result_may);
  $total_may = $values_may['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 6 AND barangay = 'Camalig'";
  $result_june = mysqli_query($con,$sql);
  $values_june = mysqli_fetch_assoc($result_june);
  $total_june = $values_june['total'];
?>


<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 7 AND barangay = 'Camalig'";
  $result_july = mysqli_query($con,$sql);
  $values_july = mysqli_fetch_assoc($result_july);
  $total_july = $values_july['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 8 AND barangay = 'Camalig'";
  $result_aug = mysqli_query($con,$sql);
  $values_aug = mysqli_fetch_assoc($result_aug);
  $total_aug = $values_aug['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 9 AND barangay = 'Camalig'";
  $result_sept = mysqli_query($con,$sql);
  $values_sept = mysqli_fetch_assoc($result_sept);
  $total_sept = $values_sept['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 10 AND barangay = 'Camalig'";
  $result_oct = mysqli_query($con,$sql);
  $values_oct = mysqli_fetch_assoc($result_oct);
  $total_oct = $values_oct['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 11 AND barangay = 'Camalig'";
  $result_nov = mysqli_query($con,$sql);
  $values_nov = mysqli_fetch_assoc($result_nov);
  $total_nov = $values_nov['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 12 AND barangay = 'Camalig'";
  $result_dec = mysqli_query($con,$sql);
  $values_dec = mysqli_fetch_assoc($result_dec);
  $total_dec = $values_dec['total'];
?>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/summary.js"></script>

        <!-- Chart Js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

        <script>
       
            const ctx = document.getElementById('barangay_stats').getContext('2d');
            const myChart = new Chart(ctx, {
            type: 'bar',
          data: {
             labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November','December'],
             datasets: [{
                 label: 'No. of Cases',
                 data: [<?php echo $total_jan; ?>, <?php echo $total_feb; ?>, <?php echo $total_march; ?>, <?php echo $total_april; ?>, <?php echo $total_may; ?>,<?php echo $total_june; ?> , <?php echo $total_july; ?>,0<?php echo $total_sept; ?>,<?php echo $total_oct; ?>,<?php echo $total_nov; ?> ,<?php echo $total_dec;?>],
                 backgroundColor: [
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5'
                 ],
                 borderColor: [
                   '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5',
                     '#42a5f5'
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });
     </script>
    

    </body>
</html>
