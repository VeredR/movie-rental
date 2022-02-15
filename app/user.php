<?php
include_once ("DB.class.php");


class user{
    public function __construct(){ 
        if(!isset($this->db)){ 
            $this->db = new DB();
        }
    }
    function get_all_users(){
        $users = $this->db->getRows('users',['select'=>'*']);
    
        if (!$users || empty($users) || !count($users))
        {
            return false;
        }
        else{
            
            return json_encode($users);
        }
        

    }
    function get_user_by_name($name){
        $user = $this->db->getRows('users',['select'=>'*', 'where'=>['username'=>$name]]);
        if (!$user || empty($user) || !count($user))
        {
            return false;
        }
        else{
            
            return $user[0];
        }
    }

    function get_user_by_id($id){
        $user = $this->db->getRows('users',['select'=>'*', 'where'=>['id'=>$id]]);
        if (!$user || empty($user) || !count($user))
        {
            return false;
        }
        else{
            
            return $user[0];
        }
        
    }

    function get_user_by_email($email){
        $user = $this->db->getRows('users',['select'=>'*', 'where'=>['email'=>$email]]);
        if (!$user || empty($user) || !count($user))
        {
            return false;
        }
        else{
            
            return $user[0];
        }
        
    }

    function create_user($data){
        $pwd = $data['password'];
       
        $username = $data['username']; 
        $email = $data['email'];
       
        
        $created_user =$this->db->insert('users',['username'=>$username,'password'=>$pwd,'email'=>$email]);
        
        if ($created_user){
            return true;
        }
        else if(!$created_user){
            return false;
        }

    }
}

