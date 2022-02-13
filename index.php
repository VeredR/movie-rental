<?php
require "./header.php";
session_start();
if(!isset($_SESSION['user_login'])){
    header("Location:login.php?location=" . urlencode($_SERVER['REQUEST_URI']));
}
else{
    $id = $_SESSION['user_login'];
}

?>

<?php
require "./app/movies.php";
$movies = new movies();
$all_movies = $movies->get_all_movies();
if ($all_movies){
    echo "<div class='movies-list'><ul>"; 
    $all_movies = json_decode($all_movies);
    foreach($all_movies as $movie){
   ?>
   <li class="movie">
       <a href = "./app/create_page.php?name="<?php echo $movie->name; ?>>
          <div class="row">
            <div class="col-md-9">
                <h2><?php echo $movie->name; ?></h2>
                <h3><?php echo $movie->score;?></h3>
                <h3><?php echo $movie->release_date;?></h3>
            </div>
        </div>
        </a>
    </li>
<?php  
    }
echo "</ul></div>";
}

 ?>



<a href="logout.php">Logout</a>
