<?php

class Users extends Base {
    protected $table = 'users';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function user_login($username,$password){
        
        $checkUser = $this->db->where(['user_name'=> $username , 'password'=> $password])
        ->get('users');
        
        if( $checkUser->num_rows() > 0){
            
            return $checkUser->result_array();
        }
    }
}