<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
    <script type="text/javascript">
    window.history.forward();
    function noBack()
    {
        window.history.forward();
    }
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
            <img src="../file.png" class="img-left mt-2" style=" margin: 5px; padding: 5px auto; width: 5%; " alt="Logo"></a>
            <ul>
            <li><a  href="#">Home</a></li>
            <li><a href="playlist.php">Playlist</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
            </header>
       
        <form id="movieform" autocomplete="off" method="post">
            <div class="form-group text-center mt-3">
                
                <input name="movie" type="text" id="movie" placeholder="Search Movie" style=" padding: 5px; width: 30%;"></input>
                <button onclick="click()" class="btn btn-block">Search Movie</button>
           
            </div>
        </form>
        <div id="result">


         </div>
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

 ?>
<?php
if(isset($_POST['movie'])){
$movie = $_POST['movie'];

if ($movie != ''){
if(isset($_POST['movie'])){
    function getImdbRecord($movie, $ApiKey)
{
    $path = "http://www.omdbapi.com/?apikey=".$ApiKey."&t=".$movie;
    $json = file_get_contents($path);
    return json_decode($json, TRUE);

    
}

$data = getImdbRecord($movie,'5560c0a5');
echo '
<div class="block">
        <img src="'.$data["Poster"].'" style=" float: left; padding: 5px; margin-right:10px; ;" class="img-thumbnail" width="200" height="200">        
        <p>Name : '.$data['Title'].'</p>
        <p> Released : '.$data['Released'].'</p>
        <p> Runtime : '.$data['Runtime'].'</p>
        <p> Actors : '.$data['Actors'].'</p>
        <p> Director : '.$data['Director'].'</p>
        <form action="towatch.php" method="post">
        <button  name="addtowatchlist" class="butt" id="add" name="click" >Add To Watchlist</button>
        </form>
</div>                    
';

$omdbid = $data['imdbID'];
session_start();
$_SESSION['id'] = $omdbid;


}
}
}
else{
    echo "<h5>Search For Movie</h5>";
}

?>




