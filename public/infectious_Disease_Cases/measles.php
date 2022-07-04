<?php
include_once("connect/connection.php");
$con = connection();


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Infectious Disease Monitoring Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css-monitoring/monitoring.css">
	<link rel="icon"  href="img/seal.png">
</head>
<body>
	<header class="nav-container">
		<div class="sec-1">
			<img src="img/seal.png" height="105px" width="105px">
		</div>

		<div class="sec-2">
			<h1 class="text-logo">City of Meycauayan Municipal Health Office</h1>
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
		  Measles Monitoring Barangay Cases Dashboard 
	    </h2>
		<table class="table-1">
			<thead>
				
					<th>Barangay</th>
					<th>Confirmed Cases</th>
					<th>Active Cases</th>
					<th>Recovered Cases</th>
					<th>Death Cases</th>
					<th>Lockdown Status</th>
				
			</thead>
			<tbody>
				<tr>
					<td data-label="Barangay">Bagbaguin</td>
					<td data-label="Confirmed Cases">
						<?php
							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bagbaguin'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_confirmed_cases = $values['total'];

 							echo $total_bagbaguin_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bagbaguin' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_active_cases = $values['total'];

 							echo $total_bagbaguin_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bagbaguin' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_recovered_cases = $values['total'];

 							echo $total_bagbaguin_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bagbaguin' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_death_cases = $values['total'];

 							echo $total_bagbaguin_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
						<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Bagbaguin'";
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
					<tr>

						<td data-label="Barangay">Bahay Pare</td>
						<td data-label="Confirmed Cases">
							<?php

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bahay_Pare'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bahaypare_confirmed_cases = $values['total'];

 							echo $total_bahaypare_confirmed_cases;

							?>
						</td>
						<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bahay_Pare' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_active_cases = $values['total'];

 							echo $total_bagbaguin_active_cases;

							?>
						</td>
						<td data-label="Recovered Cases">
							 <?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bahay Pare' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_recovered_cases = $values['total'];

 							echo $total_bagbaguin_recovered_cases;

							?>
						</td>
						<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bahay Pare' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bagbaguin_death_cases = $values['total'];

 							echo $total_bagbaguin_death_cases;

							?>
						</td>
						<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE barangay = 'Bahay_Pare'";
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
				</tr>
					

				<tr>
					<td data-label="Barangay">Banga</td>
					<td data-label="Confirmed Cases">
							<?php
 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Banga'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bancal_confirmed_cases = $values['total'];

 							echo $total_bancal_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Banga' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_banga_active_cases = $values['total'];

 							echo $total_banga_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Banga' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_banga_recovered_cases = $values['total'];

 							echo $total_banga_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Banga' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_banga_death_cases = $values['total'];

 							echo $total_banga_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
						<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Banga'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Bancal</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bancal'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bancal_confirmed_cases = $values['total'];

 							echo $total_bancal_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bancal' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bancal_active_cases = $values['total'];

 							echo $total_bancal_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bancal' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bancal_recovered_cases = $values['total'];

 							echo $total_bancal_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bancal' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bancal_death_cases = $values['total'];

 							echo $total_bancal_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Bancal'";
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
				</tr>

				

				<tr>
				    <td data-label="Barangay">Bayugo</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bayugo'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_banyugo_confirmed_cases = $values['total'];

 							echo $total_banyugo_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bayugo' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bayugo_active_cases = $values['total'];

 							echo $total_bayugo_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
								<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bayugo' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bayugo_recovered_cases = $values['total'];

 							echo $total_bayugo_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Bayugo' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bayugo_death_cases = $values['total'];

 							echo $total_bayugo_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Bayugo'";
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

				<tr>
					<td data-label="Barangay">Caingin</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Caingin'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_caingin_confirmed_cases = $values['total'];

 							echo $total_caingin_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Caingin' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_bayugo_active_cases = $values['total'];

 							echo $total_bayugo_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'caingin' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_caingin_recovered_cases = $values['total'];

 							echo $total_caingin_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'caingin' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_caingin_death_cases = $values['total'];

 							echo $total_caingin_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Caingin'";
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
				</tr>

					<td data-label="Barangay">Calvario</td>
					<td data-label="Confirmed Cases">
							<?php
		
 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Calvario'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_calvario_confirmed_cases = $values['total'];

 							echo $total_calvario_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						 		<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Calvario' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_calvario_active_cases = $values['total'];

 							echo $total_calvario_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Calvario' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_calvario_recovered_cases = $values['total'];

 							echo $total_calvario_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						 		<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Calvario' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_calvario_death_cases = $values['total'];

 							echo $total_calvario_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Calvario'";
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
				</tr>

				<tr>
				    <td data-label="Barangay">Camalig</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Camalig'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_camalig_confirmed_cases = $values['total'];

 							echo $total_camalig_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Camalig' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_camalig_active_cases = $values['total'];

 							echo $total_camalig_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Camalig' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_camalig_recovered_cases = $values['total'];

 							echo $total_camalig_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Camalig' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_camalig_death_cases = $values['total'];

 							echo $total_camalig_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Camalig'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Hulo</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Hulo'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_hulo_confirmed_cases = $values['total'];

 							echo $total_hulo_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Hulo' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_hulo_active_cases = $values['total'];

 							echo $total_hulo_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Hulo' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_hulo_recovered_cases = $values['total'];

 							echo $total_hulo_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						 	<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Hulo' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_hulo_death_cases = $values['total'];

 							echo $total_hulo_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Hulo'";
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
				</tr>

				<tr>
				    <td data-label="Barangay">Iba</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'iba'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_confirmed_cases = $values['total'];

 							echo $total_iba_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'iba' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_active_cases = $values['total'];

 							echo $total_iba_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'iba' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_recovered_cases = $values['total'];

 							echo $total_iba_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'iba' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_death_cases = $values['total'];

 							echo $total_iba_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Iba'";
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
				</tr>

					<tr>
				    <td data-label="Barangay">Langka</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'langka'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_confirmed_cases = $values['total'];

 							echo $total_iba_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'langka' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_active_cases = $values['total'];

 							echo $total_iba_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'langka' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_recovered_cases = $values['total'];

 							echo $total_iba_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'langka' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_iba_death_cases = $values['total'];

 							echo $total_iba_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Langka'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Lawa</td>
					<td data-label="Confirmed Cases">
						<?php

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'lawa'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_lawa_confirmed_cases = $values['total'];

 							echo $total_lawa_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'lawa' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_lawa_active_cases = $values['total'];

 							echo $total_lawa_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'lawa' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_lawa_recovered_cases = $values['total'];

 							echo $total_lawa_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'lawa' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_lawa_death_cases = $values['total'];

 							echo $total_lawa_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Lawa'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Libtong</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'libtong'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_libtong_confirmed_cases = $values['total'];

 							echo $total_libtong_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'libtong' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_libtong_active_cases = $values['total'];

 							echo $total_libtong_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'libtong' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_libtong_recovered_cases = $values['total'];

 							echo $total_libtong_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'libtong' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_libtong_death_cases = $values['total'];

 							echo $total_libtong_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Libtong'";
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

				<tr>
				    <td data-label="Barangay">Liputan</td>
					<td data-label="Confirmed Cases">
						
 							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'liputan'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_liputan_confirmed_cases = $values['total'];

 							echo $total_liputan_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'liputan' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_liputan_active_cases = $values['total'];

 							echo $total_liputan_active_cases;
              			?>
	    
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'liputan' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_liputan_recovered_cases = $values['total'];

 							echo $total_liputan_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'liputan' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_liputan_death_cases = $values['total'];

 							echo $total_liputan_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Liputan'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Longos</td>
					<td data-label="Confirmed Cases">
								<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'longos'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_longos_confirmed_cases = $values['total'];

 							echo $total_longos_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'Longos' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_longos_active_cases = $values['total'];

 							echo $total_longos_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'longos' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_longos_recovered_cases = $values['total'];

 							echo $total_longos_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'longos' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_longos_death_cases = $values['total'];

 							echo $total_longos_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Longos'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Malhacan</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'malhacan'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_malhacan_confirmed_cases = $values['total'];

 							echo $total_malhacan_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'malhacan' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_malhacan_active_cases = $values['total'];

 							echo $total_malhacan_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'malhacan' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_malhacan_recovered_cases = $values['total'];

 							echo $total_malhacan_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'malhacan' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_malhacan_death_cases = $values['total'];

 							echo $total_malhacan_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Malhacan'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Pajo</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pajo'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pajo_confirmed_cases = $values['total'];

 							echo $total_pajo_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pajo' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pajo_active_cases = $values['total'];

 							echo $total_pajo_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pajo' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pajo_recovered_cases = $values['total'];

 							echo $total_pajo_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pajo' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pajo_death_cases = $values['total'];

 							echo $total_pajo_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Pajo'";
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
				</tr>

				<tr>
				    <td data-label="Barangay">Pandayan</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pandayan'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pandayan_confirmed_cases = $values['total'];

 							echo $total_pandayan_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pandayan' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pandayan_active_cases = $values['total'];

 							echo $total_pandayan_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pandayan' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pandayan_recovered_cases = $values['total'];

 							echo $total_pandayan_recovered_cases;

							?>
					 	</td>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pandayan' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pandayan_death_cases = $values['total'];

 							echo $total_pandayan_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Pandayan'";
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
				</tr>

					<tr>
					<td data-label="Barangay">Pantoc</td>
					<td data-label="Confirmed Cases">
							<?php
					

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pantoc'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pantoc_confirmed_cases = $values['total'];

 							echo $total_pantoc_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pantoc' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pantoc_active_cases = $values['total'];

 							echo $total_pantoc_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pantoc' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pantoc_recovered_cases = $values['total'];

 							echo $total_pantoc_recovered_cases;

							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'pantoc' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_pantoc_death_cases = $values['total'];

 							echo $total_pantoc_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Pantoc'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Perez</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'perez'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_perez_confirmed_cases = $values['total'];

 							echo $total_perez_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'perez' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_perez_active_cases = $values['total'];

 							echo $total_perez_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'perez' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_perez_recovered_cases = $values['total'];

 							echo $total_perez_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'perez' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_perez_death_cases = $values['total'];

 							echo $total_perez_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Perez'";
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
				</tr>

					<tr>
					<td data-label="Barangay">Poblacion</td>
					<td data-label="Confirmed Cases">
							<?php

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'poblacion'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_poblacion_confirmed_cases = $values['total'];

 							echo $total_poblacion_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'poblacion' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_poblacion_active_cases = $values['total'];

 							echo $total_poblacion_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'poblacion' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_poblacion_recovered_cases = $values['total'];

 							echo $total_poblacion_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'poblacion' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_poblacion_death_cases = $values['total'];

 							echo $total_poblacion_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Poblacion'";
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
				</tr>

				<tr>
					<td data-label="Barangay">St Francis Gasak</td>
					<td data-label="Confirmed Cases">
							<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'gasak'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_gasak_confirmed_cases = $values['total'];

 							echo $total_gasak_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'gasak' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_gasak_active_cases = $values['total'];

 							echo $total_gasak_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'saluysoy' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_gasak_recovered_cases = $values['total'];

 							echo $total_gasak_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'saluysoy' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_gasak_death_cases = $values['total'];

 							echo $total_gasak_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Gasak'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Saluysoy</td>
					<td data-label="Confirmed Cases">
						<?php
							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'saluysoy'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_saluysoy_confirmed_cases = $values['total'];

 							echo $total_saluysoy_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'saluysoy' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_saluysoy_active_cases = $values['total'];

 							echo $total_saluysoy_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
							<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'saluysoy' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_saluysoy_recovered_cases = $values['total'];

 							echo $total_saluysoy_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'saluysoy' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_saluysoy_death_cases = $values['total'];

 							echo $total_saluysoy_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Saluysoy'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Tugatog</td>
					<td data-label="Confirmed Cases">
							<?php
						

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'tugatog'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_tugatog_confirmed_cases = $values['total'];

 							echo $total_tugatog_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'tugatog' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_tugatog_active_cases = $values['total'];

 							echo $total_tugatog_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'tugatog' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_tugatog_recovered_cases = $values['total'];

 							echo $total_tugatog_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'tugatog' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_tugatog_death_cases = $values['total'];

 							echo $total_tugatog_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Tugatog'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Ubihan</td>
					<td data-label="Confirmed Cases">
						<?php
		
 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'ubihan'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_ubihan_confirmed_cases = $values['total'];

 							echo $total_ubihan_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'ubihan' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_ubihan_active_cases = $values['total'];

 							echo $total_ubihan_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						 	<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'ubihan' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_ubihan_recovered_cases = $values['total'];

 							echo $total_ubihan_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'ubihan' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_ubihan_death_cases = $values['total'];

 							echo $total_ubihan_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Ubihan'";
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
				</tr>

				<tr>
					<td data-label="Barangay">Zamora</td>
					<td data-label="Confirmed Cases">
						<?php
						

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'zamora'";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_zamora_confirmed_cases = $values['total'];

 							echo $total_zamora_confirmed_cases;

							?>
					</td>
					<td data-label="Active Cases">
						<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'zamora' AND status = 'Active' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_zamora_active_cases = $values['total'];

 							echo $total_zamora_active_cases;

							?>
					</td>
					<td data-label="Recovered Cases">
						<?php
 

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'zamora' AND status = 'Recovered' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_zamora_recovered_cases = $values['total'];

 							echo $total_zamora_recovered_cases
							?>
					</td>
					<td data-label="Death Cases">
							<?php
 							

 							$sql = "SELECT COUNT(*) AS total FROM measles WHERE barangay = 'zamora' AND status = 'Death' ";
 							$result = mysqli_query($con,$sql);
 							$values = mysqli_fetch_assoc($result);
 							$total_zamora_death_cases = $values['total'];

 							echo $total_zamora_death_cases;

							?>
					</td>
					<td data-label="lockdown status">
						<a href="#" class="status">
							<?php

							$sql = "SELECT * FROM lockdown_measles WHERE Barangay ='Zamora'";
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
				</tr>
			</tbody>
		</table>
	</div>
		


</body>
</html>