<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articlecheck extends CI_Controller {
    
    Public $_image_sizes = array('_mobile'=>array(100,100), '_thumb' => array(360, 360),'_medium' => array(360, 449), '_large' => array(650, 800));
    Public $_updatedtime;
    
    public function __construct() {
        parent::__construct();
        //error_reporting(0);
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('Article');
        $this->load->model('File');
        $this->load->model('Categories_model');
        $this->load->model('Subcategory_model');
        $this->load->library('session');
        $this->languages =$this->Article->languages();
        $this->updatedtime = $this->Article->getIndianTime();
        
        if(!$this->session->userdata('id')){
            return redirect('Snmy');
        }
    }
    
    public function index() {
        $header['title'] = 'Article List';
        $data['Article'] = $this->Article->getAllArticleByCatNames();
        $data['category_model'] = $this->Categories_model;
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $this->load->view('articlecheck/index',$data);
        $this->load->view('footer.php');
    }
    
    public function create() {
        
        $header['title'] = 'Create Article';
        $data['useremail'] = $this->Article->get_all();
        $data['languages']= $this->languages;
        $data['categories'] = $this->Categories_model->get_all();
        $data['subcategory'] = $this->Subcategory_model->get_all();
        
        $this->load->view('header.php', $header);
        $this->load->view('sidebar.php');
        $this->load->view('articlecheck/create', $data);
        $this->load->view('footer.php');
    }
    
    public function store() {

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Article Title',
                'rules' => 'required'
            ),
             
        );
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == FALSE) {
            $header['title'] = 'Create Article';
            $data['Article'] = $this->Article->get_all();
            
            $this->load->view('header.php', $header);
            $this->load->view('sidebar.php');
            $this->load->view('articlecheck/create', $data);
            $this->load->view('footer.php');
        } else {
        	$url_slug = $this->Article->generate_url_slug($this->input->post('folder_name'),'article');
        	
        		$data = array(
	               'category'        => $this->input->post('category'),
	           	   'subcategory'     => $this->input->post('subcategory'),
	               'title'           => $this->input->post('title'),
	               'url_slug'        => $url_slug,
	               'user_name'       => $this->session->userdata('user_name'),
        		   'folder_name'     => strtolower(str_replace(' ','-',$this->input->post('folder_name'))),
	               'fake_views'      => $this->input->post('fake_views'),
	               'meta_keywords'   => $this->input->post('meta_keywords'),
	               'meta_desc'       => $this->input->post('meta_desc'),
	               'meta_tags'       => $this->input->post('meta_tags'),
        		);

        	$this->Article->insert($data);
	         $this->session->set_flashdata('msg', 'New Article Added Successfully');
	         redirect(base_url('Articlecheck/'));
        }
    }
    
    
    
    public function edit($id) {
        $header['title'] = 'Edit Article';
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $data['Article'] = $this->Article->get_all();
        
        $data['articleedit'] = $article = $this->Article->get_by_id($id);
        $cat_id = $article->category;
        $data['languages']= $this->languages;
        $data['categories'] = $this->Categories_model->get_all();
        $data['subcategory'] = $this->Subcategory_model->getMainSubCategorNamesByCatid($cat_id);
        
        $this->load->view('articlecheck/edit', $data);
        $this->load->view('footer.php');
        
    }
    
    public function update($id) {

        $rules = array(
         array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),
           /* array(
                'field' => 'picture',
                'label' => 'Picture',
                'rules' => 'required'
            ),*/

        );
        
        $this->form_validation->set_rules($rules);
        $data['articleedit'] = $details=$this->Article->get_by_id($id);
        
        if($this->input->post('category')=='' || $this->input->post('subcategory')==''){
        	$this->session->set_flashdata('msg', 'Category and Sub Category cannot be empty, check once again');
            redirect(base_url('Articlecheck/'));
        }
        
        /*
         * Create folder based on year and month
         */
        $date = date('Y-m');
        $create_month_folder = './uploads/articles/'.$date.'/';
        
        $path = $create_month_folder . str_replace('_', '', str_replace(' ', '', strtolower($_FILES['userfile']['name'])));
        
        if (!is_dir($create_month_folder)) {
            mkdir($create_month_folder, 0777, TRUE);
        }
        
        $config['upload_path']          = $create_month_folder;
        $config['allowed_types']        = '*';
        $config['file_name'] = str_replace('_', '', str_replace(' ', '', strtolower($_FILES['userfile']['name'])));
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        
        $url_slug = $this->Article->generate_url_slug($this->input->post('folder_name'),'article');
        if($this->input->post('title')!=$details->title){
            $url_slug_modified = $url_slug;
        }else{
            $url_slug_modified = $details->url_slug;
        }
        
        
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
            $header['title'] = 'Edit Article';
            $data['Article'] = $this->Article->get_all();
            
            
            $this->load->view('header.php',$header);
            $this->load->view('sidebar.php');
            $this->load->view('articlecheck/edit', $data);
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
                    $full_file_path = './uploads/articles/'.$details->image_large;
                    unlink($full_file_path);
                    $full_medium_file_path = './uploads/articles/'.$details->image_medium;
                    unlink($full_medium_file_path);
                    $full_thumb_file_path = './uploads/articles/'.$details->image_thumb;
                    unlink($full_thumb_file_path);
                    $full_mobile_file_path = './uploads/articles/'.$details->image_mobile;
                    unlink($full_mobile_file_path);
                }
                $data = array(
                    'category'        => $this->input->post('category'),
                	'subcategory'     => $this->input->post('subcategory'),
                    'title'           => $this->input->post('title'),
                    'url_slug'        => $url_slug_modified,
                    'image_large'     =>$get_resized_image_names['_large'],
                    'image_medium'    =>$get_resized_image_names['_medium'],
                    'image_thumb'     =>$get_resized_image_names['_thumb'],
                    'image_mobile'    =>$get_resized_image_names['_mobile'],
                    'updated_date'    => $this->updatedtime,
                    'fake_views'      => $this->input->post('fake_views'),
                    'singer'          => $this->input->post('singer'),
                    'meta_keywords'   => $this->input->post('meta_keywords'),
                    'meta_desc'       => $this->input->post('meta_desc'),
                    'meta_tags'       => $this->input->post('meta_tags'),
                );
            }else{
                $data = array(
                    'category'        => $this->input->post('category'),
                	'subcategory'     => $this->input->post('subcategory'),
                    'title'           => $this->input->post('title'),
                    'url_slug'        => $url_slug_modified,
                    'updated_date'    => $this->updatedtime,
                    'fake_views'      => $this->input->post('fake_views'),
                    'meta_keywords'   => $this->input->post('meta_keywords'),
                    'meta_desc'       => $this->input->post('meta_desc'),
                    'meta_tags'       => $this->input->post('meta_tags'),
                );
            }
            
            $this->Article->update($id, $data);
            
            /*
             * remove original upload file image
             */
            $original_file = $create_month_folder.$upload_data['file_name'];
            unlink($original_file);
            
            // set flash data
            $this->session->set_flashdata('msg', 'Article Updated Successfully');
            redirect(base_url('Articlecheck/'));
        }
    }
    
    public function delete($id) {

    	// echo $id; die('delete');
    	$header['user_id'] = 'Delete Article';
    	$this->load->view('header.php',$header);
    	$this->load->view('sidebar.php');
    	$data['Article'] = $this->Article->get_all();
    	$data['languages']= $this->languages;
    	$data['categories'] = $this->Categories_model->get_all();
    	$data['subcategory'] = $this->Subcategory_model->get_all();

    	$data['articleedit'] = $details = $this->Article->get_by_id($id);
    	$this->load->view('articlecheck/delete', $data);
    	$this->load->view('footer.php');

    	if($this->input->post('delete')=='true'){
    		/*
    		 * Delete all the images related to this article
    		 */
    		$files = $this->File->getFilesByArticleId($id);
    		$data['article_id'] = $id;
    		$yearmonth = $files->yearmonth;
    		 
    		$articledetails = $this->Article->get_by_id($id);

    		$folder_name = $articledetails->folder_name;
    		$category_id = $articledetails->category;

    		$category_name = $this->Categories_model->get_by_id($category_id);
    		$category = strtolower($category_name->category);

    		$create_month_folder = './uploads/'.$category.'/'.$folder_name.'/';

    		foreach ($files as $value){
    			/*
    			 * removing the images relared to this article before deleting
    			 */
    			$full_file_path = $create_month_folder.$value->image_large;
    			unlink($full_file_path);
    			$full_medium_file_path = $create_month_folder.$value->image_medium;
    			unlink($full_medium_file_path);
    			$full_thumb_file_path = $create_month_folder.$value->image_thumb;
    			unlink($full_thumb_file_path);
    			$full_mobile_file_path = $create_month_folder.$value->image_mobile;
    			unlink($full_mobile_file_path);
    		}

    		/*
    		 * Delete all the resizes folders and images in it
    		 */
    		$getFolderStructure = $this->File->getFilesByFolderId($id);
    		foreach ($getFolderStructure as $sub_folder_path){
    			$sub_folder = $sub_folder_path->yearmonth;
    			$sub_folders = $create_month_folder.$sub_folder;
    			$this->File->deleteDir($sub_folders);
    		}
    		/*
    		 * Delete the celebrity folder after deleting all the resizes folders
    		 */
    		$this->File->deleteDir($create_month_folder);
    		
    		/*Delete all the files when all the 
    		 * images folder are deleted
    		 */
    		foreach ($files as $value){
    			$this->File->delete($value->id);
    		}
    		/*
    		 * Finally delete the article
    		 * 
    		 */
    		$this->Article->delete($id);
    		$this->session->set_flashdata('msg', 'Article and its related images and folders are now Deleted Successfully');
    		redirect(base_url('Articlecheck/'));
    	}
    }
    
	public function filecreate($article_id){
		
		if(empty($article_id)){
    		$article_id = $this->input->post('article_id');
    	}
    	$articledetails = $this->Article->get_by_id($article_id);
    	
    	$folder_name = $articledetails->folder_name;
    	$category_id = $articledetails->category;
    	
    	if(empty($folder_name) || empty($category_id)){
    		$this->session->set_flashdata('msg', 'Folder Name or Category Name is empty, please update in article');
    		redirect(base_url('Articlecheck/'));
    	}
    	
    	$category_name = $this->Categories_model->get_by_id($category_id);
    	$category = strtolower($category_name->category);
    	
    	/*
    	 * Create folder based on year and month
    	 */
    	if(!empty($_FILES['userfile']['name']) && count(array_filter($_FILES['userfile']['name']))>0){
    		$cpt = count($_FILES['userfile']['name']);
    		$files = $_FILES;
    		for($i=0; $i<$cpt; $i++)
    		{
    			$date = date('Y-m');
    			$create_month_folder = './uploads/'.$category.'/'.$folder_name.'/'.$date.'/';
    			/*
    			 * To insert multiple images in one article
    			 */
    			$_FILES['file']['name']       = $files['userfile']['name'][$i];
    			$_FILES['file']['type']       = $files['userfile']['type'][$i];
    			$_FILES['file']['tmp_name']   = $files['userfile']['tmp_name'][$i];
    			$_FILES['file']['error']      = $files['userfile']['error'][$i];
    			$_FILES['file']['size']       = $files['userfile']['size'][$i];

    			$path = $create_month_folder . str_replace('_', '', str_replace(' ', '', strtolower($_FILES['userfile']['name'][$i])));

    			if (!is_dir($create_month_folder)) {
    				mkdir($create_month_folder, 0777, TRUE);
    			}

    			$image_file_name = str_replace('_', '', str_replace(' ', '', strtolower($_FILES['userfile']['name'][$i])));

    			$config = array();
    			$config['upload_path']   = $create_month_folder;
    			$config['allowed_types'] = '*';
    			$config['file_name'] = str_replace('_', '', str_replace(' ', '', strtolower($_FILES['userfile']['name'][$i])));
    			
				$this->load->library('upload', $config);
    			$this->upload->initialize($config);

    			if ( ! $this->upload->do_upload('file'))
    			{
    				$error = array('error' => $this->upload->display_errors());
    				$this->session->set_flashdata('msg', $error['error']);
    			}
    			else
    			{
    				$upload_data =  $this->upload->data();
    				$this->session->set_flashdata('msg', 'Image Uploaded Successfully');
    			}
    			
    			/*
    			 * Resize the image file only if it is uploaded
    			 */
    			if($_FILES['userfile']['name'][$i]!=''){
    				$image_upload['file_name'] =$_FILES['userfile']['name'][$i]; 
    				$get_resized_image_names = $this->Article->uploadImageResize($path,$create_month_folder,$image_upload,$this->_image_sizes);
    				$size = filesize($path);
    				$filename = pathinfo($get_resized_image_names['_large']);
    				$image_title="";
    				$image_title = $upload_data['client_name'];
    				$image_title = str_replace("_", " ", $image_title);
    				$image_title = str_replace("-", " ", $image_title);
    				$image_title = pathinfo($image_title, PATHINFO_FILENAME);
    				
    				$data_insert = array(
    				'article_id'      => $article_id,
         			'file_size'  	  => $size,
    				'yearmonth'		  => $date,
    				'title'			  => $image_title,
         			'filename'  	  => $filename['basename'],
	                'image_large'     => $get_resized_image_names['_large'],
                    'image_medium'    => $get_resized_image_names['_medium'],
                    'image_thumb'     => $get_resized_image_names['_thumb'],
                    'image_mobile'    => $get_resized_image_names['_mobile'],
    				);
    				$this->File->insert($data_insert);
    			}
    			
    			/*
		    	 * remove original upload file image
		    	 */
		    	$original_file = $create_month_folder.$upload_data['file_name'];
		    	unlink($original_file);
    	
    		}
    	}

    	
    	$data['article_id'] = $article_id;
    	if($this->input->post('upload')=='true'){
    	redirect(base_url('Articlecheck/filelist/'.$article_id.'/true/'));
    	}
    	$this->load->view('header.php', $header);
        $this->load->view('sidebar.php');
        $this->load->view('articlecheck/filecreate.php',$data);
        $this->load->view('footer.php');
        
      //  redirect(base_url('articlecheck/filelist/'.$article_id));
    }
    
	public function filelist($id) {
        $header['title'] = 'File List';
        $data['File'] = $this->File->getFilesByArticleId($id);
        $data['article_id'] = $id;
        
    	$articledetails = $this->Article->get_by_id($id);
    	
    	$folder_name = $articledetails->folder_name;
    	$category_id = $articledetails->category;
    	
    	$category_name = $this->Categories_model->get_by_id($category_id);
    	$category = strtolower($category_name->category);
    	
    	$create_month_folder = './uploads/'.$category.'/'.$folder_name.'/';
    	
    	$data['image_path'] = $create_month_folder;
    	
    	$folder_name = $articledetails->folder_name;
    	$category_id = $articledetails->category;
        
        if(strlen($msg) && $msg=='true'){
        	$this->session->set_flashdata('msg', 'Image Uploaded Successfully for this article');
        	redirect(base_url('Articlecheck/filelist/'.$id));
        }
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $this->load->view('articlecheck/filelist',$data);
        $this->load->view('footer.php');
    }
    
    public function fileedit($id) {
    	$header['title'] = 'Edit File';
    	$files= $this->File->get_by_id($id);

    	if(empty($article_id)){
    		$article_id = $files->article_id;
    	}
    	$data['file_id'] = $id;
    	$data['files']=$files;
    	$data['article_id']=$article_id;
    	$articledetails = $this->Article->get_by_id($article_id);
    	 
    	$folder_name = $articledetails->folder_name;
    	$category_id = $articledetails->category;
    	 
    	$category_name = $this->Categories_model->get_by_id($category_id);
    	$category = strtolower($category_name->category);

    	$create_month_folder = './uploads/'.$category.'/'.$folder_name.'/';
    	$create_month_folder_preview = $create_month_folder.$files->image_medium;
    	$data['image_path'] = $create_month_folder_preview;

    	$this->load->view('header.php',$header);
    	$this->load->view('sidebar.php');
    	$this->load->view('articlecheck/fileedit', $data);
    	$this->load->view('footer.php');

    }
    
    public function fileupdate($id)
    {
    	if(empty($id)){
    		$id = $this->input->post('file_id');
    	}
    	$files= $this->File->get_by_id($id);

    	if(empty($article_id)){
    		$article_id = $this->input->post('article_id');
    	}
    	 
    	$data['file_id'] = $id;
    	$data['files']=$files;
    	$data['article_id']=$article_id;
    	$articledetails = $this->Article->get_by_id($article_id);

    	$folder_name = $articledetails->folder_name;
    	$category_id = $articledetails->category;

    	$category_name = $this->Categories_model->get_by_id($category_id);
    	$category = strtolower($category_name->category);

    	$create_month_folder = './uploads/'.$category.'/'.$folder_name.'/';
    	$create_month_folder_preview = $create_month_folder.$files->image_medium;
    	$data['image_path'] = $create_month_folder_preview;
    	$this->form_validation->set_rules($rules);

    	/*
    	 * Create folder based on year and month
    	 */
    	$date = date('Y-m');
    	$create_month_folder = './uploads/'.$category.'/'.$folder_name.'/'.$date.'/';
    	$create_month_folder_unlink = './uploads/'.$category.'/'.$folder_name.'/';

    	$path = $create_month_folder . str_replace('_', '', str_replace(' ', '', strtolower($_FILES['userfile']['name'])));

    	if (!is_dir($create_month_folder)) {
    		mkdir($create_month_folder, 0777, TRUE);
    	}

    	$config['upload_path']          = $create_month_folder;
    	$config['allowed_types']        = '*';
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
    		$this->session->set_flashdata('msg', 'File Image Uploaded Successfully');
    	}

    	if($_FILES['userfile']['name']!='') {
    		/*
    		 * Resize the image file only if it is uploaded
    		 */
    		$get_resized_image_names = $this->Article->uploadImageResize($path,$create_month_folder,$upload_data,$this->_image_sizes);
    		$size = filesize($path);
    		$filename = pathinfo($get_resized_image_names['_large']);

    		$image_title="";
    		$image_title = $upload_data['client_name'];
    		$image_title = str_replace("_", " ", $image_title);
    		$image_title = pathinfo($image_title, PATHINFO_FILENAME);

    		/*
    		 * edit update image and remove the old image from the images folder
    		 */
    		$full_file_path = $create_month_folder_unlink.$files->image_large;
    		unlink($full_file_path);
    		$full_medium_file_path = $create_month_folder_unlink.$files->image_medium;
    		unlink($full_medium_file_path);
    		$full_thumb_file_path = $create_month_folder_unlink.$files->image_thumb;
    		unlink($full_thumb_file_path);
    		$full_mobile_file_path = $create_month_folder_unlink.$files->image_mobile;
    		unlink($full_mobile_file_path);

    		$data = array(
	    				'article_id'      => $article_id,
	         			'file_size'  	  => $size,
    					'yearmonth'		  => $date,
	    				'title'			  => $image_title,
	         			'filename'  	  => $filename['basename'],
                		'updated_date'    => $this->updatedtime,
		                'image_large'     => $get_resized_image_names['_large'],
	                    'image_medium'    => $get_resized_image_names['_medium'],
	                    'image_thumb'     => $get_resized_image_names['_thumb'],
	                    'image_mobile'    => $get_resized_image_names['_mobile'],
    		);

    	}else{
    		$data = array(
	    				'article_id'      => $article_id,
	         			'file_size'  	  => $size,
	    				'title'			  => $files->title,
	         			'filename'  	  => $files->filename,
                		'updated_date'    => $this->updatedtime,
    		);
    	}

    	/*
    	 * remove original upload file image
    	 */
    	$original_file = $create_month_folder.$upload_data['file_name'];
    	unlink($original_file);

    	$this->File->update($id, $data);
    	// set flash data
    	$this->session->set_flashdata('msg', 'File Image Updated Successfully');
    	redirect(base_url('Articlecheck/filelist/'.$article_id));

    }
    
	public function filedelete($id) {
        $header['title'] = 'Delete File';
        
       	$files= $this->File->get_by_id($id);
       	
       	if(empty($article_id)){
    		$article_id = $files->article_id;
    	}
    	$data['file_id'] = $id;
    	$data['files']=$files;
    	$data['article_id']=$article_id;
    	$articledetails = $this->Article->get_by_id($article_id);
    	
    	$folder_name = $articledetails->folder_name;
    	$category_id = $articledetails->category;
    	
    	$category_name = $this->Categories_model->get_by_id($category_id);
    	$category = strtolower($category_name->category);
        
    	$create_month_folder = './uploads/'.$category.'/'.$folder_name.'/';
    	$create_month_folder_preview = $create_month_folder.$files->image_medium;
    	$data['image_path'] = $create_month_folder_preview;
    	
        if($id>0 && $this->input->post('delete')=='true'){
        	/*
        	 * removing the old files before deleting
        	 */
        	$full_file_path = $create_month_folder.$files->image_large;
            unlink($full_file_path);
            $full_medium_file_path = $create_month_folder.$files->image_medium;
            unlink($full_medium_file_path);
            $full_thumb_file_path = $create_month_folder.$files->image_thumb;
            unlink($full_thumb_file_path);
            $full_mobile_file_path = $create_month_folder.$files->image_mobile;
            unlink($full_mobile_file_path);
        	
            $this->File->delete($id);
            $this->session->set_flashdata('msg', 'File Deleted Successfully');
            redirect(base_url('Articlecheck/filelist/'.$article_id));
        }
        $this->load->view('header.php',$header);
        $this->load->view('sidebar.php');
        $this->load->view('articlecheck/filedelete',$data);
        $this->load->view('footer.php');
    }
    
	function get_sub_category()
	 {
	  if($this->input->post('cat_id'))
	  {
	   echo $this->Subcategory_model->fetch_subcategory($this->input->post('cat_id'));
	  }
	 }
}