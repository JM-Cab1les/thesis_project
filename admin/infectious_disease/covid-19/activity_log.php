<?php
include("connect/connection.php");

$con = connection();


$sql = "SELECT * FROM activity_log ORDER BY id DESC";
$data = $con->query($sql) or die ($con->error);
$row = $data->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COVID-19 DashBoard - Activity Log</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
        <link href="css/activity_log.css?v=<?php echo time();?>" rel="stylesheet">
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
                                <a href="manage_user.php" ><i class="fa fa-user fa-fw"></i>Manage User</a>
                            </li>
                            <li>
                                <a href="activity_log.php" class="active"><i class="fa fa-edit fa-fw"></i>Activity Log</a>
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
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center panel-header">
                                    Activity Log
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive table-patient">
                                        <table class="table table-striped table-bordered table-hover dataTables" id="userTables">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Reporting Unit</th>
                                                    <th>Date/Time Submitted</th>
                                                
                                                </tr>
                                                <tbody>
                                                <?php do{ ?>
                                                    <tr>
                                                        <td>
                                                         <?php echo $row['name'];?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['barangay'];?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['time_activity'];?>
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php }while($row = $data->fetch_assoc()) ?>
                                                   
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
         <!-- Custom Theme JavaScript -->
        <script src="js/activity_log.js"></script>

       
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

        
    

    </body>
</html>
