<?php
include ("DB.php");

$db = new DB();
function get_all_rentals(){
    $movies = $db->getRows('rentals',['select'=>'*']);
    if !$movies:
        return []
    else:
        return $movies


}
function get_rentals_of_user($user){
    return $this->$db->getRows('rentals',['select'=>'*', 'where'=>['user_id'=>$user]]);
}
function get_rentals_of_movie($movie){
    return $this->$db->getRows('rentals'['select'=>'*','where'=>['movie_id'=>$movie]]);
}


