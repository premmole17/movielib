<?php 

session_start();
$name = $_POST['name'];
$mobno = $_POST['number'];
$gender = $_POST['status'];
$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION["email"] = $email;

$servername = "remotemysql.com";
$username = "RF47CRvwZw";
$password = "9WU6xKZ4UZ";
$database = "RF47CRvwZw"
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($conn->connect_error){
	die('connection failed : ' .$conn->connect_error);
}
else{
	$stmt = $conn->prepare('insert into login(name, number, gender, email, password)value(?,?,?,?,?)');

	$stmt->bind_param("sisss",$name,$mobno,$gender,$email,$password);
}

try{$stmt->execute();}
catch (mysqli_sql_exception $e) { 
	echo '<h3 style="text-align: center; margin-top: 20px;">'.$email.' Email Already Exists</h3>
	
	<form action="signup.php" method="post">
	<button style="text-align: center; position: absolute; left:45%; padding:8px;  background:#ffd11a; border:none; outline:none; border-radius:5px; width:10% ">Go To Signup Page</button>
	</form>';
	exit; 
 } 
header('location: ../index.html');
$stmt->close();
$conn->close();

?>