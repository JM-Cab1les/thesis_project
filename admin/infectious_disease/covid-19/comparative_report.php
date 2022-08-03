<?php

include("connect/connection.php");

$con = connection();
$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 3";
 $marchresult = mysqli_query($con,$sql);
 $marchvalues = mysqli_fetch_assoc($marchresult);
 $total_march = $marchvalues['total']; 
?>

<?php


$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 1";
 $jan_results = mysqli_query($con,$sql);
 $january_values = mysqli_fetch_assoc($jan_results);
 $total_jan = $january_values['total']; 
?>

<?php


$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 2";
 $feb_results = mysqli_query($con,$sql);
 $feb_values = mysqli_fetch_assoc($feb_results);
 $total_feb = $feb_values['total']; 
?>

<?php


$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 4";
 $apr_results = mysqli_query($con,$sql);
 $apr_values = mysqli_fetch_assoc($apr_results);
 $total_apr = $apr_values['total']; 
?>

<?php


$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 5";
 $may_results = mysqli_query($con,$sql);
 $may_values = mysqli_fetch_assoc($may_results);
 $total_may = $may_values['total']; 
?>

<?php


$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 6";
 $june_results = mysqli_query($con,$sql);
 $june_values = mysqli_fetch_assoc($june_results);
 $total_june = $june_values['total']; 
?>

<?php


$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 7";
 $july_results = mysqli_query($con,$sql);
 $july_values = mysqli_fetch_assoc($july_results);
 $total_july = $july_values['total']; 
?>

<?php


$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 8";
 $aug_results = mysqli_query($con,$sql);
 $aug_values = mysqli_fetch_assoc($aug_results);
 $total_aug = $aug_values['total']; 
?>

<?php


$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 9";
 $sept_results = mysqli_query($con,$sql);
 $sept_values = mysqli_fetch_assoc($sept_results);
 $total_sept = $sept_values['total']; 
?>


<?php


$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 10";
 $oct_results = mysqli_query($con,$sql);
 $oct_values = mysqli_fetch_assoc($oct_results);
 $total_oct = $oct_values['total']; 
?>

<?php


$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 11";
 $nov_results = mysqli_query($con,$sql);
 $nov_values = mysqli_fetch_assoc($nov_results);
 $total_nov = $nov_values['total']; 
?>


<?php

$sql = "SELECT COUNT(*) AS total from covid_19 WHERE month(date_issued) = 12";
 $dec_results = mysqli_query($con,$sql);
 $dec_values = mysqli_fetch_assoc($dec_results);
 $total_dec = $dec_values['total']; 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COVID-19 DashBoard - Comparative Report</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!--morris chart-->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
        <link href="css/comparative_report.css?v=<?php echo time();?>" rel="stylesheet">
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
                                <a href="../dashboard-select.php" ><i class="fa fa-dashboard fa-fw"></i> Main Dashboard</a>
                            </li>
                            <li>
                                <a href="index.php" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="patient_information.php"><i class="fa fa-edit fa-fw"></i> Patient Information</a>
                            </li>
                            <li>
                                <a href="barangay_cases.php"><i class="fa fa-table fa-fw"></i>Barangay Cases</a>
                            </li>
                            <li>
                                <a href="statistical_report.php"><i class="fa fa-bar-chart-o fa-fw"></i>Statistical Report<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="statistical_report.php">Current Year Report</a>
                                    </li>
                                    <li>
                                        <a href="yearly_report.php">Past Year Reports</a>
                                    </li>
                                    <li>
                                        <a href="comparative_report.php" class="active">Comparative Report</a>
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
                        <div class="col-lg-12" >
                            <h1 class="page-header">Statistical Report for COVID-19 (Past Years Report)</h1>
                        </div>
                        
                    </div>
                      
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default panel-container">
                                <div class="panel-heading text-center">
                                    Comparative Report
                                </div>
                                <div class="panel-body">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="row panel-legend">

                        <div class="col-lg-2 col-md-2">
                            <div class="panel panel-green panel-section panel-wrapper">
                                <div class="panel-heading text-center">
                                    2020
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <div class="panel panel-primary panel-section panel-wrapper">
                                <div class="panel-heading text-center">
                                    2021
                                </div>
                            </div>
                     </div>

                     <div class="col-lg-2 col-md-2">
                        <div class="panel panel-section panel-wrapper">
                            <div class="panel-heading text-center">
                                2022
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
        <script src="js/comparative_report.js"></script>

        <!-- Custom Theme JavaScript -->
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

        <!--Morris js cdn-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

        
    <script>
       
       const ctx = document.getElementById('myChart').getContext('2d');
       const myChart = new Chart(ctx, {
       type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November','December'],
            datasets: [{
            label: '2021 Covid Cases',
            data: [12, 19, 3, 5, 2, 3,50,80,77,65,17,26],
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
        },{
            labels: ['January', 'February', 'March','April','May','June','July','August','September','October','November','December'],
            label: '2022 Covid Cases',
            data: [<?php echo $total_jan; ?>, <?php echo $total_feb; ?>,<?php echo $total_march; ?>, <?php echo $total_apr; ?>,<?php echo $total_may; ?> , <?php echo $total_june; ?>,<?php echo $total_july; ?> , <?php echo $total_aug; ?>,<?php echo $total_sept; ?>,<?php echo $total_oct; ?>,<?php echo $total_nov; ?>,<?php echo $total_dec; ?>],
            backgroundColor: [
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
             
            ],
            borderColor: [
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
                '#FF0000',
            ],
            borderWidth: 1,
            barThickness: 20
        }, {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November','December'],
            label: '2020 Covid Cases',
           data: [112,89,90,44,55,67,53,12,33,45,76,45],
            backgroundColor: [
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
             
            ],
            borderColor: [
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
                '#00FF00',
            ],
            borderWidth: 1,
             barThickness: 20
        }
    ]},
    options: {
        plugins:{
            legend:{
                display:false
            }

        },
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
