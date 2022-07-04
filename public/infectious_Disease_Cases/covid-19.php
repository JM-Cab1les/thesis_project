<?php
include_once("connect/connection.php");
$con = connection();


?>
<?php

$sql = "SELECT level_status FROM alert_level";
$status = $con->query($sql) or die($con->error);
$execute = $status->fetch_assoc();

?>

<?php

$sql = "SELECT Sitio FROM street WHERE Barangay = 'Bagbaguin'";
$stats = $con->query($sql) or die($con->error);
$executed = $stats->fetch_assoc();
$bagbaguin_arr = implode($executed);
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Infectious Disease Monitoring Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css-monitoring/monitoring.css?v-<?php echo time(); ?>">
	<link rel="icon"  href="img/seal.png">
</head>
<body>
	<header class="nav-container">
		<div class="sec-1">
			<img src="img/seal.png" height="105px" width="105px">
		</div>

		<div class="sec-2">
			<h1 class="text-logo"> Meycauayan City Health Office</h1>
		</div>

		<div class="sec-3">
			<div class="sec-3-1">
				<a href="../index.html">Main Dashboard</a>
                <a href="">Contact Us</a>
			</div>
		</div>
	</header>

	

	<div class="container">
		<h2 class="text-logo">
		  COVID-19 Monitoring Barangay Cases Dashboard 
	    </h2>
	    <div class="alert-level">
	        <h2>Alert Level Status in City of Meycauayan</h2>
	        <h4>By IATF Guidelines</h4>
	    </div>
	    <div class="lockdown-level">
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
	        <p>
	            <?php
	         if ($execute['level_status'] == 1)
	                {
	                    echo "<a style = background-color:#013f28;padding:15px;border-radius:50%;color:#ffffff;>1</a>";
	                }
	                else if($execute['level_status'] !=1 )
	                {
	                    echo "1";
	                }
	           ?>
	        </p>
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
	    </div>
	    	<div class="total">
		<div class="box t-cases">
			<h1>Total Cases</h1>
			<h2>
				<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_active_cases = $values['total'];

 							echo $total_active_cases;

							?>
			</h2>
		</div>

		<div class="box c-cases">
			<h1>Active Cases</h1>
			<h2>
				<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_active_cases = $values['total'];

 							echo $total_active_cases;

							?>
			</h2>
		</div>

		<div class="box r-cases">
			<h1>Recovered Cases</h1>
			<h2>
				<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_active_cases = $values['total'];

 							echo $total_active_cases;

							?>
			</h2>
		</div>

		<div class="box d-cases">
			<h1>Death Cases</h1>
			<h2>
				<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_active_cases = $values['total'];

 							echo $total_active_cases;

							?>
			</h2>
		</div>
	</div>
	<div class="note-section">
	    <h3>Note:In row List of Sitio/Street that Implement Lockdown if display the general lockdown its means the entire barangay is under granular lockdown </h3>
	</div>
		<table class="table-1">
			<thead>
				
					<th>Barangay</th>
					<th>Confirmed Cases</th>
					<th>Active Cases</th>
					<th>Recovered Cases</th>
					<th>Death Cases</th>
					<th>Granular Lockdown Status</th>
					<th>List of Sitio/Street that Implement Lockdown</th>
				
			</thead>
			<tbody>
				<tr>
					<td data-label="Barangay">Bagbaguin</td>
					<td data-label="Confirmed Cases">
						<?php
							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bagbaguin'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_confirmed_cases = $values['total'];

 							echo $total_bagbaguin_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bagbaguin' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_active_cases = $values['total'];

 							echo $total_bagbaguin_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bagbaguin' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_recovered_cases = $values['total'];

 							echo $total_bagbaguin_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bagbaguin' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_death_cases = $values['total'];

 							echo $total_bagbaguin_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:14px;color:#000;>
				            <?php
				            echo "$bagbaguin_arr";
				            ?>
					    </a>
					</td>
					<tr>

						<td data-label="Barangay">Bahay Pare</td>
						<td data-label="Confirmed Cases">
							<?php

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bahay Pare'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bahaypare_confirmed_cases = $values['total'];

 							echo $total_bahaypare_confirmed_cases;

							?>
						</td>
						<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bahay Pare' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_active_cases = $values['total'];

 							echo $total_bagbaguin_active_cases;

							?>
						</td>
						<td data-label="Recovered Cases">
							 <?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bahay Pare' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_recovered_cases = $values['total'];

 							echo $total_bagbaguin_recovered_cases;

							?>
						</td>
						<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bahay Pare' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_death_cases = $values['total'];

 							echo $total_bagbaguin_death_cases;

							?>
						</td>
						<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Bahay Pare'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $bahaypare_arr = implode($executed);
                            echo "$bahaypare_arr";
                            ?>              
					    </a>
					</td>
				</tr>
					

				<tr>
					<td data-label="Barangay">Banga</td>
					<td data-label="Confirmed Cases">
							<?php
 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Banga'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bancal_confirmed_cases = $values['total'];

 							echo $total_bancal_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Banga' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_banga_active_cases = $values['total'];

 							echo $total_banga_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Banga' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_banga_recovered_cases = $values['total'];

 							echo $total_banga_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Banga' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_banga_death_cases = $values['total'];

 							echo $total_banga_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Banga'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $banga_arr = implode($executed);
                            echo "$banga_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Bancal</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bancal'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bancal_confirmed_cases = $values['total'];

 							echo $total_bancal_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bancal' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bancal_active_cases = $values['total'];

 							echo $total_bancal_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bancal' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bancal_recovered_cases = $values['total'];

 							echo $total_bancal_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bancal' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bancal_death_cases = $values['total'];

 							echo $total_bancal_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown WHERE Barangay ='Bancal'";
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Bancal'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $bancal_arr = implode($executed);
                            echo "$bancal_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				

				<tr>
				    <td data-label="Barangay">Bayugo</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bayugo'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_banyugo_confirmed_cases = $values['total'];

 							echo $total_banyugo_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bayugo' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bayugo_active_cases = $values['total'];

 							echo $total_bayugo_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
								<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bayugo' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bayugo_recovered_cases = $values['total'];

 							echo $total_bayugo_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Bayugo' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bayugo_death_cases = $values['total'];

 							echo $total_bayugo_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Bayugo'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $bayugo_arr = implode($executed);
                            echo "$bayugo_arr";
                            ?>              
					    </a>
					</td>

				<tr>
					<td data-label="Barangay">Caingin</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Caingin'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_caingin_confirmed_cases = $values['total'];

 							echo $total_caingin_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Caingin' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bayugo_active_cases = $values['total'];

 							echo $total_bayugo_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'caingin' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_caingin_recovered_cases = $values['total'];

 							echo $total_caingin_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'caingin' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_caingin_death_cases = $values['total'];

 							echo $total_caingin_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Caingin'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $caingin_arr = implode($executed);
                            echo "$caingin_arr";
                            ?>              
					    </a>
					</td>
				</tr>

					<td data-label="Barangay">Calvario</td>
					<td data-label="Confirmed Cases">
							<?php
		
 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Calvario'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_calvario_confirmed_cases = $values['total'];

 							echo $total_calvario_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						 		<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Calvario' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_calvario_active_cases = $values['total'];

 							echo $total_calvario_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Calvario' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_calvario_recovered_cases = $values['total'];

 							echo $total_calvario_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						 		<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Calvario' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_calvario_death_cases = $values['total'];

 							echo $total_calvario_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Calvario'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $calvario_arr = implode($executed);
                            echo "$calvario_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
				    <td data-label="Barangay">Camalig</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_camalig_confirmed_cases = $values['total'];

 							echo $total_camalig_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_camalig_active_cases = $values['total'];

 							echo $total_camalig_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_camalig_recovered_cases = $values['total'];

 							echo $total_camalig_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Camalig' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_camalig_death_cases = $values['total'];

 							echo $total_camalig_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Camalig'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $camalig_arr = implode($executed);
                            echo "$camalig_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Hulo</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Hulo'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_hulo_confirmed_cases = $values['total'];

 							echo $total_hulo_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Hulo' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_hulo_active_cases = $values['total'];

 							echo $total_hulo_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Hulo' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_hulo_recovered_cases = $values['total'];

 							echo $total_hulo_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						 	<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Hulo' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_hulo_death_cases = $values['total'];

 							echo $total_hulo_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Hulo'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $hulo_arr = implode($executed);
                            echo "$hulo_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
				    <td data-label="Barangay">Iba</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'iba'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_confirmed_cases = $values['total'];

 							echo $total_iba_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'iba' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_active_cases = $values['total'];

 							echo $total_iba_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'iba' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_recovered_cases = $values['total'];

 							echo $total_iba_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'iba' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_death_cases = $values['total'];

 							echo $total_iba_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Iba'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $Iba_arr = implode($executed);
                            echo "$Iba_arr";
                            ?>              
					    </a>
					</td>
				</tr>

					<tr>
				    <td data-label="Barangay">Langka</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'langka'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_confirmed_cases = $values['total'];

 							echo $total_iba_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'langka' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_active_cases = $values['total'];

 							echo $total_iba_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'langka' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_recovered_cases = $values['total'];

 							echo $total_iba_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'langka' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_death_cases = $values['total'];

 							echo $total_iba_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Langka'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $langka_arr = implode($executed);
                            echo "$langka_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Lawa</td>
					<td data-label="Confirmed Cases">
						<?php

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'lawa'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_lawa_confirmed_cases = $values['total'];

 							echo $total_lawa_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'lawa' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_lawa_active_cases = $values['total'];

 							echo $total_lawa_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'lawa' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_lawa_recovered_cases = $values['total'];

 							echo $total_lawa_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'lawa' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_lawa_death_cases = $values['total'];

 							echo $total_lawa_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="List of Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Lawa'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $lawa_arr = implode($executed);
                            echo "$lawa_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Libtong</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'libtong'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_libtong_confirmed_cases = $values['total'];

 							echo $total_libtong_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Libtong' AND status = 'Active'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_libtong_active_cases = $values['total'];

 							echo $total_libtong_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'libtong' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_libtong_recovered_cases = $values['total'];

 							echo $total_libtong_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'libtong' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_libtong_death_cases = $values['total'];

 							echo $total_libtong_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Libtong'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $libtong_arr = implode($executed);
                            echo "$libtong_arr";
                            ?>              
					    </a>
					</td>

				<tr>
				    <td data-label="Barangay">Liputan</td>
					<td data-label="Confirmed Cases">
						
 							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'liputan'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_liputan_confirmed_cases = $values['total'];

 							echo $total_liputan_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'liputan' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_liputan_active_cases = $values['total'];

 							echo $total_liputan_active_cases;
              			?>
	    
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'liputan' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_liputan_recovered_cases = $values['total'];

 							echo $total_liputan_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'liputan' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_liputan_death_cases = $values['total'];

 							echo $total_liputan_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Liputan'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $liputan_arr = implode($executed);
                            echo "$liputan_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Longos</td>
					<td data-label="Confirmed Cases">
								<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'longos'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_longos_confirmed_cases = $values['total'];

 							echo $total_longos_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Longos' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_longos_active_cases = $values['total'];

 							echo $total_longos_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'longos' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_longos_recovered_cases = $values['total'];

 							echo $total_longos_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'longos' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_longos_death_cases = $values['total'];

 							echo $total_longos_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Longos'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $longos_arr = implode($executed);
                            echo "$longos_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Malhacan</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Malhacan'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_malhacan_confirmed_cases = $values['total'];

 							echo $total_malhacan_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Malhacan' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_malhacan_active_cases = $values['total'];

 							echo $total_malhacan_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Malhacan' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_malhacan_recovered_cases = $values['total'];

 							echo $total_malhacan_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'Malhacan' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_malhacan_death_cases = $values['total'];

 							echo $total_malhacan_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay ='Malhacan'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $malhacan_arr = implode($executed);
                            echo "$malhacan_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Pajo</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pajo'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pajo_confirmed_cases = $values['total'];

 							echo $total_pajo_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pajo' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pajo_active_cases = $values['total'];

 							echo $total_pajo_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pajo' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pajo_recovered_cases = $values['total'];

 							echo $total_pajo_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pajo' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pajo_death_cases = $values['total'];

 							echo $total_pajo_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Pajo'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $pajo_arr = implode($executed);
                            echo "$pajo_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
				    <td data-label="Barangay">Pandayan</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pandayan'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pandayan_confirmed_cases = $values['total'];

 							echo $total_pandayan_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pandayan' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pandayan_active_cases = $values['total'];

 							echo $total_pandayan_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pandayan' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pandayan_recovered_cases = $values['total'];

 							echo $total_pandayan_recovered_cases;

							?>
					 	</td>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pandayan' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pandayan_death_cases = $values['total'];

 							echo $total_pandayan_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Pandayan'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $pandayan_arr = implode($executed);
                            echo "$pandayan_arr";
                            ?>              
					    </a>
					</td>
				</tr>

					<tr>
					<td data-label="Barangay">Pantoc</td>
					<td data-label="Confirmed Cases">
							<?php
					

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pantoc'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pantoc_confirmed_cases = $values['total'];

 							echo $total_pantoc_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pantoc' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pantoc_active_cases = $values['total'];

 							echo $total_pantoc_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pantoc' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pantoc_recovered_cases = $values['total'];

 							echo $total_pantoc_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'pantoc' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pantoc_death_cases = $values['total'];

 							echo $total_pantoc_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Pantoc'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $pantoc_arr = implode($executed);
                            echo "$pantoc_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Perez</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'perez'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_perez_confirmed_cases = $values['total'];

 							echo $total_perez_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'perez' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_perez_active_cases = $values['total'];

 							echo $total_perez_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'perez' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_perez_recovered_cases = $values['total'];

 							echo $total_perez_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'perez' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_perez_death_cases = $values['total'];

 							echo $total_perez_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Perez'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $perez_arr = implode($executed);
                            echo "$perez_arr";
                            ?>              
					    </a>
					</td>
				</tr>

					<tr>
					<td data-label="Barangay">Poblacion</td>
					<td data-label="Confirmed Cases">
							<?php

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'poblacion'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_poblacion_confirmed_cases = $values['total'];

 							echo $total_poblacion_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'poblacion' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_poblacion_active_cases = $values['total'];

 							echo $total_poblacion_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'poblacion' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_poblacion_recovered_cases = $values['total'];

 							echo $total_poblacion_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'poblacion' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_poblacion_death_cases = $values['total'];

 							echo $total_poblacion_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Poblacion'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $poblacion_arr = implode($executed);
                            echo "$poblacion_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">St Francis Gasak</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'gasak'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_gasak_confirmed_cases = $values['total'];

 							echo $total_gasak_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'gasak' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_gasak_active_cases = $values['total'];

 							echo $total_gasak_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'gasak' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_gasak_recovered_cases = $values['total'];

 							echo $total_gasak_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'gasak' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_gasak_death_cases = $values['total'];

 							echo $total_gasak_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Gasak'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $gasak_arr = implode($executed);
                            echo "$gasak_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Saluysoy</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'saluysoy'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_saluysoy_confirmed_cases = $values['total'];

 							echo $total_saluysoy_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'saluysoy' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_saluysoy_active_cases = $values['total'];

 							echo $total_saluysoy_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'saluysoy' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_saluysoy_recovered_cases = $values['total'];

 							echo $total_saluysoy_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'saluysoy' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_saluysoy_death_cases = $values['total'];

 							echo $total_saluysoy_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Saluysoy'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $saluysoy_arr = implode($executed);
                            echo "$saluysoy_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Tugatog</td>
					<td data-label="Confirmed Cases">
							<?php
						

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'tugatog'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_tugatog_confirmed_cases = $values['total'];

 							echo $total_tugatog_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'tugatog' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_tugatog_active_cases = $values['total'];

 							echo $total_tugatog_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'tugatog' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_tugatog_recovered_cases = $values['total'];

 							echo $total_tugatog_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'tugatog' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_tugatog_death_cases = $values['total'];

 							echo $total_tugatog_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Tugatog'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $tugatog_arr = implode($executed);
                            echo "$tugatog_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Ubihan</td>
					<td data-label="Confirmed Cases">
						<?php
		
 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'ubihan'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_ubihan_confirmed_cases = $values['total'];

 							echo $total_ubihan_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'ubihan' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_ubihan_active_cases = $values['total'];

 							echo $total_ubihan_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						 	<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'ubihan' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_ubihan_recovered_cases = $values['total'];

 							echo $total_ubihan_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'ubihan' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_ubihan_death_cases = $values['total'];

 							echo $total_ubihan_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Ubihan'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $ubihan_arr = implode($executed);
                            echo "$ubihan_arr";
                            ?>              
					    </a>
					</td>
				</tr>

				<tr>
					<td data-label="Barangay">Zamora</td>
					<td data-label="Confirmed Cases">
						<?php
						

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'zamora'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_zamora_confirmed_cases = $values['total'];

 							echo $total_zamora_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'zamora' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_zamora_active_cases = $values['total'];

 							echo $total_zamora_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'zamora' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_zamora_recovered_cases = $values['total'];

 							echo $total_zamora_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM covid_19 WHERE barangay = 'zamora' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_zamora_death_cases = $values['total'];

 							echo $total_zamora_death_cases;

							?>
					</td>
					<td data-label="Granular lockdown status">
						<a href="#" class="status">
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
						</a>
					</td>
					<td data-label="Sitio/Street That Implement Lockdown ">
					    <a href="#" class="status" style=text-decoration:none;font-size:16px;color:#000;>
				           <?php

                            $sql = "SELECT Sitio FROM street WHERE Barangay = 'Zamora'";
                            $stats = $con->query($sql) or die($con->error);
                            $executed = $stats->fetch_assoc();
                            $zamora_arr = implode($executed);
                            echo "$zamora_arr";
                            ?>              
					    </a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>



</body>
</html>