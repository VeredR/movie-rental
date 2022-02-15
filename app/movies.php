<?php
include_once ("DB.class.php");

class movies{
    public function __construct(){ 
        if(!isset($this->db)){ 
            $this->db = new DB();
        }
    }
    function get_all_movies(){
        
        $movies = $this->db->getRows('movies',['select'=>'*']);
        if (!$movies || empty($movies) || !count($movies)){
            return false;
        }
        else{
            
            return json_encode($movies);
        }

    }
    function get_movie($name){
        

        $movie = $this->db->getRows('movies',['select'=>'*', 'where'=>['name'=>$name]]);

        if (!$movie || empty($movie) || !count($movie)){
            return array();
        }
        else{
            return $movie[0];
        }
    }
    function rent_movie($user_id, $movie_id){
        $ttl =new DateTime('NOW');
        $ttl->modify('+1 week');
        $ttl->modify('+1 day');
        $ttl = $ttl->format('Y-m-d H:i:s');
        $insertion= $this->db->insert('rentals',array('user_id'=>$user_id,'movie_id'=>$movie_id,'ttl'=>$ttl));
        if($insertion){
            return $insertion;
        }
        else{
            return FALSE;
        }
    }
    
}