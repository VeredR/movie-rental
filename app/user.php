<?php
require "DB.class.php";
require "rentals.php";
class user{
    $db = new DB();
    //create

    //login

    //rent

   
    
    function get_all_users(){
        $users = $this->$db->getRows('users',['select'=>'*']);
        if !$movies:
            return [];
        else:
            return $users;


    }
    function get_user_by_name($name){
        return $this->$db->getRows('users',['select'=>'*', 'where'=>['username'=>$name]]);
    }

    function get_user_by_id($id){
        return $this->$db->getRows('users',['select'=>'*', 'where'=>['id'=>$id]]);
    }

    function login($details){
        $user = get_user_by_name($details['username']);
        if ($user){
            password_verify($details['password'],$user[0]['password'])
        }
        
    }

    function create_user($data){
    $pwd = $data['password'];
    $encrypted_pwd = password_hash($pwd);
    $username = $data['username']; 
    try{
        $check = $this->$db->getRows('users',['select'=>'*', 'where'=>['username'=>$username,'password'=>$encrypted_pwd]]) 
        if (!$check){
                $this->$db->insert('users',['username'=>$username,'passord'=>$encrypted_pwd]);
        }
        if ($check){
            return "already exist";
        }
    }catch{
        return False;
    }

    }
   

}