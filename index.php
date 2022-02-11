<?php
require "./header.php";
?>
<center>
<h2>

</h2>
</center>

<ul class="movies">
<?php
require "./app/movies.php";

$movies = get_all_movies();

foreach($movies as $movie){?>
   <li> <?php echo $movie['name']." release date:".$movie["release_date"];?></li>
    <?php
    } ?>
</ul>



<a href="logout.php">Logout</a>
