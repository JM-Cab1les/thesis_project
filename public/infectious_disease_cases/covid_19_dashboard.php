<?php
include_once("connect/connection.php");
$con = connection();


?>
<?php

$sql = "SELECT level_status FROM alert_level";
$status = $con->query($sql) or die($con->error);
$execute = $status->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COVID-19 CASES - DashBoard</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
       
        <link href="css/public_dashboard.css?v=<?php echo time();?>" rel="stylesheet">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

     
    <body class="bg-light">

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header-logo">
                    <a class="navbar-brand" href="index.html">
                        <img src="img/seal.png">
                    </a>
                    <a class="navbar-brand" href="index.html">Meycauayan ID HealthCare</a>
                </div>

              

                <ul class="nav navbar-right navbar-top-links">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="../index.html"><i class="fa fa-dashboard fa-fw"></i> DashBoard</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

               
            </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 page-container">
                            <h1 class="page-header text-center">DashBoard (COVID-19 - CASES)</h1>
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
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_recovered_cases = $values['total'];

 							echo $total_recovered_cases;

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
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_active_cases = $values['total'];

 							echo $total_active_cases;

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
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_death_cases = $values['total'];

 							echo $total_death_cases;

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
                        <h3 class="text-center">Alert Level Status in City of Meycauayan</h3>
                        <h4 class="text-center">By IATF Guidelines</h4>
                    </div>
                    <ul class="list-inline text-center alert-no">
                        <li>
                            <p>
                            <?php
	                         if ($execute['level_status'] == 0)
	                         {
	                             echo "<a style = background-color:#013f28;padding:15px;border-radius:50%;color:#ffffff;>0</a>";
	                         }
	                         else if($execute['level_status'] != 0)
	                        {
	                             echo "0";
	                        }
	                             ?>
                            </p>
                        </li>
                        <li>
                        <p>
                        <?php
	         	            if ($execute['level_status'] == 1)
	                            {
	                                echo "<a style = background-color:#013f28;padding:10px;border-radius:50%;color:#ffffff;>1</a>";
	                            }
	                            else if($execute['level_status'] !=1 )
	                            {
	                             echo "1";
	                            }
	                        ?>
                        </p>
                        </li>
                        <li>
                        <p>
                            <?php
	                        if ($execute['level_status'] ==2 )
	                        {   
	                             echo "<a style = background-color:#013f28;padding:10px;border-radius:50%;color:#ffffff;>2</a>";
	                        }
	                        else if($execute['level_status'] !=2 )
	                        {
	                            echo "2";
	                        }
	                     ?>
                         </p>
                        </li>
                        <li>
                            <p>
                            <?php
	                        if ($execute['level_status'] ==3 )
	                        {
	                            echo "<a style = background-color:#ffa500;padding:10px;border-radius:50%;color:#ffffff;>3</a>";
	                        }
	                        else if($execute['level_status'] !=3 )
	                        {
	                            echo "3";
	                        }
	                        ?>
                            </p>
                        </li>
                        <li>
                            <p>
                            <?php
	                        if ($execute['level_status'] ==4 )
	                     {
	                          echo "<a style = background-color:#ff4500;padding:10px;border-radius:50%;color:#ffffff;>4</a>";
	                    }
	                    else if($execute['level_status'] !=4 )
	                    {
	                        echo "4";
	                    }
	                    ?>
                            </p>
                        </li>
                        <li>
                             <p>
                             <?php
	                        if ($execute['level_status'] ==5 )
	                        {
	                            echo "<a style = background-color:#FF0000;padding:10px;border-radius:50%;color:#ffffff;>5</a>";
	                        }
	                        else if($execute['level_status'] !=5 )
	                        {
	                            echo "5";
	                        }
	                        ?>
                            </p>
                        </li>
                        
                    </ul>
                    <h5 class="text-center">Note:In column of List of Sitio/Street that Implement Lockdown if the implemented display in column of lockdown status it means the entire barangay is under granular lockdown</h5>
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
                                                    <th>Lockdown Status</th>
                                                    <th>SItio/street that implement lockdown</th>
                                                </tr>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Bagbaguin
                                                        </td>
                                                        <td>
                                                        <?php
							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bagbaguin'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_confirmed_cases = $values['total'];

 							echo $total_bagbaguin_confirmed_cases;

							?>
                                                        </td>
                                                        <td>
                                                        <?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bagbaguin' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_active_cases = $values['total'];

 							echo $total_bagbaguin_active_cases;

							?>
                                                        </td>
                                                        <td>
                                                        <?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bagbaguin' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_recovered_cases = $values['total'];

 							echo $total_bagbaguin_recovered_cases;

							?>
                                                        </td>
                                                        <td>
                                                        <?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bagbaguin' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_death_cases = $values['total'];

 							echo $total_bagbaguin_death_cases;

							?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Bagbaguin'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Bagbaguin'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $bagbaguin_arr = implode($executed);
                                                            echo "$bagbaguin_arr";
                                                        ?>   
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                           Bahay Pare
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bahay Pare'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bahaypare_confirmed_cases = $values['total'];

                                                            echo $total_bahaypare_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php                                                             
                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bahay Pare' AND status = 'Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bahaypare_active_cases = $values['total'];

                                                            echo $total_bahaypare_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php                                                             
                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bahay Pare' AND status = 'Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bahaypare_recovered_cases = $values['total'];

                                                            echo $total_bahaypare_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php                                                             
                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bahay Pare' AND status = 'Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bahaypare_death_cases = $values['total'];

                                                            echo $total_bahaypare_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                         <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Bahay Pare'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Bahay Pare'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $bahaypare_arr = implode($executed);
                                                            echo "$bahaypare_arr";
                                                        ?>                           
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Bancal
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bancal'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bancal_confirmed_cases = $values['total'];

                                                            echo $total_bancal_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bancal' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bancal_active_cases = $values['total'];

                                                            echo $total_bancal_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bancal' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bancal_recovered_cases = $values['total'];

                                                            echo $total_bancal_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bancal' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bancal_recovered_cases = $values['total'];

                                                            echo $total_bancal_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Bahay Pare'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Bancal'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $bancal_arr = implode($executed);
                                                            echo "$bancal_arr";
                                                        ?>          
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Banga
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Banga'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_banga_confirmed_cases = $values['total'];

                                                            echo $total_banga_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Banga' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_banga_active_cases = $values['total'];

                                                            echo $total_banga_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Banga' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_banga_recovered_cases = $values['total'];

                                                            echo $total_banga_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Banga' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_banga_death_cases = $values['total'];

                                                            echo $total_banga_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Banga'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Banga'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $banga_arr = implode($executed);
                                                            echo "$banga_arr";
                                                        ?>    
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Bayugo
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bayugo'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bayugo_confirmed_cases = $values['total'];

                                                            echo $total_bayugo_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bayugo' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bayugo_active_cases = $values['total'];

                                                            echo $total_bayugo_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bayugo' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bayugo_recovered_cases = $values['total'];

                                                            echo $total_bayugo_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bayugo' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_bayugo_death_cases = $values['total'];

                                                            echo $total_bayugo_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Bayugo'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Bayugo'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $bayugo_arr = implode($executed);
                                                            echo "$bayugo_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Caingin
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Caingin'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_caingin_confirmed_cases = $values['total'];

                                                            echo $total_caingin_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Caingin' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_caingin_active_cases = $values['total'];

                                                            echo $total_caingin_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Caingin' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_caingin_recovered_cases = $values['total'];

                                                            echo $total_caingin_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Caingin' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_caingin_death_cases = $values['total'];

                                                            echo $total_caingin_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Caingin'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                         <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Caingin'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $caingin_arr = implode($executed);
                                                            echo "$caingin_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Calvario
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Calvario'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_calvario_confirmed_cases = $values['total'];

                                                            echo $total_calvario_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Calvario' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_calvario_active_cases = $values['total'];

                                                            echo $total_calvario_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Calvario' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_calvario_recovered_cases = $values['total'];

                                                            echo $total_calvario_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Calvario' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_calvario_death_cases = $values['total'];

                                                            echo $total_calvario_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Calvario'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Calvario'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $calvario_arr = implode($executed);
                                                            echo "$calvario_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Camalig
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_camalig_confirmed_cases = $values['total'];

                                                            echo $total_camalig_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_camalig_active_cases = $values['total'];

                                                            echo $total_camalig_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_calvario_recovered_cases = $values['total'];

                                                            echo $total_calvario_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_calvario_death_cases = $values['total'];

                                                            echo $total_calvario_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Camalig'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Camalig'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $camalig_arr = implode($executed);
                                                            echo "$camalig_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Hulo
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Hulo'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_hulo_confirmed_cases = $values['total'];

                                                            echo $total_hulo_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Hulo' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_hulo_active_cases = $values['total'];

                                                            echo $total_hulo_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Hulo' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_hulo_recovered_cases = $values['total'];

                                                            echo $total_hulo_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Hulo' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_hulo_death_cases = $values['total'];

                                                            echo $total_hulo_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Hulo'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Hulo'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $hulo_arr = implode($executed);
                                                            echo "$hulo_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Iba
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Iba'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_iba_confirmed_cases = $values['total'];

                                                            echo $total_iba_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Iba' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_iba_active_cases = $values['total'];

                                                            echo $total_iba_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Iba' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_iba_recovered_cases = $values['total'];

                                                            echo $total_iba_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Iba' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_iba_death_cases = $values['total'];

                                                            echo $total_iba_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Iba'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Iba'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $iba_arr = implode($executed);
                                                            echo "$iba_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Langka
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Langka'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_langka_confirmed_cases = $values['total'];

                                                            echo $total_langka_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Langka' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_langka_active_cases = $values['total'];

                                                            echo $total_langka_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Langka' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_langka_recovered_cases = $values['total'];

                                                            echo $total_langka_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Langka' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_langka_death_cases = $values['total'];

                                                            echo $total_langka_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Langka'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Langka'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $langka_arr = implode($executed);
                                                            echo "$langka_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Lawa
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Lawa'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_lawa_confirmed_cases = $values['total'];

                                                            echo $total_lawa_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Lawa' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_lawa_active_cases = $values['total'];

                                                            echo $total_lawa_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Lawa' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_lawa_recovered_cases = $values['total'];

                                                            echo $total_lawa_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Lawa' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_lawa_death_cases = $values['total'];

                                                            echo $total_lawa_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Lawa'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Lawa'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $lawa_arr = implode($executed);
                                                            echo "$lawa_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Libtong
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE Barangay =  'Libtong'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_libtong_confirmed_cases = $values['total'];

                                                            echo $total_libtong_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Libtong' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_libtong_active_cases = $values['total'];

                                                            echo $total_libtong_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Libtong' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_libtong_recovered_cases = $values['total'];

                                                            echo $total_libtong_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Libtong' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_libtong_death_cases = $values['total'];

                                                            echo $total_libtong_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Libtong'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Libtong'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $libtong_arr = implode($executed);
                                                            echo "$libtong_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Liputan
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Liputan'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_liputan_confirmed_cases = $values['total'];

                                                            echo $total_liputan_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Liputan' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_liputan_active_cases = $values['total'];

                                                            echo $total_liputan_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Liputan' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_liputan_recovered_cases = $values['total'];

                                                            echo $total_liputan_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Liputan' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_liputan_death_cases = $values['total'];

                                                            echo $total_liputan_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Liputan'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Liputan'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $liputan_arr = implode($executed);
                                                            echo "$liputan_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Longos
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Longos'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_longos_confirmed_cases = $values['total'];

                                                            echo $total_longos_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Longos' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_longos_active_cases = $values['total'];

                                                            echo $total_longos_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Longos' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_longos_recovered_cases = $values['total'];

                                                            echo $total_longos_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Longos' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_longos_death_cases = $values['total'];

                                                            echo $total_longos_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Longos'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Longos'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $longos_arr = implode($executed);
                                                            echo "$longos_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Malhacan
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Malhacan'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_malhacan_confirmed_cases = $values['total'];

                                                            echo $total_malhacan_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Malhacan' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_malhacan_active_cases = $values['total'];

                                                            echo $total_malhacan_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Malhacan' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_malhacan_recovered_cases = $values['total'];

                                                            echo $total_malhacan_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Malhacan' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_malhacan_death_cases = $values['total'];

                                                            echo $total_malhacan_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Malhacan'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Malhacan'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $malhacan_arr = implode($executed);
                                                            echo "$malhacan_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Pajo
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pajo'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_Pajo_confirmed_cases = $values['total'];

                                                            echo $total_Pajo_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pajo' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_Pajo_active_cases = $values['total'];

                                                            echo $total_Pajo_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pajo' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_Pajo_recovered_cases = $values['total'];

                                                            echo $total_Pajo_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pajo' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_Pajo_death_cases = $values['total'];

                                                            echo $total_Pajo_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Pajo'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Pajo'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $Pajo_arr = implode($executed);
                                                            echo "$Pajo_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Pandayan
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pandayan'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_pandayan_confirmed_cases = $values['total'];

                                                            echo $total_pandayan_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pandayan' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_pandayan_active_cases = $values['total'];

                                                            echo $total_pandayan_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pandayan' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_pandayan_recovered_cases = $values['total'];

                                                            echo $total_pandayan_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pandayan' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_pandayan_death_cases = $values['total'];

                                                            echo $total_pandayan_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Pandayan'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Pandayan'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $pandayan_arr = implode($executed);
                                                            echo "$pandayan_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Pantoc
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pantoc'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_pantoc_confirmed_cases = $values['total'];

                                                            echo $total_pantoc_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pantoc' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_pantoc_active_cases = $values['total'];

                                                            echo $total_pantoc_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pantoc' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_pantoc_recovered_cases = $values['total'];

                                                            echo $total_pantoc_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Pantoc' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_pantoc_death_cases = $values['total'];

                                                            echo $total_pantoc_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Pantoc'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Pantoc'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $pantoc_arr = implode($executed);
                                                            echo "$pantoc_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Perez
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Perez'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_perez_confirmed_cases = $values['total'];

                                                            echo $total_perez_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Perez' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_perez_active_cases = $values['total'];

                                                            echo $total_perez_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Perez' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_perez_recovered_cases = $values['total'];

                                                            echo $total_perez_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Perez' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_perez_death_cases = $values['total'];

                                                            echo $total_perez_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Perez'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Perez'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $perez_arr = implode($executed);
                                                            echo "$perez_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            Poblacion
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Poblacion'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_poblacion_confirmed_cases = $values['total'];

                                                            echo $total_poblacion_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Poblacion' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_poblacion_active_cases = $values['total'];

                                                            echo $total_poblacion_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Poblacion' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_poblacion_recovered_cases = $values['total'];

                                                            echo $total_poblacion_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Poblacion' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_poblacion_death_cases = $values['total'];

                                                            echo $total_poblacion_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Poblacion'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Poblacion'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $poblacion_arr = implode($executed);
                                                            echo "$poblacion_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Saluysoy
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Saluysoy'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_saluysoy_confirmed_cases = $values['total'];

                                                            echo $total_saluysoy_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Saluysoy' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_saluysoy_active_cases = $values['total'];

                                                            echo $total_saluysoy_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Saluysoy' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_saluysoy_recovered_cases = $values['total'];

                                                            echo $total_saluysoy_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Saluysoy' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_saluysoy_death_cases = $values['total'];

                                                            echo $total_saluysoy_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Saluysoy'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Saluysoy'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $saluysoy_arr = implode($executed);
                                                            echo "$saluysoy_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td>
                                                            St Francis Gasak
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Gasak'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_gasak_confirmed_cases = $values['total'];

                                                            echo $total_gasak_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Gasak' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_gasak_active_cases = $values['total'];

                                                            echo $total_gasak_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Gasak' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_gasak_recovered_cases = $values['total'];

                                                            echo $total_gasak_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Gasak' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_gasak_death_cases = $values['total'];

                                                            echo $total_gasak_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Gasak'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Gasak'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $gasak_arr = implode($executed);
                                                            echo "$gasak_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Tugatog
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Tugatog'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_gasak_confirmed_cases = $values['total'];

                                                            echo $total_gasak_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Tugatog' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_gasak_active_cases = $values['total'];

                                                            echo $total_gasak_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Tugatog' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_gasak_recovered_cases = $values['total'];

                                                            echo $total_gasak_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Tugatog' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_gasak_death_cases = $values['total'];

                                                            echo $total_gasak_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Tugatog'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Tugatog'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $gasak_arr = implode($executed);
                                                            echo "$gasak_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>


                                                   
                                                    <tr>
                                                        <td>
                                                            Ubihan
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Ubihan'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_ubihan_confirmed_cases = $values['total'];

                                                            echo $total_ubihan_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Ubihan' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_ubihan_active_cases = $values['total'];

                                                            echo $total_ubihan_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Ubihan' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_ubihan_recovered_cases = $values['total'];

                                                            echo $total_ubihan_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Ubihan' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_ubihan_death_cases = $values['total'];

                                                            echo $total_ubihan_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Ubihan'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Ubihan'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $ubihan_arr = implode($executed);
                                                            echo "$ubihan_arr";
                                                        ?>  
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            Zamora
                                                        </td>
                                                        <td>
                                                         <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Zamora'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_zamora_confirmed_cases = $values['total'];

                                                            echo $total_zamora_confirmed_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Zamora' AND status ='Active'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_zamora_active_cases = $values['total'];

                                                            echo $total_zamora_active_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Zamora' AND status ='Recovered'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_zamora_recovered_cases = $values['total'];

                                                            echo $total_zamora_recovered_cases;

                                                        ?>
                                                        </td>
                                                        <td>
                                                        <?php

                                                            $sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Zamora' AND status ='Death'";
                                                            $result = mysqli_query($con,$sql);
                                                            $values = mysqli_fetch_assoc($result);
                                                            $total_zamora_death_cases = $values['total'];

                                                            echo $total_zamora_death_cases;

                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT * FROM lockdown WHERE Barangay ='Zamora'";
                                                            $barangay = $con->query($sql)or die($con->error);
                                                            $row = $barangay->fetch_assoc();

                                                            if($row['lockdown_status']==1)

                                                            {
                                                             echo "<a style=background-color:#FF0000;padding:5px;color:white;>Implemented</a>";
                                                            }
                                                            else
                                                            {
                                                             echo "<a style=background-color:#008000;padding:5px;color:white;>Not Implemented</a>";
                                                            }
                                                        ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php

                                                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Zamora'";
                                                            $stats = $con->query($sql) or die($con->error);
                                                            $executed = $stats->fetch_assoc();
                                                            $zamora_arr = implode($executed);
                                                            echo "$zamora_arr";
                                                        ?>  
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
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        

        <!-- Custom Theme JavaScript -->
        

        
    

    </body>
</html>
