<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
Paradigm is Object Oriented Programming
*/

$dbservername = "localhost";
$dbuser="root";
$dbpassword="";
$dbname="user_registration";

// Try connecting to the Database
$conn= new mysqli($dbservername,$dbuser,$dbpassword,$dbname);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}

?>