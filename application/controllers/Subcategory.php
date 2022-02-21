<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {
    
    Public $_image_sizes = array('_mobile'=>array(100,100), '_thumb' => array(250, 250),'_medium' => array(175, 175), '_large' => array(640, 365));
    Public $_updatedtime;
    
    public function __construct() {
        parent::__construct();
        error_reporting(0);
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('Subcategory_model');
        $this->load->model('Article');
        $this->languages =$this->Subcategory_model->languages();
        $this->updatedtime = $this->Subcategory_model->getIndianTime();
        $this->selectyesno = $this->Subcategory_model->selectyesno();
        $this->load->model('Categories_model');
        $this->load->library('session');
        
        if(!$this->session->userdata('id')){
            return redirect('Snmy');
        }
    }
    
    public function index() {
        $header['title'] = 'Sub Category List';
        $data['ads'] = $this->Subcategory_model->getMainSubCategorNames();
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $this->load->view('subcategory/index', $data);
        $this->load->view('footer.php');
    }
    
    public function create() {
        
        $header['title'] = 'Sub Category';
        $data['categories'] = $this->Categories_model->get_all();
        $data['selectyesno']= $this->selectyesno;
        
        $this->load->view('header.php', $header);
        $this->load->view('sidebar.php');
        $this->load->view('subcategory/create', $data);
        $this->load->view('footer.php');
    }
    
    public function store() {
        $rules = array(
            array(
                'field' => 'subcategory',
                'label' => 'Type',
                'rules' => 'required'
            ),
        );
        $this->form_validation->set_rules($rules);
        
        /*
         * Create folder based on year and month
         */
        $date = date('Y-m');
        $create_month_folder = './uploads/subcategory/'.$date.'/';
        
        $path = $create_month_folder . str_replace('_', '', str_replace(' ', '', strtolower($_FILES['userfile']['name'])));
        
        if (!is_dir($create_month_folder)) {
            mkdir($create_month_folder, 0777, TRUE);
        }
        
        $config['upload_path']          = $create_month_folder;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name'] = str_replace('_', '', str_replace(' ', '', strtolower($_FILES['userfile']['name'])));
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg', $error);
        }
        else
        {
            $upload_data =  $this->upload->data();
            $this->session->set_flashdata('msg', 'Sub Category Image Uploaded Successfully');
        }
        
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = 'Create Sub Category';
            $data['ads'] = $this->Subcategory_model->get_all();
            
            $this->load->view('header.php', $header);
            $this->load->view('sidebar.php');
            $this->load->view('subcategory/create', $data);
            $this->load->view('footer.php');
        } else {
        	/*
             * Resize the image file only if it is uploaded
             */
            if($_FILES['userfile']['name']!=''){
                $get_resized_image_names = $this->Article->uploadImageResize($path,$create_month_folder,$upload_data,$this->_image_sizes);
            }
            
            if(is_array($get_resized_image_names)){
            	 $data = array(
	                'subcategory'     => $this->input->post('subcategory'),
	                'category'        => $this->input->post('category'),
            	 	'image_large'     => $get_resized_image_names['_large'],
                    'image_medium'    => $get_resized_image_names['_medium'],
                    'image_thumb'     => $get_resized_image_names['_thumb'],
                    'image_mobile'    => $get_resized_image_names['_mobile'],
	            );
            	
            }else{
	            $data = array(
	                'subcategory' 	  => $this->input->post('subcategory'),
	                'category'        => $this->input->post('category'),
	            );
            }
            
            /*
             * remove original upload file image
             */
            $original_file = $create_month_folder.$upload_data['file_name'];
            unlink($original_file);
            
            $this->Subcategory_model->insert($data);
            $this->session->set_flashdata('msg', 'New Sub Category Added Successfully');
            redirect(base_url('Subcategory/'));
        }
    }
    
    public function edit($id) {
        $header['title'] = 'Edit Categories';
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $data['ads'] = $this->Subcategory_model->get_all();
        $data['categories'] = $this->Categories_model->get_all();
        $data['adsedit'] = $this->Subcategory_model->get_by_id($id);
        $this->load->view('subcategory/edit', $data);
        $this->load->view('footer.php');
        
    }
    
    public function update($id) {
        
        $rules = array(
            array(
                'field' => 'subcategory',
                'label' => 'Type',
                'rules' => 'required'
            ),
        );
        $data['adsedit'] =$details= $this->Subcategory_model->get_by_id($id);
        $this->form_validation->set_rules($rules);
        
         /*
         * Create folder based on year and month
         */
        $date = date('Y-m');
        $create_month_folder = './uploads/subcategory/'.$date.'/';
        
        $path = $create_month_folder . str_replace('_', '', str_replace(' ', '', strtolower($_FILES['userfile']['name'])));
        
        if (!is_dir($create_month_folder)) {
            mkdir($create_month_folder, 0777, TRUE);
        }
        
        $config['upload_path']          = $create_month_folder;
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name'] = str_replace('_', '', str_replace(' ', '', strtolower($_FILES['userfile']['name'])));
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        
    	if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg', $error);
        }
        else
        {
            $upload_data =  $this->upload->data();
            $this->session->set_flashdata('msg', 'Sub Category Image Uploaded Successfully');
        }
        
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = 'Edit Categories';
            $this->load->view('header.php',$header);
            $this->load->view('sidebar.php');
            $this->load->view('subcategory/edit', $data);
            $this->load->view('footer.php');
        } else {
        	/*
             * Resize the image file only if it is uploaded
             */
            if($_FILES['userfile']['name']!=''){
                $get_resized_image_names = $this->Article->uploadImageResize($path,$create_month_folder,$upload_data,$this->_image_sizes);
            }
            
          if(is_array($get_resized_image_names)){
                /*
                 * edit update image and remove the old image from the images folder
                 */
                if($_FILES['userfile']['name']!=''){
                    $full_file_path = './uploads/subcategory/'.$details->image_large;
                    unlink($full_file_path);
                    $full_medium_file_path = './uploads/subcategory/'.$details->image_medium;
                    unlink($full_medium_file_path);
                    $full_thumb_file_path = './uploads/subcategory/'.$details->image_thumb;
                    unlink($full_thumb_file_path);
                    $full_mobile_file_path = './uploads/subcategory/'.$details->image_mobile;
                    unlink($full_mobile_file_path);
                }
                
                 $data = array(
                'subcategory'     => $this->input->post('subcategory'),
                'category' 		  => $this->input->post('category'),
                'updated_date'    =>$this->updatedtime,
                'image_large'     =>$get_resized_image_names['_large'],
                'image_medium'    =>$get_resized_image_names['_medium'],
                'image_thumb'     =>$get_resized_image_names['_thumb'],
                'image_mobile'    =>$get_resized_image_names['_mobile'],
            );
                
          }else{
            $data = array(
                'subcategory' => $this->input->post('subcategory'),
                'category' => $this->input->post('category'),
                'updated_date'=>$this->updatedtime,
            );
          }
          
         	 /*
             * remove original upload file image
             */
            $original_file = $create_month_folder.$upload_data['file_name'];
            unlink($original_file);
            $this->Subcategory_model->update($id, $data);
            // set flash data
            $this->session->set_flashdata('msg', 'Sub Category Updated Successfully');
            redirect(base_url('Subcategory/'));
        }
    }
    
    public function delete($id) {
        $header['title'] = 'Delete Category';
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $data['languages']= $this->languages;
        $data['ads'] = $this->Subcategory_model->get_all();
        
        $data['adsedit'] = $details = $this->Subcategory_model->get_by_id($id);
        $this->load->view('subcategory/delete', $data);
        $this->load->view('footer.php');
        
        if($this->input->post('delete')=='true'){
            $this->Subcategory_model->delete($id);
            $this->session->set_flashdata('msg', 'Category Deleted Successfully');
            redirect(base_url('Subcategory/'));
        }
    }
}