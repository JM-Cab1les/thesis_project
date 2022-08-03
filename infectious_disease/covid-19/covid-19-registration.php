<?php
 error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
 ini_set('display_errors',true);
use PHPMAiler\PHPMailer\PHPMailer;
 if(!isset($_SESSION)){
    session_start();
}


include("connect/connection.php");




$con = connection();

if(isset($_POST['submit']))
{
     $firstname = $_POST['firstname'];
     $middlename = $_POST['middlename'];
     $lastname = $_POST['lastname'];
     $suffix = $_POST['suffix'];
     $gender = $_POST['sex'];
     $civil = $_POST['civil'];
     $age = $_POST['age'];
     $birthday = $_POST['birthday'];
     $email = $_POST['email-address'];
     $house_no = $_POST['house-no'];
     $street = $_POST['street'];
     $barangay_location = $_POST['barangay'];
     $barangay_email = $_POST['barangay'];
     $status = $_POST['status'];
     $test_date = $_POST['test-date'];
    $name = $_FILES['file']['name'];
     $target_dir = "../../img/";
     $target_file = $target_dir . basename($_FILES["file"]["name"]);
     $isolate = $_POST['isolation'];
     $condition = $_POST['condition'];
     $symptoms = $_POST['symptoms'];
     $chk = "";
     foreach($symptoms as $chk1)
     {
         $chk .= $chk1.", ";
     }
     $vac_stats = $_POST['vaccine_stats'];
     $vac_brands = $_POST['vaccine'];
     $vac_dose = $_POST['no_vaccine'];
     $date_issued = $_POST['date-issued'];
     $contact_no = $_POST['contact-no'];
     $user = $_SESSION['userlogin']." ".$_SESSION["userlastname"];
     $date = new \DateTime();
     $barangay = $_SESSION['useraccessed'];
        $date->setTimezone(new \DateTimeZone('+0800')); 
        $date_time_submitted = $date->format('Y-m-d H:i:s');
    $path = 'images/';
     $file = $path.$firstname.'.png';
     

   $sql = "INSERT INTO covid_19 (firstname,middlename,lastname,suffix,gender,civil_status,age,birthday,email_address,contact_no,house_no,street,barangay,status,testing_date,rtpcr_img,isolation_location,condition_status,symptoms,Vaccine_status,brand,no_dose,date_issued,submitted_by,chu_report,time_submit) VALUES ('$firstname','$middlename','$lastname','$suffix','$gender','$civil','$age','$birthday','$email','$contact_no','$house_no','$street','$barangay_location','$status','$test_date','$target_file','$isolate','$condition','$chk','$vac_stats','$vac_brands','$vac_dose', '$date_issued','$user','$barangay','$date_time_submitted')";
   $execute = mysqli_query($con,$sql) or die(mysqli_error($con));  

  

   
   if($execute > 0)

   {
     
      header("Location: covid-19-registration.php?success=Form Submitted");
      $date = new \DateTime();
      $date->setTimezone(new \DateTimeZone('+0800')); 
      $date_time = $date->format('Y-m-d H:i:s');


      $user_name = $_SESSION['userlogin']." ".$_SESSION['userlastname'];
      

      $sqls = "INSERT INTO activity_log (name,barangay,time_activity) VALUES ('$user_name','$barangay','$date_time')";
      $executes = mysqli_query($con,$sqls) or die(mysqli_error($con));


      require_once "PHPMailer/src/Exception.php";
      require_once "PHPMailer/src/PHPMailer.php";
      require_once "PHPMailer/src/SMTP.php";

      $mail = new PHPMailer();

      $mail->isSMTP();
      $mail->Host = "smtp.hostinger.com";
      $mail->SMTPAuth = true;
      $mail->Username = 'qrcodemail@meycauayancityhealthoffice.online';
      $mail->Password = 'Qrcodemailsend@1';
      $mail->Port = 465;
      $mail->SMTPSecure = "ssl";
      $mail->isHTML(true);
      $mail->addAddress($email); 
      $mail->SetFrom('qrcodemail@meycauayancityhealthoffice.online', 'QRcode Meycauayan Health Office');
      $mail->Subject = ("Online Infectious Disease Profiling Patient (COVID_19 Form) ($firstname)");
      $mail->Body = "<h1> This is your Personal generated QR Code Present this to Health Worker for your Identity Validity</h1>"."\n"."<h3> Full Name: </h3>".$firstname. " ".$middlename." ".$lastname. " "."\n"."<h3> Barangay: </h3> <br>". $barangay_email;
      $mail->addAttachment($file);
      var_dump($mail->send());
     
   }
   else
   {
     echo "<script> alert('Form not Submitted')</script>";
   }    
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVID-19 Registration Select</title>
   
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <nav class="navbar navbar-fixed-top bg-dark" role="navigation">
        <div class="navbar-header-logo">
            <a class="navbar-brand" href="#">
                <img src="img/seal.png">
            </a>
            <a class="navbar-brand brand-text" href="index.html">Meycauayan ID HealthCare</a>
        </div>
        <div class="dropdown dropdown-container">
            <button class="btn btn-secondary " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-caret-down"></i>
            </button>
                <ul class="dropdown-menu menu-item" aria-labelledby="dropdownMenu">
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> 
                    <?php
                   
                        if(isset($_SESSION['userlogin'])){

                        echo $_SESSION['userlogin'];
                        }

                   ?>    
                    </a></li>
                    <li><a class="dropdown-item" href="../registration-select.php"><i class="fa-solid fa-gauge"></i> DashBoard</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../../logout(1).php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </ul>
          </div>
    </nav>
    <div class="form-wrapper container">
        <h1 class="text-center mb-3 mt-3">COVID-19 Patient Registration</h1>
        <form method="post">
            <div class="row">
                <h2 class="text-center mb-3">Personal Details</h2>
                <?php if(isset($_GET['success'])) { ?>
                              <span class="alert alert-success">
                                   <?php echo $_GET['success']; ?>
                              </span>
                              <?php } ?>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstname" required> 
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" placeholder="Middle name" aria-label="Middle name"  name="middlename" required>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name" aria-label="Suffix"  name="lastname" required>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Suffix</label>
                    <input type="text" class="form-control" placeholder="Suffix" aria-label="suffix"  name="suffix" >
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Gender</label>
                    <select class="form-select form-container" aria-label="Default select example"  name="sex" required>
                        <option selected>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        
                      </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Civil Status</label>
                    <select class="form-select form-container" aria-label="Default select example" name="civil" required>
                        <option selected style="font-size:1.2rem">Civil Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widow">Widow</option>
                        
                      </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Age</label>
                    <input type="number" class="form-control" placeholder="Age" aria-label="age" name="age" required> 
                </div>

                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Birthday</label>
                    <input type="date" class="form-control" aria-label="birthday"  name="birthday" required>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Email Address (Optional)</label>
                    <input type="email" class="form-control" placeholder="email-address" aria-label="email-address"  name="email-address">
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Contact No.</label>
                    <input type="number" class="form-control" placeholder="contact-no" aria-label="contact-no"  name="contact-no" required>
                </div>
                
            </div>
            <hr>
            <div class="row">
                <h2 class="text-center">Address details</h2>
                <div class="col-lg-4 col-md-6 mb-3">
                    <label class="form-label">House No.</label>
                    <input type="text" class="form-control" placeholder="house-no" name="house-no" required>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <label class="form-label">Street</label>
                    <input type="text" class="form-control" placeholder="Street" name="street" required>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <label class="form-label">Barangay</label>
                    <select class="form-select form-container" name="barangay" required>
                        <option selected>Barangay</option>
                        <option value="Bagbaguin">Bagbaguin</option>
                         <option value="Bahay Pare">Bahay Pare</option>
                         <option value="Bancal">Bancal</option>
                         <option value="Banga">Banga</option>
                         <option value="Bayugo">Bayugo</option>
                         <option value="Caingin">Caingin</option>
                         <option value="Calvario">Calvario</option>
                         <option value="Camalig">Camalig</option>
                         <option value="Gasak">Gasak</option>
                         <option value="Hulo">Hulo</option>
                         <option value="Iba">Iba</option>
                         <option value="Langka">Langka</option>
                         <option value="Lawa">Lawa</option>
                         <option value="Libtong">Libtong</option>
                         <option value="Liputan">Liputan</option>
                         <option value="Longos">Longos</option>
                         <option value="Malhacan">Malhacan</option>
                         <option value="Pajo">Pajo</option>
                         <option value="Pandayan">Pandayan</option>
                         <option value="Pantoc">Pantoc</option>
                         <option value="Perez">Perez</option>
                         <option value="Poblacion">Poblacion</option>
                         <option value="Saluysoy">Saluysoy</option>
                         <option value="Tugatog">Tugatog</option>
                         <option value="Ubihan">Ubihan</option>
                         <option value="Zamora">Zamora</option>
                        
                      </select>
                </div>
            </div>
            <hr>
            <div class="row">
                <h2 class="text-center">Covid-19 Details</h2>

                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select form-container" name="status" required>
                        <option selected>Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Recovered">Recovered</option>
                        <option value="Death">Death</option>
                      </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Testing Date</label>
                    <input type="date" class="form-control" aria-label="Testing Date" name="test-date" required> 
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">RTPCR Test</label>
                    <input type="file" class="form-control" aria-label="rtpcr" name="file" required>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Isolation Location</label>
                    <select class="form-select form-container" name="isolation" required>
                        <option selected>Isolation Location</option>
                        <option value="Private Hospital">Private Hospital</option>
                        <option value="Public Hospital">Public Hospital</option>
                        <option value="Quarantine Facility">Quarantine Facility</option>
                        <option value="Home Quarantine">Home Quarantine</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Condition Status</label>
                    <select class="form-select form-container" name="condition" required>
                        <option selected>Select Condition Status</option>
                        <option value="Asymptomatic">Asymptomatic</option>
                        <option value="Mild">Mild</option>
                        <option value="Severed">Severed</option>
                        <option value="Moderate">Moderate</option>
                        <option value="Critical">Critical</option>
                      </select>
                </div>
                <div class="col-lg-3 col-md-2 mb-3 ">
                    <h4>Symptoms (if not Asymptomatic)</h4>
                    <input class="form-check-input" type="checkbox" value="lost of taste" id="flexCheckChecked" name="symptoms[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        lost of taste
                    </label>
                    <input class="form-check-input" type="checkbox" value="fever" id="flexCheckChecked"  name="symptoms[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        fever
                    </label>
                    <input class="form-check-input" type="checkbox" value="cough" id="flexCheckChecked"  name="symptoms[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        cough
                    </label>
                    <input class="form-check-input" type="checkbox" value="difficulty of breath" id="flexCheckChecked"  name="symptoms[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        difficulty of breath
                    </label>
                    <input class="form-check-input" type="checkbox" value="diarrhea" id="flexCheckChecked"  name="symptoms[]" >
                    <label class="form-check-label" for="flexCheckChecked">
                        diarrhea
                    </label>
                    <input class="form-check-input" type="checkbox" value="nausea" id="flexCheckChecked"  name="symptoms[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        nausea
                    </label>
                    <input class="form-check-input" type="checkbox" value="headache" id="flexCheckChecked"  name="symptoms[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        headache
                    </label>
                    <input class="form-check-input" type="checkbox" value="fatigue" id="flexCheckChecked"  name="symptoms[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        fatigue
                    </label>
                    <input class="form-check-input" type="checkbox" value="sore throat" id="flexCheckChecked"  name="symptoms[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        sore throat
                    </label>
                    <input class="form-check-input" type="checkbox" value="vomiting" id="flexCheckChecked"  name="symptoms[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        vomiting
                    </label>
                    <input class="form-check-input" type="checkbox" value="anorexia" id="flexCheckChecked"  name="symptoms[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        anorexia
                    </label>
                    <input class="form-check-input" type="checkbox" value="miyalgia" id="flexCheckChecked"  name="symptoms[]">
                    <label class="form-check-label" for="flexCheckChecked">
                        miyalgia
                    </label>
                </div>

                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Vaccination Status</label>
                    <select class="form-select form-container" name="vaccine_stats">
                        <option selected>Vaccination Status</option>
                        <option value="Vaccinated">Vaccinated</option>
                        <option value="Not Vaccinated">Not Vaccinated</option>
                        
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Brand of Vaccine</label>
                    <select class="form-select form-container" name="vaccine">
                        <option selected>Brand of Vaccine (if Vaccinated)</option>
                        <option value="Pfizer">Pfirzer</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Sputnik V">Sputnik V</option>
                        <option value="Astrazeneca">Astrazeneca</option>
                        <option value="Sinovac">Sinovac</option>
                        <option value="Sinopharm">Sinopharm</option>
                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                        
                        
                    </select>
                </div>

                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">No. of Dose (if Vaccinated)</label>
                    <select class="form-select form-container" name="no_vaccine">
                        <option selected>No. of Dose</option>
                        <option value= "1st dose">1</option>
                        <option value= "2nd dose">2</option>
                        <option value= "Booster Shot">booster shot</option>
                        
                        
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <label class="form-label">Date Reported</label>
                    <input type="date" class="form-control" aria-label="date reported" name="date-issued">
                </div>
                
            </div>
            <div class="btn-grp mb-3">
                <button class="btn btn-primary btn-lg btn-submit" name="submit">Submit</button>
            </div>
        </form>
    </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>