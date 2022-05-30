<?php
session_start();
$id = $_SESSION['id'];
$conn = new mysqli('localhost','root','','movie_database');


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM email";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $email =  $row["email"];

  }
}

if(isset($_SESSION['id'])){
  $stmt = $conn->prepare('insert into data(movie_id, email)value(?,?)');
  $stmt->bind_param("ss",$id,$email);
  $stmt->execute();
  header('location: homepage.php');
  $stmt->close();
  $conn->close();
  
  }

 ?>