<center>
<h2>
<?php
require_once "./app/user.php";
require "./app/movies.php";

session_start();
if(!isset($_SESSION['user_login'])){
    header("locaion: index.php");
}

$id = $_SESSION['user_login'];
$user = get_user_by_id($id);

if(isset($_SESSION['user_login'])){
?>
Welcome, 
<?php 
echo $user['username'];
}
?>
</h2>



<a href="logout.php">Logout</a>
</center>