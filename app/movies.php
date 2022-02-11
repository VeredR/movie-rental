<?php
include ("DB.class.php");

class movies{
    $db = new DB();
    function get_all_movies(){
        $movies = $this->$db->getRows('movies',['select'=>'*']);
        if !$movies or empty($movie_id):
            return False
        else:
            return $movies;


    }
    function get_movie($name){
        return $this->$db->getRows('movies',['select'=>'*', 'where'=>['name'=>$name]])
    }
    function rent_movie($user_id, $movie_id){
        $ttl =new DateTime('NOW');
        $ttl->modify('+1 week');
        $this -> $db->insert('rentals',['user_id'=>$user_id,'movie_id'=>$movie_id,'ttl'=>$ttl]);
    }
}