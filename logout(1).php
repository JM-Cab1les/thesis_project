<?php 
  
  session_start();
  unset($_SESSION['userlogin']);
 

  
  echo header("Location: index.php");
  exit();
 ?>