<?php
$dbhost = "localhost";
define('SITEURL','http://localhost/Course-allocation-system/');
$dbuser = "root";
$dbpassword = "";
$dbname = "course_allocation_system_db";

$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

if(!$conn){
    die("failed to connect!");
}  

?>