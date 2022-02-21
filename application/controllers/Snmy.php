<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Snmy extends CI_Controller {
  
     function __construct() {
	parent::__construct();

		// Load url helper
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('Users');
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
		$this->load->view('admin_login');
	}

	public function user_login()
	{
		
       $username =  $this->input->post('username');
       $password =  $this->input->post('password');
       // $password =  sha1($this->input->post('password'));
		//$this->load->model('Users');
	    $data= $this->Users->user_login( $username,$password); 
	  
	             if($data){
          	                  $seeArray = [
			          	   	                 'id'     => $data[0]['id'],
			          	   	                 'user_role'   => $data[0]['user_role'],
			          	   	                 'user_name'   =>  $data[0]['user_name'],
			          	   	                 'email_id'    => $data[0]['email_id'],
                                        ];


                  	  $this->session->set_userdata($seeArray);
                  	             

			  redirect('/Dashboard/', 'refresh');
			    
			}else
			{
				
				redirect('Snmy', 'refresh');
			}

	}  
	 public function logout(){
       
        $this->session->sess_destroy();
        redirect('Snmy', 'refresh');

    }         
}
