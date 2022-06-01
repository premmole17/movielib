<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "movie_database";


// $servername = "remotemysql.com";
// $username = "RF47CRvwZw";
// $password = "9WU6xKZ4UZ";
// $database = "RF47CRvwZw"
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>