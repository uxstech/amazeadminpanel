<?php
error_reporting(0);
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database_name = "amd_admin_panel_database";



//production ENV
$servername = "localhost";
$username = "amazemot_root";
$password = "Amaze#2511";
$database_name = "amazemot_admin_panel_database";


$conn = mysqli_connect($servername, $username, $password, $database_name);
if ($conn) {
     //echo "Database connected successfully!!";
} else {
     echo "Connection Failed due to " . mysqli_connect_error();
}
