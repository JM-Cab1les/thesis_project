<?php
include ('connect/connection.php');

$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM user WHERE id = '$id'";
$user= $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();

$sql = "DELETE FROM user WHERE id = '$id' ";

    $execute = mysqli_query($con,$sql) or die(mysqli_error($con));

    if($execute > 0)
    {
         header("Location: manage-user.php");
    }
    else
    {
         echo "<script> alert('Error')</script>";
    }



?>
