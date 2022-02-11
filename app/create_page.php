<?php
require "./movies.php";

/*
session_start();
if(!isset($_SESSION['user_login'])){
    header("locaion: connecting.php");
}

$id = $_SESSION['user_login'];
$user = get_user_by_id($id);




$id = $_SESSION['user_login'];
*/

$movie_name = $_GET['name'];

$movie = get_movie($movie_name);

?>
<h1>
    <?php echo $movie_name;?>
</h1>
<img src="<?php echo $movie["image"];?>"/> 
<h2>
    <?php echo $movie["release_date"];?>
</h2>
<h3><?php echo $movie["score"];?></h3>
<p><?php echo $movie['overview'];?></p>
<?php /*
$movie_rentals = get_rentals_of_movie($movie['name']);
if(!$movie_rentals or empty($movie_rentals)){?>
<input type="submit" name="btn_login" class ="btn btn-success" value="Rent" onclick=<?php rent_movie($movie_name,$id);?>>
<?php}
else if ($movie_rentals){
    foreach($movie_rentals as &$rental){
        if($rental['user_id']==$id && $rental['ttl']> datetime.now()){
            ?>
            <?php $now =new DateTime('NOW')?>
            <h4><?php echo "You have ".$rental['ttl']-$now." more days to return this movie";?></h4>
            <?php
            break;
        }
    }
    ?>
    <input type="submit" name="btn_login" class ="btn btn-success" value="Rent" onclick=<?php rent_movie($movie_name,$id);?>>

}*/
?>
