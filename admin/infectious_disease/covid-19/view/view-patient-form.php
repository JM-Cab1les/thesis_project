<?php
include_once("connect/connection.php");

$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM covid_19 WHERE id = '$id' ";
$patients = $con->query($sql) or die ($con->error);
$row = $patients->fetch_assoc();


if(isset($_POST['submit']))
{
     $f_name = $_POST['firstname'];
     $m_name = $_POST['middlename'];
     $l_name = $_POST['lastname'];
     $suffix = $_POST['suffix'];
     $gender = $_POST['sex'];
      $civil = $_POST['civil'];
     $age = $_POST['age'];
     $bdate = $_POST['birthday'];
     $email = $_POST['email-address'];
     $contact = $_POST['contact-no'];
     $address = $_POST['house-no'];
     $street = $_POST['street'];
     $barangay = $_POST['barangay'];
     $status = $_POST['status'];
     $condition = $_POST['condition'];
     $isolate = $_POST['isolation'];
     $vacc_stats = $_POST['vacc_stats'];
      $vacc_brand = $_POST['vacc_brand'];
      $vacc_dose = $_POST['vacc_dose'];
     $date_issued = $_POST['date-issued'];
     $date_recover = $_POST['date-recovered'];
     $date_die = $_POST['date-died'];

     $sql = "UPDATE covid_19 SET firstname = '$f_name', middlename = '$m_name', lastname = '$l_name',suffix = '$suffix', gender = '$gender', civil_status = '$civil', age = '$age', birthday = '$bdate', email_address = '$email', contact_no = '$contact',house_no = '$address', street = '$street', barangay = '$barangay', status = '$status', isolation_location = '$isolate', condition_status = '$condition',Vaccine_status = '$vacc_stats',brand = '$vacc_brand', no_dose = '$vacc_dose', date_issued = '$date_issued', date_recovered = '$date_recover', date_died = '$date_die' WHERE id = '$id' ";
     $con->query($sql) or die ($con->error);

     if($con)
     {
        echo "<script> alert('Patient Information Edited Successfully')</script>";
     }
     else
     {
           echo '<script>alert("Patients Information not Updated")</script>';
     }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COVID-19 DashBoard - View Patient Information</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
        <link href="css/view-patient.css" rel="stylesheet">
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
                            <li><a href="../../../../logout(1).php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                <a href="../patient_information.php"><i class="fa fa-edit fa-fw"></i>Patient Information<span class="fa arrow"></span> </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a  class="active"><i class="fa fa-user " ></i> View Patient Information</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="../barangay_cases.php"><i class="fa fa-table fa-fw"></i>Barangay Cases</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Statistical Report<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="../statistical_report.php">Current Year Report</a>
                                    </li>
                                    <li>
                                        <a href="../yearly_report.php">Past Year Reports Report</a>
                                    </li>
                                    <li>
                                        <a href="../comparative_report.php">Comparative Report</a>
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
                            <h1 class="page-header">DashBoard (COVID-19)</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center panel-header">
                                   View Patient Information
                                </div>
                               
                                <div class="panel-body">
                                    <div class="form-container">
                                        <form method="POST">
                                            <div class="row">
                                                <h4 class="text-center mb-3">Personal Details</h4>
                                                
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstname" value = "<?php echo $row['firstname']; ?>" >
                                                 </div>
                                                 <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Middle Name</label>
                                                    <input type="text" class="form-control" placeholder="Middle name" aria-label="Middle name"  name="middlename"  value="<?php echo $row['middlename'];?>">
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" placeholder="Last Name" aria-label="Last name" name='lastname' value="<?php echo $row['lastname'];?>" required>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Suffix</label>
                                                    <input type="text" class="form-control" placeholder="Suffix" aria-label="Suffix" name="suffix"  value="<?php echo $row['suffix'];?>">
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Gender</label>
                                                    <select class="form-control form-container" name="sex">
                                                        <option selected>Gender</option>
                                                        <option value = 'Female' <?php echo ($row['gender']=="Female")? 'selected' : '' ;?>>Female</option>
                                                        <option value = 'Male' <?php echo ($row['gender']=="Male")? 'selected' : '' ;?>>Male</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Civil Status</label>
                                                    <select class="form-control form-container" name="civil">
                                                        <option selected style="font-size:1.2rem">Civil Status</option>
                                                        <option value = 'Single' <?php echo ($row['civil_status']=="Single")? 'selected' : '' ;?>>Single</option>
                                                        <option value = 'Married' <?php echo ($row['civil_status']=="Married")? 'selected' : '' ;?>>Married</option>
                                                        <option value = 'Spouse' <?php echo ($row['civil_status']=="Spouse")? 'selected' : '' ;?>>Spouse</option>
                                                        
                                                      </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Age</label>
                                                    <input type="number" class="form-control" placeholder="Age" aria-label="age"  name="age"  value="<?php echo $row['age'];?>">
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Birthday</label>
                                                    <input type="date" class="form-control" aria-label="Birthday" name="birthday"  value="<?php echo $row['birthday'];?>" >
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" placeholder="email-address" aria-label="email address" value="<?php echo $row['email_address'];?>" name="email-address">
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Contact No.</label>
                                                    <input type="number" class="form-control" placeholder="contact-no" aria-label="contact-no" value="<?php echo $row['contact_no'];?>" name="contact-no" >
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <h4 class="text-center mb-3">Address Details</h4>
                                                <div class="col-lg-4 col-md-6 mb-3">
                                                    <label class="form-label">House No.</label>
                                                    <input type="text" class="form-control" placeholder="house-no" value="<?php echo $row['house_no'];?>"  name="house-no" >
                                                </div>
                                                <div class="col-lg-4 col-md-6 mb-3">
                                                    <label class="form-label">Street</label>
                                                    <input type="text" class="form-control" placeholder="Street" value="<?php echo $row['street'];?>"  name="street">
                                                </div>
                                                <div class="col-lg-4 col-md-6 mb-3">
                                                    <label class="form-label">Barangay</label>
                                                    <select class="form-control form-container" name="barangay">
                                                        <option selected>Barangay</option>
                                                         <option value = 'Bagbaguin' <?php echo ($row['barangay']=="Bagbaguin")? 'selected' : '' ;?>>Bagbaguin</option>
                                                         <option value = 'Bahay Pare' <?php echo ($row['barangay']=="Bahay Pare")? 'selected' : '' ;?>>Bahay Pare</option>
                                                         <option value = 'Bancal' <?php echo ($row['barangay']=="Bancal")? 'selected' : '' ;?>> Bancal</option>
                                                         <option value = 'Banga' <?php echo ($row['barangay']=="Banga")? 'selected' : '' ;?>> Banga</option>
                                                         <option value = 'Bayugo' <?php echo ($row['barangay']=="Bayugo")? 'selected' : '' ;?>> Bayugo</option>
                                                         <option value = 'Caingin' <?php echo ($row['barangay']=="Caingin")? 'selected' : '' ;?>>Caingin</option>
                                                         <option value = 'Calvario' <?php echo ($row['barangay']=="Calvario")? 'selected' : '' ;?>>Calvario</option>
                                                         <option value = 'Camalig' <?php echo ($row['barangay']=="Camalig")? 'selected' : '' ;?>>Camalig</option>
                                                         <option value = 'Gasak' <?php echo ($row['barangay']=="Gasak")? 'selected' : '' ;?>>Gasak</option>
                                                         <option value = 'Hulo' <?php echo ($row['barangay']=="Hulo")? 'selected' : '' ;?>>Hulo</option>
                                                         <option value = 'Iba' <?php echo ($row['barangay']=="Iba")? 'selected' : '' ;?>>Iba</option>
                                                         <option value = 'Langka' <?php echo ($row['barangay']=="Langka")? 'selected' : '' ;?>>Langka</option>
                                                         <option value = 'Lawa' <?php echo ($row['barangay']=="Lawa")? 'selected' : '' ;?>>Lawa</option>
                                                         <option value = 'Libtong' <?php echo ($row['barangay']=="Libtong")? 'selected' : '' ;?>>Libtong</option>
                                                         <option value = 'Liputan' <?php echo ($row['barangay']=="Liputan")? 'selected' : '' ;?>>Liputan</option>
                                                         <option value = 'Longos' <?php echo ($row['barangay']=="Longos")? 'selected' : '' ;?>>Longos</option>
                                                         <option value = 'Malhacan' <?php echo ($row['barangay']=="Malhacan")? 'selected' : '' ;?>>Malhacan</option>
                                                         <option value = 'Pajo' <?php echo ($row['barangay']=="Pajo")? 'selected' : '' ;?>>Pajo</option>
                                                         <option value = 'Pandayan' <?php echo ($row['barangay']=="Pandayan")? 'selected' : '' ;?>>Pandayan</option>
                                                         <option value = 'Pantoc' <?php echo ($row['barangay']=="Pantoc")? 'selected' : '' ;?>>Pantoc</option>
                                                         <option value = 'Perez' <?php echo ($row['barangay']=="Perez")? 'selected' : '' ;?>>Perez</option>
                                                         <option value = 'Poblacion' <?php echo ($row['barangay']=="Poblacion")? 'selected' : '' ;?>>Poblacion</option>
                                                         <option value = 'Saluysoy' <?php echo ($row['barangay']=="Saluysoy")? 'selected' : '' ;?>>Saluysoy</option>
                                                         <option value = 'Tugatog' <?php echo ($row['barangay']=="Tugatog")? 'selected' : '' ;?>>Tugatog</option>
                                                         <option value = 'Ubihan' <?php echo ($row['barangay']=="Ubihan")? 'selected' : '' ;?>>Ubihan</option>
                                                        <option value = 'Zamora' <?php echo ($row['barangay']=="Zamora")? 'selected' : '' ;?>> Zamora</option>
                                                        
                                                      </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <h4 class="text-center">COVID-19 Details</h4>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-control form-container" name="status">
                                                        <option selected>Select Status</option>
                                                        <option value = 'Active' <?php echo ($row['status']=="Active")? 'selected' : '' ;?>>Active</option>
                                                        <option value = 'Recovered' <?php echo ($row['status']=="Recovered")? 'selected' : '' ;?>>Recovered</option>
                                                        <option  value = 'Death' <?php echo ($row['status']=="Death")? 'selected' : '' ;?>>Death</option>
                                                      </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Testing Date</label>
                                                    <input type="date" class="form-control" aria-label="Testing date"  name="test-date" value="<?php echo $row['testing_date'];?>">
                                                </div>
                                               
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Isolation Location</label>
                                                    <select class="form-control form-container"  name="isolation">
                                                        <option selected>Isolation Location</option>
                                                        <option value = 'Public Hospital' <?php echo ($row['isolation_location']=="Public Hospital")? 'selected' : '' ;?>>Public Hospital</option>
                                                        <option value = 'Private Hospital' <?php echo ($row['isolation_location']=="Private Hospital")? 'selected' : '' ;?>>Private Hospital</option>
                                                        <option value = 'Quarantine Facility' <?php echo ($row['isolation_location']=="Quarantine Facility")? 'selected' : '' ;?>>Quarantine Facility</option>
                                                        <option value = 'Home Quarantine' <?php echo ($row['isolation_location']=="Home Quarantine")? 'selected' : '' ;?>>Home Quarantine</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Condition Status </label>
                                                    <select class="form-control form-container" name="condition">
                                                        <option selected>Select Condition Status</option>
                                                        <option value = 'Asymptomatic' <?php echo ($row['condition_status']=="Asymptomatic")? 'selected' : '' ;?>>Asymptomatic</option>
                                                        <option value = 'Mild' <?php echo ($row['condition_status']=="Mild")? 'selected' : '' ;?>>Mild</option>
                                                        <option value = 'Moderate' <?php echo ($row['condition_status']=="Moderate")? 'selected' : '' ;?>>Moderate</option>
                                                        <option value = 'Severe' <?php echo ($row['condition_status']=="Severe")? 'selected' : '' ;?>>Severe</option>
                                                        <option  value = 'Critical' <?php echo ($row['condition_status']=="Critical")? 'selected' : '' ;?>>Critical</option>
                                                      </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Symptoms</label>
                                                    <input type="text" class="form-control"  name="symptoms" value="<?php echo $row['symptoms'];?>">
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Vaccination Report</label>
                                                    <select class="form-control form-container" name="vacc_stats">
                                                        <option selected>Vaccination Report</option>
                                                        <option value = 'Vaccinated' <?php echo ($row['Vaccine_status']=="Vaccinated")? 'selected' : '' ;?>>Vaccinated</option>
                                                        <option value = 'Not Vaccinated' <?php echo ($row['Vaccine_status']=="Not Vaccinated")? 'selected' : '' ;?>>Not Vaccinated</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Brand of Vaccine (if vaccinated)</label>
                                                    <select class="form-control form-container" name="vacc_brand">
                                                        <option selected>Brand of Vaccine </option>
                                                        <option value = 'Pfizer' <?php echo ($row['brand']=="Pfizer")? 'selected' : '' ;?>>Pfizer</option>
                                                        <option value = 'Astrazeneca' <?php echo ($row['brand']=="Astrazeneca")? 'selected' : '' ;?>>Astrazeneca</option>
                                                        <option value = 'Sinovac' <?php echo ($row['brand']=="Sinovac")? 'selected' : '' ;?>>Sinovac</option>
                                                        <option value = 'Johnson & Johnson' <?php echo ($row['brand']=="Johnson & Johnson")? 'selected' : '' ;?>>Johnson & Johnson</option>
                                                        <option value = 'Sinovac' <?php echo ($row['brand']=="Sinovac")? 'selected' : '' ;?>>Sinovac</option>
                                                        <option value = 'Moderna' <?php echo ($row['brand']=="Moderna")? 'selected' : '' ;?>>Moderna</option>
                                                        <option value = 'Sputnik V' <?php echo ($row['brand']=="Sputnik V")? 'selected' : '' ;?>>Sputnik V</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">No. of Dose</label>
                                                    <select class="form-control form-container" name="vacc_dose">
                                                        <option selected>No. of Dose</option>
                                                        <option value = '1st dose' <?php echo ($row['no_dose']=="1st dose")? 'selected' : '' ;?>>1st dose</option>
                                                        <option value = '2nd dose' <?php echo ($row['no_dose']=="2nd dose")? 'selected' : '' ;?>>2nd dose</option>
                                                        <option value = 'booster shot' <?php echo ($row['no_dose']=="booster shot")? 'selected' : '' ;?>>booster shot</option>
                                                        
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Date Reported</label>
                                                    <input type="date" class="form-control" aria-label="date reported"  value="<?php echo $row['date_issued'];?>" name="date-issued">
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">RTPCR Test</label>
                                                    <img src="img/<?php echo $row['rtpcr_img'];?>"> 
                                                </div>
                                            </div>
                                            <hr>
                                            <h4 class="text-center">CHU Report Details</h4>
                                            <div class="row">
                                                
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Submitted By</label>
                                                    <input type="text" class="form-control" value="<?php echo $row['submitted_by'];?>" disabled>
                                                 </div>
                                                 <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Date/Time Submitted</label>
                                                    <input type="datetime" class="form-control"  value="<?php echo $row['time_submit'];?>" disabled >
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">CHU Reporting Unit</label>
                                                    <input type="text" class="form-control"value="<?php echo $row['chu_report'];?>" disabled>
                                                 </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Date of Recovered (if the Patient Recovered </label>
                                                    <input type="date" class="form-control" aria-label="date of recover"  value="<?php echo $row['date_recovered'];?>" name="date-recovered">
                                                </div>
                                                <div class="col-lg-3 col-md-6 mb-3">
                                                    <label class="form-label">Date of Expired (if the Patient Died) </label>
                                                    <input type="date" class="form-control" aria-label="date of die"  value="<?php echo $row['date_died'];?>" name="date-died">
                                                </div>
                                            </div>
                                            <div class="row text-center" style="margin-top:3rem;">
                                                 <input type="submit" class="btn btn-primary btn-lg" name="submit"  onclick="return confirm('Click OK to confirm')">
                                            </div>
                                        </form>
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
        <script src="js/view-patient.js"></script>

      
        
    

    </body>
</html>
