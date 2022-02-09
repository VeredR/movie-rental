<?php
include ("../DB.class.php");

class movies{
    $db = new DB();
    function get_all_movies(){
        $movies = $this->$db->getRows('movies',['select'=>'*']);
        if !$movies:
            return []
        else:
            return $movies


    }
    function get_movie($name){
        return $this->$db->getRows('movies',['select'=>'*', 'where'=>['name'=>$name])
    }
}