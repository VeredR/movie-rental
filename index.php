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

$all_movies =get_all_movies();

foreach($all_movies as $movie){?>
    <tr>
        <?php
            echo "<td>" . $movie["name"] . "</td>" .
                "<td>" . $movie["score"] . "</td>" .
                "<td>" . $movie["release_date"] . "</td>";
        ?>
    </tr>
    <?php
}
 ?>
</table>
 




<a href="logout.php">Logout</a>
