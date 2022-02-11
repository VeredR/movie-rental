<?php
require "./header.php";
?>
<center>
<h2>

</h2>
</center>
<?php
require "./app/movies.php";
$movies = get_all_movies();
echo "<p>".empty($movies)."</p>";
?>
<ul class="movies">
<?php



foreach($movies as &$movie){?>
   <li><?php echo $movie[0]['name']." release date:".$movie[0]["release_date"];?></li>;
    <?php  
}
 ?>
</ul>



<a href="logout.php">Logout</a>
