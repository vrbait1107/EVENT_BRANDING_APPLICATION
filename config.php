<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

$dbservername = "localhost";
$dbuser="root";
$dbpassword="";
$dbname="user_registration";

// Try connecting to the Database
$conn= mysqli_connect($dbservername,$dbuser,$dbpassword,$dbname);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}

?>