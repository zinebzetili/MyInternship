<?php
session_start();
if (!isset($_SESSION['authetification'])){
    $_SESSION['status']="u need to login first ";
    header('Location:../getstarted.php');
    die(0);
}
?>