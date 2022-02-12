<?php
include ("DB.php");


$db = new DB();
function get_all_movies(){
    $movies = $db->getRows('movies',['select'=>'*']);
    if (!$movies || empty($movies) || !count($movies)){
        return false;
    }
    else{
        return $movies;
    }

}
function get_movie($name){
    $movie =  $db->getRows('movies',['select'=>'*', 'where'=>['name'=>$name]])

    if (!$movie || empty($movie) || !count($movie)){
        return false;
    }
    else{
        return $movie;
    }
}
function rent_movie($user_id, $movie_id){
    $ttl =new DateTime('NOW');
    $ttl->modify('+1 week');
    $this -> $db->insert('rentals',['user_id'=>$user_id,'movie_id'=>$movie_id,'ttl'=>$ttl]);
}
