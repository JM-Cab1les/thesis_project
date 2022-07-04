<?php

function connection(){

$host = "localhost";
$username = "root";
$password = "";
$database = "infectious_disease_database";


$con = new mysqli($host, $username, $password, $database);

 //connection checking
if($con->connect_error)
{
  echo $con->connect_error;

}else
{
  return $con;
}

} 
 ?>