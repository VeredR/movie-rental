<?php
require "./header.php";
?>
<center>
<h2>

</h2>
</center>

<ul>
<?php
require "./app/movies.php";

$movies = get_all_movies();
echo "<div class= 'movies-list'><ul>"; 
foreach($movies as &$movie){?>
   <li class="movie">
       <a href = "./app/create_page.php?name="<?php echo $movie['name']; ?>>
          <div class="row">
            <div class="col-md-9">
                <h2><?php echo $movie['name'];?></h2>
                <h3><?php echo $movie['score'];?></h3>
                <div class= 'time'>
                     <h3><?php echo $movie['release_date'];?></h3>
                  </div>
                </div>
            </div>
        </a>
    </li>
<?php  }
echo "</ul></div>";
 ?>




<a href="logout.php">Logout</a>
