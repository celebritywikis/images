<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movies extends CI_Controller {
    
    Public $_image_sizes = array('_mobile'=>array(100,100), '_thumb' => array(250, 250),'_medium' => array(175, 175), '_large' => array(640, 365));
    Public $_updatedtime;
    
    public function __construct() {
        parent::__construct();
        error_reporting(0);
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('Movies_model');
        $this->load->model('Categories_model');
        $this->languages =$this->Movies_model->languages();
        $this->updatedtime = $this->Movies_model->getIndianTime();
        $this->load->library('session');
        if(!$this->session->userdata('id')){
            return redirect('Snmy');
        }
    }
    
    public function index() {
        $header['title'] = 'Movies List';
        $data['ads'] = $this->Movies_model->get_all();
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $this->load->view('movies/index', $data);
        $this->load->view('footer.php');
    }
    
    public function create() {
        
        $header['title'] = 'Ad Movie';
        $data['cities'] = $this->Movies_model->get_all();
        
        $data['languages']= $this->languages;
        $data['categories'] = $this->Categories_model->get_all();
        
        $this->load->view('header.php', $header);
        $this->load->view('sidebar.php');
        $this->load->view('movies/create', $data);
        $this->load->view('footer.php');
    }
    
    public function store() {
        $rules = array(
            array(
                'field' => 'movie_name',
                'label' => 'Type',
                'rules' => 'required'
            ),
            /* array(
                'field' => 'image',
                'label' => 'Image Upload',
                'rules' => 'required'
            ),
            array(
                'field' => 'languages',
                'label' => 'Language',
                'rules' => 'required'
            ),*/
        );
        $this->form_validation->set_rules($rules);
        
        /*
         * Create folder based on year and month
         */
        $date = date('Y-m');
        $create_month_folder = './uploads/movieimages/'.$date.'/';
        
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
            $this->session->set_flashdata('msg', 'Image Uploaded Successfully');
        }
        
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = 'Create Movie';
            $data['ads'] = $this->Movies_model->get_all();
            
            $this->load->view('header.php', $header);
            $this->load->view('sidebar.php');
            $this->load->view('movies/create', $data);
            $this->load->view('footer.php');
        } else {
            
            /*
             * Resize the image file only if it is uploaded
             */
            if($_FILES['userfile']['name']!=''){
                $get_resized_image_names = $this->Movies_model->uploadImageResize($path,$create_month_folder,$upload_data,$this->_image_sizes);
            }
            $languages_implode = implode(',',$this->input->post('languages'));
            $category_implode = implode(',',$this->input->post('category'));
            $url_slug = $this->Movies_model->generate_url_slug($this->input->post('movie_name'),'movies');
            
            if(is_array($get_resized_image_names)){
                
                $data = array(
                    'movie_name' => $this->input->post('movie_name'),
                    'alt_text' => $this->input->post('alt_text'),
                    'language' => $languages_implode,
                    'url_slug'        => $url_slug,
                    'category'       => $category_implode,
                    'image_large'=>$get_resized_image_names['_large'],
                    'image_medium'=>$get_resized_image_names['_medium'],
                    'image_thumb'=>$get_resized_image_names['_thumb'],
                    'image_mobile'=>$get_resized_image_names['_mobile'],
                    'youtube_id'      => $this->input->post('youtube_id'),
                );
            }else{
                $data = array(
                    'movie_name' => $this->input->post('movie_name'),
                    'alt_text' => $this->input->post('alt_text'),
                    'language' => $languages_implode,
                    'url_slug'        => $url_slug,
                    'category'       => $category_implode,
                    'youtube_id'      => $this->input->post('youtube_id'),
                );
            }
            
            $this->Movies_model->insert($data);
            /*
             * remove original upload file image
             */
            $original_file = $create_month_folder.$upload_data['file_name'];
            unlink($original_file);
            
            $this->session->set_flashdata('msg', 'New Movie Added Successfully');
            redirect(base_url('Movies/'));
        }
    }
    
    public function edit($id) {
        $header['title'] = 'Edit Movies';
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $data['ads'] = $this->Movies_model->get_all();
        $data['categories'] = $this->Categories_model->get_all();
        $data['languages']= $this->languages;
        
        $data['adsedit'] = $this->Movies_model->get_by_id($id);
        
        $this->load->view('movies/edit', $data);
        $this->load->view('footer.php');
        
    }
    
    public function update($id) {
        
        $rules = array(
            array(
                'field' => 'movie_name',
                'label' => 'Type',
                'rules' => 'required'
            ),
           /* array(
                'field' => 'image',
                'label' => 'Image',
                'rules' => 'required'
            ),
            array(
                'field' => 'language',
                'label' => 'Language',
                'rules' => 'required'
            ),*/
        );
        $data['adsedit'] =$details= $this->Movies_model->get_by_id($id);
        $this->form_validation->set_rules($rules);
        
        $url_slug = $this->Movies_model->generate_url_slug($this->input->post('movie_name'),'movies');
        if($this->input->post('movie_name')!=$details->movie_name){
            $url_slug_modified = $url_slug;
        }else{
            $url_slug_modified = $details->url_slug;
        }
        
        /*
         * Create folder based on year and month
         */
        $date = date('Y-m');
        $create_month_folder = './uploads/movieimages/'.$date.'/';
        
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
            $this->session->set_flashdata('msg', $this->upload->display_errors());
        }
        else
        {
            //$filename = $this->upload->data('file_name');
            $upload_data = $this->upload->data();
            $this->session->set_flashdata('msg', 'Image Uploaded Successfully');
        }
        
        /*
         * Resize the image file only if it is uploaded
         */
        if($_FILES['userfile']['name']!=''){
            $get_resized_image_names = $this->Movies_model->uploadImageResize($path,$create_month_folder,$upload_data,$this->_image_sizes);
        }
        $languages_implode = implode(',',$this->input->post('languages'));
        $category_implode = implode(',',$this->input->post('category'));
        
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = 'Edit Movies';
            $this->load->view('header.php',$header);
            $this->load->view('sidebar.php');
            $this->load->view('movies/edit', $data);
            $this->load->view('footer.php');
        } else {
            if(is_array($get_resized_image_names)){
                
                /*
                 * edit update image and remove the old image from the images folder
                 */
                if($_FILES['userfile']['name']!=''){
                    $full_file_path = './uploads/movieimages/'.$details->image_large;
                    unlink($full_file_path);
                    $full_medium_file_path = './uploads/movieimages/'.$details->image_medium;
                    unlink($full_medium_file_path);
                    $full_thumb_file_path = './uploads/movieimages/'.$details->image_thumb;
                    unlink($full_thumb_file_path);
                    $full_mobile_file_path = './uploads/movieimages/'.$details->image_mobile;
                    unlink($full_mobile_file_path);
                }
            
            $data = array(
                'movie_name' => $this->input->post('movie_name'),
                'alt_text' => $this->input->post('alt_text'),
                'language' => $languages_implode,
                'url_slug'        => $url_slug_modified,
                'category'       => $category_implode,
                'updated_date'=>$this->updatedtime,
                'image_large'=>$get_resized_image_names['_large'],
                'image_medium'=>$get_resized_image_names['_medium'],
                'image_thumb'=>$get_resized_image_names['_thumb'],
                'image_mobile'=>$get_resized_image_names['_mobile'],
                'youtube_id'      => $this->input->post('youtube_id'),
            );
            }else{
                $data = array(
                    'movie_name' => $this->input->post('movie_name'),
                    'alt_text' => $this->input->post('alt_text'),
                    'language' => $languages_implode,
                    'updated_date'=>$this->updatedtime,
                    'url_slug'        => $url_slug_modified,
                    'category'       => $category_implode,
                    'youtube_id'      => $this->input->post('youtube_id'),
                );
            }
            
            $this->Movies_model->update($id, $data);
            
            $original_file = $create_month_folder.$upload_data['file_name'];
            unlink($original_file);
            
            // set flash data
            $this->session->set_flashdata('msg', 'Movie Updated Successfully');
            redirect(base_url('movies/index'));
        }
    }
    
    public function delete($id) {
        $header['title'] = 'Delete Movie';
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $data['languages']= $this->languages;
        $data['ads'] = $this->Movies_model->get_all();
        
        $data['adsedit'] = $details = $this->Movies_model->get_by_id($id);
        $this->load->view('movies/delete', $data);
        $this->load->view('footer.php');
        
        if($this->input->post('delete')=='true'){
            
            $full_file_path = './uploads/movieimages/'.$details->image_large;
            unlink($full_file_path);
            $full_medium_file_path = './uploads/movieimages/'.$details->image_medium;
            unlink($full_medium_file_path);
            $full_thumb_file_path = './uploads/movieimages/'.$details->image_thumb;
            unlink($full_thumb_file_path);
            $full_mobile_file_path = './uploads/movieimages/'.$details->image_mobile;
            unlink($full_mobile_file_path);
            $this->Movies_model->delete($id);
            $this->session->set_flashdata('msg', 'Movie Deleted Successfully');
            redirect(base_url('Movies/'));
        }
    }
}