<?php
include ("DB.php");
require "rentals.php";

$db = new DB();

function get_all_users(){
    $users = $db->getRows('users',['select'=>'*']);
    if !$movies:
        return [];
    else:
        return $users;


}
function get_user_by_name($name){
    return $db->getRows('users',['select'=>'*', 'where'=>['username'=>$name]]);
}

function get_user_by_id($id){
    return $db->getRows('users',['select'=>'*', 'where'=>['id'=>$id]]);
}

function get_user_by_email($email){
    return $db->getRows('users',['select'=>'*', 'where'=>['email'=>$email]]);
}

function create_user($data){
    $pwd = $data['password'];
    $encrypted_pwd = password_hash($pwd);
    $username = $data['username']; 
    $email = $data["email"]
    try{
        $check = $db->getRows('users',['select'=>'*', 'where'=>['username'=>$username,'password'=>$encrypted_pwd,'email'=>$email]]) 
        if (!$check){
                $db->insert('users',['username'=>$username,'passord'=>$encrypted_pwd,'email'=>$email]);
                return get_user_by_email($email);
        }
        if ($check){
            return "already exist";
        }
    }catch{
        return False;
    }

}


