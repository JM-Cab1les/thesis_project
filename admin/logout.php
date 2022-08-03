<?php 
 session_start();
  unset($_SESSION['userlogins']);
 
 session_destroy();
  
  echo header("Location: index.php");
  exit();
 ?>