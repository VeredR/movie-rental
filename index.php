<?php
require "./header.php";
require_once "./app/movies.php";

$all_movies = get_all_movies();
?>

<table>
<?php
foreach($all_movies as $movie){
            echo "<tr>" .
                "<td>" . $movie["name"] . "</td>" .
                "<td>" . $movie["score"] . "</td>" .
                "<td>" . $movie["release_date"] . "</td>" .
                "</tr>"; 
}
 ?>
 </table>
 



