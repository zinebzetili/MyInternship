<?php
    $host="localhost";
    $dbuser="root";
    $pass="";
    $dbname="myinternship";
    $con=mysqli_connect($host,$dbuser,$pass,$dbname);
    if(mysqli_connect_error()){
        echo "connection failed <br>";
    }
?>