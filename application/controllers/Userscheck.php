<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

class Userscheck extends CI_Controller {
    
    Public $_users_select;
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('Users');
        $this->load->library('session');
        $this->_users_select = $this->Users->users_select();
        if(!$this->session->userdata('id')){
            return redirect('Snmy');
        }
    }
    
    public function index() {
        $header['title'] = 'User List';
        $data['Users'] = $this->Users->get_all();
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $this->load->view('usercheck/index',$data);
        $this->load->view('footer.php');
    }
    
    public function create() {
        
        $header['username'] = 'Create User';
        $data['useremail'] = $this->Users->get_all();
        
        $data['users_select'] = $this->_users_select;
        
        $this->load->view('header.php', $header);
        $this->load->view('sidebar.php');
        $this->load->view('usercheck/create', $data);
        $this->load->view('footer.php');
    }
    
    public function store() {
        $rules = array(
            array(
                'field' => 'username',
                'label' => 'User Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'useremail',
                'label' => 'User Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'user_role',
                'label' => 'User Role',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = 'Create user';
            $data['users'] = $this->Users->get_all();
            
            $this->load->view('header.php', $header);
            $this->load->view('sidebar.php');
            $this->load->view('usercheck/create', $data);
            $this->load->view('footer.php');
        } else {
            $data = array(
                'user_name' => $this->input->post('useremail'),
                'email_id' => $this->input->post('useremail'),
                'user_role' => $this->input->post('user_role'),
            );
            
            $this->Users->insert($data);
            $this->session->set_flashdata('msg', 'New User Added Successfully');
            redirect(base_url('Userscheck/'));
        }
    }
    
    public function edit($id) {
        $header['title'] = 'Edit Users';
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $data['users'] = $this->Users->get_all();
        $data['users_select'] = $this->_users_select;
        
        $data['usersedit'] = $this->Users->get_by_id($id);
        
        $this->load->view('usercheck/edit', $data);
        $this->load->view('footer.php');
        
    }
    
    public function update($id) {
        
        $rules = array(
            array(
                'field' => 'username',
                'label' => 'User Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'useremail',
                'label' => 'User Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'user_role',
                'label' => 'User Role',
                'rules' => 'required'
            ),
        );
        
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = 'Edit Users';
            $data['users'] = $this->Users->get_all();
            
            $data['usersedit'] = $this->Users->get_by_id($id);
            $this->load->view('header.php',$header);
            $this->load->view('sidebar.php');
            $this->load->view('usercheck/edit', $data);
            $this->load->view('footer.php');
        } else {
            $data = array(
                'user_name' => $this->input->post('username'),
                'email_id' => $this->input->post('useremail'),
                'user_role' => $this->input->post('user_role'),
            );
            
            $this->Users->update($id, $data);
            
            // set flash data
            $this->session->set_flashdata('msg', 'Users Updated Successfully');
            redirect(base_url('Userscheck/'));
        }
    }
    
    public function delete($id) {
        $header['user_id'] = 'Delete User';
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $data['users'] = $this->Users->get_all();
        
        $data['usersedit'] = $this->Users->get_by_id($id);
        $this->load->view('usercheck/delete', $data);
        $this->load->view('footer.php');
        
        if($this->input->post('delete')=='true'){
            $this->Users->delete($id);
            $this->session->set_flashdata('msg', 'User Deleted Successfully');
            redirect(base_url('Userscheck/'));
        }
    }
}