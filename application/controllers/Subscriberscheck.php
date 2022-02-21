<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriberscheck extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('Subscribers');
        $this->load->library('session');
        if(!$this->session->userdata('id')){
            return redirect('Snmy');
        }
    }
    
    public function index() {
        $header['title'] = 'Subscriber List';
        $data['Subscribers'] = $this->Subscribers->get_all();
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $this->load->view('subscribercheck/index',$data);
        $this->load->view('footer.php');
    }
    
    public function create() {
        
        $header['Subscribername'] = 'Create Subsciber';
        $data['Subscriberemail'] = $this->Subscribers->get_all();
        
        $this->load->view('header.php', $header);
        $this->load->view('sidebar.php');
        $this->load->view('subscribercheck/create');
        $this->load->view('footer.php');
    }
    
    public function store() {
        $rules = array(
            array(
                'field' => 'Subscribername',
                'label' => 'Subscriber Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'Subscriberemail',
                'label' => 'Subscriber Email',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = 'Create Subscriber';
            $data['Subscribers'] = $this->Subscribers->get_all();
            
            $this->load->view('header.php', $header);
            $this->load->view('sidebar.php');
            $this->load->view('subscribercheck/create', $data);
            $this->load->view('footer.php');
        } else {
            $data = array(
                'Subscriber_name' => $this->input->post('Subscriberemail'),
                'email_id' => $this->input->post('Subscriberemail'),
            );
            
            $this->Subscribers->insert($data);
            $this->session->set_flashdata('msg', 'New Subscriber Added Successfully');
            redirect(base_url('Subscriberscheck/'));
        }
    }
    
    public function edit($id) {
        $header['title'] = 'Edit Subscribers';
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $data['Subscribers'] = $this->Subscribers->get_all();
        
        $data['Subscribersedit'] = $this->Subscribers->get_by_id($id);
        
        $this->load->view('subscribercheck/edit', $data);
        $this->load->view('footer.php');
        
    }
    
    public function update($id) {
        
        $rules = array(
            array(
                'field' => 'Subscribername',
                'label' => 'Subscriber Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'Subscriberemail',
                'label' => 'Subscriber Email',
                'rules' => 'required'
            ),
        );
        
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = 'Edit Subscribers';
            $data['Subscribers'] = $this->Subscribers->get_all();
            
            $data['Subscribersedit'] = $this->Subscribers->get_by_id($id);
            $this->load->view('header.php',$header);
            $this->load->view('sidebar.php');
            $this->load->view('subscribercheck/edit', $data);
            $this->load->view('footer.php');
        } else {
            $data = array(
                'Subscriber_name' => $this->input->post('Subscribername'),
                'email_id' => $this->input->post('emailid'),
            );
            
            $this->Subscribers->update($id, $data);
            
            // set flash data
            $this->session->set_flashdata('msg', 'Subscribers Updated Successfully');
            redirect(base_url('Subscriberscheck/'));
        }
    }
    
    public function delete($id) {
        $header['Subscriber_id'] = 'Delete Subscriber';
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $data['Subscribers'] = $this->Subscribers->get_all();
        
        $data['Subscribersedit'] = $this->Subscribers->get_by_id($id);
        $this->load->view('subscribercheck/delete', $data);
        $this->load->view('footer.php');
        
        if($this->input->post('delete')=='true'){
            $this->Subscribers->delete($id);
            $this->session->set_flashdata('msg', 'Subscriber Deleted Successfully');
            redirect(base_url('Subscriberscheck/'));
        }
    }
}