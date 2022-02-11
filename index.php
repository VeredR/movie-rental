<?php
require "./header.php";
?>
<center>
<h2>

</h2>
</center>

<table>

<?php
require "./app/movies.php";
$movies = new movies();
$all_movies =$movies->get_all_movies();

foreach($all_movies as &$movie){
            echo "<tr>" .
                "<td>" . $movie["name"] . "</td>" .
                "<td>" . $movie["score"] . "</td>" .
                "<td>" . $movie["release_date"] . "</td>" .
                "</tr>"; 
}
 ?>
</table>
 




<a href="logout.php">Logout</a>
