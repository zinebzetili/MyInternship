<?php 
session_start();
unset($_SESSION['authetification']);//authentification to false 
unset($_SESSION['USER']);//user info
unset($_SESSION['establishement']);//establishement info 
unset($_SESSION['student']);//student full info
$_SESSION['is_establishement']=false;//
$_SESSION['is_user']=false;
$_SESSION['loggout']="you have been logged out";
header('Location:../index.php');
?>