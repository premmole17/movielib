<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
    <link rel="icon" type="image/x-icon" href="../file.png" />
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
       
        <header>
         <div class="main">
            <a href="homepage.php">
            <img src="../file.png" class="img-left mt-2" style=" margin: 5px; padding: 5px auto; width: 5%; "></a>
            <ul>
            <li><a  href="../php/homepage.php">Home</a></li>
            <li><a href="#">Playlist</a></li>
            <li><a href="../php/logout.php">Logout</a></li>
        </ul>
    </div>
            </header>
</div>
            </body>


</html>


<?php 
include 'database.php';

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

$sql = "SELECT movie_id FROM data where email='".$email."'";
$result = $conn->query($sql);
if(mysqli_num_rows($result) > 0){
    while($row = $result->fetch_assoc() ) {
        $movieid =  $row["movie_id"];
        $data = getImdbRecord($movieid,'5560c0a5');
        echo '
<div class="block" >
        <form action="rem.php" method="post">
        <img src="'.$data["Poster"].'" style=" float: left; padding: 5px; margin:20px; " class="img-thumbnail" width="200" height="200">        
        <p>Name : '.$data['Title'].'</p>
        <p> Released : '.$data['Released'].'</p>
        <p> Runtime : '.$data['Runtime'].'</p>
        <p> Actors : '.$data['Actors'].'</p>
        <p> Director : '.$data['Director'].'</p>
        <a  href="playlist.php?id='.$movieid.'"name="addtowatchlist" class="butt" id="add" name="click" >Remove From Watchlist</a>
        </form>
</div>                    
';
      }
    

}else{
    echo "<h5>Search For Movie</h5>";
}

function getImdbRecord($movie, $ApiKey)
{
    $path = "http://www.omdbapi.com/?apikey=".$ApiKey."&i=".$movie;
    $json = file_get_contents($path);
    return json_decode($json, TRUE);

    
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $del = "DELETE FROM `data` WHERE `movie_id` = '$id' ";
    $result = mysqli_query($conn,$del);
    
}

?>