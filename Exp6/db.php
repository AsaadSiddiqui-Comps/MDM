<?php
// Database connection parameters
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'MDM';

$connection = mysqli_connect($hostname, $username, $password, $database);
if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>