<?php
require "./header.php";
?>
<center>
<h2>
Welcome to our movies rental site!
</h2>



<?php
require "./app/movies.php";

$movies = get_all_movies();
if ($movies){
    echo $movies;
echo "<div class= 'movies-list'><ul>"; 
foreach($movies as $movie){
    foreach ($movie as &$mov){?>
   <li class="movie">
      <!-- <a href = "./app/create_page.php?name="<?php echo $mov['name']; ?>>-->
          <div class="row">
            <div class="col-md-9">
                <h2><?php echo $mov['name'];?></h2>
                <h3><?php echo $mov['score'];?></h3>
                <div class= 'time'>
                     <h3><?php echo $mov['release_date'];?></h3>
                </div>
                </div>
            </div>
      <!--  </a> -->
    </li>
<?php  }
}
echo "</ul></div>";
}
 ?>

</center>


<a href="logout.php">Logout</a>
