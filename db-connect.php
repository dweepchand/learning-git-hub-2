<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "hostel_leave";
$conn = new MySQLi($host, $username, $password, $dbname);
if(!$conn){
    die("Database Connection Failed.");
}
?>
