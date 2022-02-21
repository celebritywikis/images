<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adscheck extends CI_Controller {
     
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('Ads');
        $this->load->library('session');
        
        if(!$this->session->userdata('id')){
            return redirect('Snmy');
        }
    }
    
    public function index() {
        $header['title'] = 'Ads List';
        $data['ads'] = $this->Ads->get_all();
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $this->load->view('adscheck/index', $data);
        $this->load->view('footer.php');
    }
    
    public function create() {
        
        $header['title'] = 'Create Ad';
        $data['cities'] = $this->Ads->get_all();
        
        $this->load->view('header.php', $header);
        $this->load->view('sidebar.php');
        $this->load->view('adscheck/create', $data);
        $this->load->view('footer.php');
    }
    
    public function store() {
        $rules = array(
            array(
                'field' => 'type',
                'label' => 'Type',
                'rules' => 'required'
            ),
            array(
                'field' => 'ad_content',
                'label' => 'Ad Content',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = 'Create Ad';
            $data['ads'] = $this->Ads->get_all();
            
            $this->load->view('header.php', $header);
            $this->load->view('sidebar.php');
            $this->load->view('adscheck/create', $data);
            $this->load->view('footer.php');
        } else {
            $data = array(
                'type' => $this->input->post('type'),
                'ad_content' => $this->input->post('ad_content'),
            );
            
            $this->Ads->insert($data);
            $this->session->set_flashdata('msg', 'New Ad Added Successfully');
            redirect(base_url('Adscheck/'));
        }
    }
    
    public function edit($id) {
        $header['title'] = 'Edit Ads';
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $data['ads'] = $this->Ads->get_all();
        
        $data['adsedit'] = $this->Ads->get_by_id($id);
        
        $this->load->view('adscheck/edit', $data);
        $this->load->view('footer.php');
        
    }
    
    public function update($id) {
        
        $rules = array(
            array(
                'field' => 'type',
                'label' => 'Type',
                'rules' => 'required'
            ),
            array(
                'field' => 'ad_content',
                'label' => 'Ad Content',
                'rules' => 'required'
            ),
        );
        
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = 'Edit Ads';
            $data['ads'] = $this->Ads->get_all();
            
            $data['adsedit'] = $this->Ads->get_by_id($id);
            $this->load->view('header.php',$header);
            $this->load->view('sidebar.php');
            $this->load->view('adscheck/edit', $data);
            $this->load->view('footer.php');
        } else {
            $data = array(
                'type' => $this->input->post('type'),
                'ad_content' => $this->input->post('ad_content'),
            );
            
            $this->Ads->update($id, $data);
            
            // set flash data
            $this->session->set_flashdata('msg', 'Ad Updated Successfully');
            redirect(base_url('Adscheck/'));
        }
    }
    
    public function delete($id) {
        $header['title'] = 'Delete Ads';
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $data['ads'] = $this->Ads->get_all();
        
        $data['adsedit'] = $this->Ads->get_by_id($id);
        $this->load->view('adscheck/delete', $data);
        $this->load->view('footer.php');
        
        if($this->input->post('delete')=='true'){
            $this->Ads->delete($id);
            $this->session->set_flashdata('msg', 'Ad Deleted Successfully');
            redirect(base_url('Adscheck/'));
        }
    }
}