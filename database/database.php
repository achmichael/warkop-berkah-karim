<?php 
$host = "localhost";
$username = "root";
$password ="";
$database_name = "warkop_berkah";

$db = mysqli_connect($host, $username,  $password, $database_name);

if ($db->connect_error){
    echo "Connection error";
    die("Error");
}
?>