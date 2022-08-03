<?php

include("connect/connection.php");

$con = connection();
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 41";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_1 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk1 = $values_jan_1['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 42";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_2 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk2 = $values_jan_2['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 43";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_3 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk3 = $values_jan_3['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 44";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_4 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk4 = $values_jan_4['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 45";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_5 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk5 = $values_jan_5['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 46";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_6 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk6 = $values_jan_6['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 47";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_7 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk7 = $values_jan_7['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 48";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_8 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk8 = $values_jan_8['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 49";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_9 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk9 = $values_jan_9['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 50";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_10 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk10 = $values_jan_10['total'];
?>

<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 51";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_11 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk11 = $values_jan_11['total'];
?>


<?php
  
  $sql = "SELECT COUNT(*) AS total from covid_19 WHERE week(date_issued) = 52";
  $result_jan = mysqli_query($con,$sql);
  $values_jan_12 = mysqli_fetch_assoc($result_jan);
  $total_jan_wk12 = $values_jan_12['total'];
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COVID-19 DashBoard - Statistical Report</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!--morris chart-->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
        <link href="css/stats_report.css?v=<?php echo time();?>" rel="stylesheet">
        <!-- Custom Fonts -->
        
 


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

     
    <body>

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
                                <a href="../../dashboard-select.php" ><i class="fa fa-dashboard fa-fw"></i> Main Dashboard</a>
                            </li>
                            <li>
                                <a href="../index.php" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="../patient_information.php"><i class="fa fa-edit fa-fw"></i> Patient Information</a>
                            </li>
                            <li>
                                <a href="../barangay_cases.php"><i class="fa fa-table fa-fw"></i>Barangay Cases</a>
                            </li>
                            <li>
                                <a href="../statistical_report.php"><i class="fa fa-bar-chart-o fa-fw"></i>Statistical Report<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="week41-52.php" class="active"><i class="fa fa-calendar fa-fw"></i> Week 41-52</a>
                                    </li>
                                   
                                </ul>
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
                            <h1 class="page-header">Statistical Report for COVID-19</h1>
                        </div>
                    </div>

                    <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center">
                                    2022 Week 41-52 Statistical Report (COVID-19)
                                </div>
                                <div class="panel-body panel-container">
                                    <canvas id="myChart"></canvas>
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
        <script src="js/stats_report.js"></script>

        <!-- Custom Theme JavaScript -->
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

        <!--Chart js cdn-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

        
    <script>
       
       const ctx = document.getElementById('myChart').getContext('2d');
       const myChart = new Chart(ctx, {
       type: 'bar',
     data: {
        labels: ['Oct 9 - Oct 15 (Week41)', 'Oct 16 - Oct 22 (Week42)', 'Oct 23 - Oct 29 (Week43)', 'Oct 30 - Nov 5 (Week44)','Nov 6 - Nov 12 (Week45)','Nov 13 - Nov 19 (Week46)','Nov 20 - Nov 26 (Week47)','Nov 27 - Dec 3 (Week48)',    'Dec 4 - Dec 10 (Week49)','Dec 11 -  Dec 17 (Week50)' , 'Dec 18 -  Dec 24 (Week51)' , 'Dec 25 -  Dec 31 (Week52)'],
        datasets: [{
            label: 'No. of Cases',
            data: [<?php echo $total_jan_wk1;?>, <?php echo $total_jan_wk2;?>, <?php echo $total_jan_wk3;?>,  <?php echo $total_jan_wk4;?> , <?php echo $total_jan_wk5;?> , <?php echo $total_jan_wk6;?> , <?php echo $total_jan_wk7;?> , <?php echo $total_jan_wk8;?> , <?php echo $total_jan_wk9;?> ,  <?php echo $total_jan_wk10;?>,  <?php echo $total_jan_wk11;?> ,  <?php echo $total_jan_wk12;?> ],
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
