<center>
<h2>
<?php
require "./header.php";
require_once "./app/user.php";
require "./app/movies.php";

/*session_start();
if(!isset($_SESSION['user_login'])){
    header("locaion: connecting.php");
}

$id = $_SESSION['user_login'];
$user = get_user_by_id($id);

if(isset($_SESSION['user_login'])){
?>
Welcome, 
<?php 
echo $user;
echo $user['username'];
}*/
?>
</h2>
</center>

<?php $movies = get_all_movies();
  ?>
<ul class="movies">
   <?php foreach($movies as &$movie){?>
    <li><a href= "./app/create_page.php?name=<?php echo $movie['name']; ?>"> <?php echo $movie['name']." release date:".$movie["release_date"];?></a></li>
    <?php
    } ?>
</ul>



<a href="logout.php">Logout</a>
