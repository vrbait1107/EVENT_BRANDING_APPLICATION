<?php

/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
Paradigm is Object Oriented Programming
*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname="user_registration";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>