<?php
require "./header.php";
?>
<center>
<h2>

</h2>
</center>
<?php
require "./app/movies.php";
$movies = new movies();
echo $movies;
?>
<ul class="movies">
<?php
$all_movies =$movies->get_all_movies();

foreach($all_movies as $movie){?>
  <li><?php echo $movie['name']." release date: ".$movie["release_date"];?></li>;
    <?php  
}
 ?>
</ul>



<a href="logout.php">Logout</a>
