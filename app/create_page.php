<?php
require "./movies.php";
session_start();
if(!isset($_SESSION['user_login'])){
    header("locaion: index.php");
}

$id = $_SESSION['user_login'];


$movie_name = $_GET['name'];

$movie = get_movie($movie_name);

?>
<h1>
    <?php echo $movie_name;?>
</h1>
<img src="<?php echo $movie["image"];?>"/> 
<h2>
    <?php echo $movie["release_date"];?>
</h2>
<h3><?php echo $movie["score"];?></h3>
<p><?php echo $movie['overview'];?></p>



