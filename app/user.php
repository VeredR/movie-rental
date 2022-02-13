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
        $encrypted_pwd = password_hash($pwd);
        $username = $data['username']; 
        $email = $data["email"];

        $check = $this->db->getRows('users',['select'=>'*', 'where'=>['username'=>$username,'password'=>$encrypted_pwd,'email'=>$email]]); 
        if (!$check||empty($check)){
                $this->db->insert('users',['username'=>$username,'passord'=>$encrypted_pwd,'email'=>$email]);
                return get_user_by_email($email);
        }
        if ($check){
            return "already exist";
        }
        

    }
}

