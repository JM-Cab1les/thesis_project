<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Infectious Disease DashBoard Select</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <nav class="navbar navbar-fixed-top bg-dark" role="navigation">
        <div class="navbar-header-logo">
            <a class="navbar-brand" href="index.html">
                <img src="img/seal.png">
            </a>
            <a class="navbar-brand brand-text">Meycauayan ID HealthCare</a>
        </div>
        <div class=" dropdown dropdown-container">
            <button class="btn btn-secondary " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-caret-down"></i>
            </button>
                <ul class="dropdown-menu menu-item" aria-labelledby="dropdownMenu">
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i>
                    <?php
                   
                   if(!isset($_SESSION)){
					session_start();
				    }
				     if(isset($_SESSION['userlogins'])){

					    echo $_SESSION['userlogins'];
				    }

				?>
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../index.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </ul>
          </div>
    </nav>

    <h2 class="text-center mt-5">Infectious Disease DashBoard Select</h2>
    <div class="row fluid-container" id="card-container">
       
        <div class="col-lg-4 col-md-6 mb-3">
            <a href="covid-19/index.php">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2 class="text-center">COVID-19</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <a href="#">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2 class="text-center">Tuberculosis</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <a href="#">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2 class="text-center">Measles</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <a href="#">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2 class="text-center">Dengue</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <a href="#">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2 class="text-center">Cholera</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>