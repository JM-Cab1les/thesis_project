<?php
include ('connect/connection.php');

$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM user WHERE id = '$id' ";
$user= $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();


if(isset($_POST['submit']))
{
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $position = $_POST['position'];
    $barangay = $_POST['chu'];

    $sql = "UPDATE user SET firstname = '$fname', lastname = '$lname', position = '$position', barangay_accessed = '$barangay', username = '$username', password_user = '$password', contact_no = '$contact' WHERE id = '$id' ";

    $execute = mysqli_query($con,$sql) or die(mysqli_error($con));

    if($execute > 0)
    {
        echo "<script> alert('User Information Edited Successfully')</script>";
    }
    else
    {
         echo "<script> alert('Error')</script>";
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
        <link href="css/edit_user.css" rel="stylesheet">
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
                            <li><a href="../../../../../../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                <a href="../statistical_report.php"><i class="fa fa-bar-chart-o fa-fw"></i>Statistical Report</a>
                                
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="../vaccination_report.php"><i class="fa fa-edit fa-fw"></i>Vaccination Report</a>
                            </li>
                            <li>
                                <a href="../manage_user.php"><i class="fa fa-user fa-fw"></i><span class="fa arrow"></span>Manage User</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="edit-user.php" class="active"><i class="fa fa-pencil-square-o"></i> Edit User</a>
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
                                <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> Edit User</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method='POST'>
                                    <fieldset>
                                        
                                        <div class="form-group">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control" type="text" placeholder="First Name" name="firstname" value="<?php echo $row['firstname'];?>"  autofocus >
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">LastName</label>
                                            <input class="form-control" type="text" placeholder="First Name" name="lastname" value="<?php echo $row['lastname'];?>"  autofocus >
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Position</label>
                                            <select class="form-control form-container" name="position">
                                                <option selected>Select Position</option>
                                                <option value='Barangay Health Worker' <?php echo ($row['position']== "Barangay Health Worker")? 'selected' : '' ;?>>Barangay Health Worker</option>
                                                <option value='Nurse' <?php echo ($row['position']== "Nurse")? 'selected' : '' ;?>>Nurse</option>
                                                 <option value='Doctor' <?php echo ($row['position']== "Doctor")? 'selected' : '' ;?>>Doctor</option>
                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Reporting Unit</label>
                                            <select class="form-control form-container" name="chu">
                                                <option selected>CHU Unit</option>
                                                <option value='CHU-I' <?php echo ($row['barangay_accessed']== "CHU-I")? 'selected' : '' ;?>>CHU-I</option>
                                                <option value='CHU-II' <?php echo ($row['barangay_accessed']== "CHU-II")? 'selected' : '' ;?>>CHU-II</option>
                                                <option value='CHU-III' <?php echo ($row['barangay_accessed']== "CHU-III")? 'selected' : '' ;?>>CHU-III</option>
                                                <option value='CHU-IV' <?php echo ($row['barangay_accessed']== "CHU-IV")? 'selected' : '' ;?>>CHU-IV</option>
                                                <option value='CHU-V' <?php echo ($row['barangay_accessed']== "CHU-V")? 'selected' : '' ;?>>CHU-V</option>
                                                <option value='CHU-VI' <?php echo ($row['barangay_accessed']== "CHU-VI")? 'selected' : '' ;?>>CHU-VI</option>
                                                <option value='CHU-VII' <?php echo ($row['barangay_accessed']== "CHU-VII")? 'selected' : '' ;?>>CHU-VII</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Contact No</label>
                                            <input class="form-control" placeholder="contact-no" name="contact" type="number" autofocus  value="<?php echo $row['contact_no'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input class="form-control" placeholder="Username" name="username" type="text" autofocus  value="<?php echo $row['username'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" placeholder="******" name="password"  autofocus  value="<?php echo $row['password_user'];?>">
                                        </div>
                                        
                                        <!-- Change this to a button or input when using this as a form -->
                                        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Edit" name="submit" onclick="return confirm('Click OK to confirm')">
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
        <script src="js/edit_user.js"></script>

        <!-- Custom Theme JavaScript -->
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

        
    

    </body>
</html>
