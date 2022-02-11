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

foreach($movies as &$movie){?>
    <a href= "./app/create_page.php?name=<?php echo $movie['name']; ?>"><li> <?php echo $movie['name']." release date:".$movie["release_date"];?></li></a>
    <?php
    } ?>
</ul>



<a href="logout.php">Logout</a>
