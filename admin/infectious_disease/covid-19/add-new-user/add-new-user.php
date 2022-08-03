<?php
include ('connect/connection.php');

$con = connection();

if(isset($_POST['submit']))
{
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $position = $_POST['position'];
    $chu = $_POST['chu'];

    $sql = "INSERT INTO user (firstname,lastname,position,barangay_accessed,username,contact_no,password) VALUES('$fname','$lname','$position','$chu','$username','$contact','$password')";

    $execute = mysqli_query($con,$sql) or die(mysqli_error($con));

    if($execute > 0)
    {
        header("Location: add-new-user.php?success=New User Added");
    }
    else
    {
         echo "<script> alert('No User Added')</script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COVID-19 DashBoard - Manage User</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
        <link href="css/manage_user.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <li><a href="../../../../../../login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                <a href="...patient_information.php"><i class="fa fa-edit fa-fw"></i> Patient Information</a>
                            </li>
                            <li>
                                <a href="../barangay_cases.php"><i class="fa fa-table fa-fw"></i>Barangay Cases</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Statistical Report</a>
                                
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="../vaccination_report.php"><i class="fa fa-edit fa-fw"></i>Vaccination Report</a>
                            </li>
                            <li>
                                <a href="../manage_user.php"><i class="fa fa-user fa-fw"></i><span class="fa arrow"></span>Manage User</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="add-new-user.php" class="active"><i class="fa fa-user-plus"></i> Add New User</a>
                                    </li>
                                   
                                </ul>
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
                </div>

                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="add-new-user-panel panel panel-default">
                            <div class="panel-heading text-center">
                                <h3 class="panel-title"><i class="fa fa-user-plus"></i> Add New User</h3>
                            </div>
                            <div class="panel-body">    
                                <form role="form" method="POST">
                                    
                                    <fieldset>
                                       <div class="msg text-center" style="margin-bottom:.9rem; margin-top:.9rem">
                                       <?php if(isset($_GET['success'])) { ?>
                                        <span class="alert alert-success">
                                            <?php echo $_GET['success']; ?>
                                        </span>
                                        <?php } ?>
                                       </div>
                                        <div class="form-group">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control" placeholder="First Name" name="firstname" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">LastName</label>
                                            <input class="form-control" placeholder="First Name" name="lastname" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Position</label>
                                            <select class="form-control form-container" name="position">
                                                <option selected>Select Position</option>
                                                <option value="Barangay Health Officer">Barangay Health Officer</option>
                                                <option value="Nurse">Nurse</option>
                                                <option value="Doctor">Doctor</option>
                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Reporting Unit</label>
                                            <select class="form-control form-container" name="chu">
                                                <option selected>CHU Unit</option>
                                                <option value="CHU-I">CHU-I</option>
                                                <option value="CHU-II">CHU-II</option>
                                                <option value="CHU-III">CHU-III</option>
                                                <option value="CHU-IV">CHU-IV</option>
                                                <option value="CHU-V">CHU-V</option>
                                                <option value="CHU-VI">CHU-VI</option>
                                                <option value="CHU-VII">CHU-VII</option>
                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input class="form-control" placeholder="******" name="password" type="password" autofocus>
                                        </div>
                                        <!-- Change this to a button or input when using this as a form -->
                                        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Register" name='submit'>
                                    </fieldset>
                                </form>
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
        <script src="js/manage_user.js"></script>

        <!-- Custom Theme JavaScript -->
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

        
    

    </body>
</html>
