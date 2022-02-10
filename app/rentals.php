<?php
include ("DB.class.php");

class rentals{
    $db = new DB();
    function get_all_rentals(){
        $movies = $this->$db->getRows('rentals',['select'=>'*']);
        if !$movies:
            return []
        else:
            return $movies


    }
    function get_rentals_of_user($user){
        return $this->$db->getRows('rentals',['select'=>'*', 'where'=>['user_id'=>$user]])
    }
}