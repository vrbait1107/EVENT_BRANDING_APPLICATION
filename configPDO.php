<?php

/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
Paradigm is Object Oriented Programming
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shodh_information";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
