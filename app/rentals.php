<?php
include_once ("DB.class.php");

class rentals{
    public function __construct(){ 
        if(!isset($this->db)){ 
            $this->db = new DB();
        }
    }
    function get_all_rentals(){
        $rentals = $this->db->getRows('rentals',['select'=>'*']);
        if (empty($rentals) || !count($rentals)){
            return False;
        }
        else{
            return $rentals;
        }

    }
    function get_rentals_of_user($user){
        $user_rentals = $this->db->getRows('rentals',['select'=>'*', 'where'=>['user_id'=>$user]]);
        if (empty($user_rentals) || !count($user_rentals)){
            return False;
        }
        else{
            return $user_rentals;
        }

    }

    function get_rentals_of_movie($movie){
        $movie_rentals = $this->db->getRows('rentals',['select'=>'*','where'=>['movie_id'=>$movie]]);
        if (empty($movie_rentals) || !count($movie_rentals)){
            return False;
        }
        else{
            return $movie_rentals;
        }

        
    }



}