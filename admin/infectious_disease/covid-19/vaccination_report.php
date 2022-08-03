<?php
include("connect/connection.php");

$con = connection();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COVID-19 DashBoard - Vaccination Report</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        
        <!-- Custom CSS -->
        <link href="css/vaccination_report.css?v=<?php echo time();?>" rel="stylesheet">

  

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

     
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header-logo">
                    <a class="navbar-brand" href="index.html">
                        <img src="img/seal.png">
                    </a>
                    <a class="navbar-brand" href="index.html">Meycauayan ID HealthCare</a>
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
                                <a href="patient_information.php"><i class="fa fa-edit fa-fw"></i> Patient Information</a>
                            </li>
                            <li>
                                <a href="barangay_cases.php"><i class="fa fa-table fa-fw"></i>Barangay Cases</a>
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
                                <a href="vaccination_report.php" class="active"><i class="fa fa-edit fa-fw"></i>Vaccination Report</a>
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
                            <h1 class="page-header">Covid-19 DashBoard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                           <div class="panel panel-default">
                                <div class="panel-heading text-center panel-header">
                                    Vaccination Report
                                </div>
                                <div class="panel-body vaccination table">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Brand of Vaccine</th>
                                                    <th>1st Dose</th>
                                                    <th>2nd Dose</th>
                                                    <th>Booster Shot</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Pfizer</td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Pfizer' AND no_dose ='1st dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Pfizer' AND no_dose ='2nd dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];
                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Pfizer' AND no_dose ='Booster Shot'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Moderna</td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Moderna' AND no_dose ='1st dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Moderna' AND no_dose ='2nd dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Moderna' AND no_dose ='Booster Shot'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Johnson & Johnson</td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Johnson & Johnson' AND no_dose ='1st dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>Single Dose Only</td>
                                                    <td>Single Dose Only</td>
                                                </tr>
                                                <tr>
                                                    <td>Astrazeneca</td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Astrazeneca' AND no_dose ='1st dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Astrazeneca' AND no_dose ='2nd dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Astrazeneca' AND no_dose ='Booster Shot'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sputnik V</td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Sputnik V' AND no_dose ='1st dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Sputnik V' AND no_dose ='2nd dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Sputnik V' AND no_dose ='Booster Shot'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sinovac</td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Sinovac' AND no_dose ='1st dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Sinovac' AND no_dose ='2nd dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Sinovac' AND no_dose ='Booster Shot'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sinopharm</td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Sinopharm' AND no_dose ='1st dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Sinopharm' AND no_dose ='2nd dose'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                    <td>
                                                    <?php
                         $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE brand = 'Sinopharm' AND no_dose ='Booster Shot'";
                         $result = mysqli_query($con,$sql);
                         $values = mysqli_fetch_assoc($result);
                         $total_row = $values['total'];

                         echo $total_row ;

						?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row panel-dose">
                        <div class="col-lg-2 col-md-6 col-xs-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="text-center">
                                            <div class="huge">
                                            <?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE Vaccine_status = 'Vaccinated' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_active_cases = $values['total'];

 							echo $total_active_cases;

					?>
                                            </div>
                                            <div>Total of Vaccinated Infected Patient</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-xs-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="text-center">
                                            <div class="huge">
                                            <?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE Vaccine_status = 'Not Vaccinated' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_active_cases = $values['total'];

 							echo $total_active_cases;

					?>
                                            </div>
                                            <div>Total of Not Vaccinated Infected Patient</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-xs-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="text-center">
                                            <div class="huge">
                                            <?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE no_dose = '1st dose' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_active_cases = $values['total'];

 							echo $total_active_cases;

					?>
                                            </div>
                                            <div>Total of 1st Dose Administered</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-xs-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="text-center">
                                            <div class="huge">
                                            <?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE no_dose = '2nd dose' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_active_cases = $values['total'];

 							echo $total_active_cases;

					?>
                                            </div>
                                            <div>Total of 2nd Dose Administered</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-xs-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="text-center">
                                            <div class="huge">
                                            <?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE no_dose = 'Booster Shot' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_active_cases = $values['total'];

 							echo $total_active_cases;

					?>
			</h2>
                                            </div>
                                            <div>Total of Booster Shot Administered</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                    
                    </div>
                     
                    </div>
                    <!-- /.row -->
                
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>



        <!-- Custom Theme JavaScript -->
        <script src="js/vaccination-report.js"></script>

    </body>
</html>
