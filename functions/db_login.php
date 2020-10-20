<?php 

// Define a variable
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_blog";

// Create a connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check a connection
if ($conn->connect_error){
    die("Connection was failed! ".$conn->connect_error);
}
echo "Connection was established successfully";

?>