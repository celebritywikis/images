<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public $cache_time;
    function __construct() {
        parent::__construct();
        // Load url helper
        error_reporting(0);
        $this->load->helper('url');
        $this->load->model('File');
        $this->load->model('Article');
        $this->load->model('Categories_model');
        $this->load->model('Subcategory_model');
        $this->cache_time= 3600;
    }
    
	public function index()
	{
		/*
		 * Pagination Code
		 */
		$header['title'] = 'Latest HD Photos, 1080p images, HD wallpapers for mobiles';
		 
		if (!isset ($_GET['page']) ) {  
	    $page = 1;  
		} else {  
		    $page = $_GET['page'];  
		} 
		$results_per_page = 12;
		
		$page_first_result = ($page-1) * $results_per_page;
		$limit = $results_per_page;
		$getAllCount = $this->Article->getArticlesCount();
	   
	    
	    $articles = $this->Article->get_where_by_limit($page_first_result,$results_per_page);
	    
		$number_of_page = ceil ($getAllCount / $results_per_page);
		if($page<$number_of_page)
		{
			$page++;
		}
		
		$data['page']=$page;
		$data['limit']=$results_per_page;
		$data['start']=$page_first_result;
		$data['number_of_page']=$number_of_page;
	    
	    $data['articles'] = $articles;
	    $data['category'] = $this->Categories_model;
	    $data['file'] = $this->File;
	    $data['article'] = $this->Article;
	    
	    $this->load->view('front/frontheader.php',$header);
	    $this->load->view('front/index',$data);
		$this->load->view('front/frontfooter.php');
	}
	
	public function contactus(){
	    
	    $header['title'] = 'Contact Us';
	    $msg='';
	    $data=array();
	    if($this->input->post('contactcheck')=='true'){
	        $msg = $this->Article->sendEmail($this->input->post());
	        if(strlen($msg)){
	            $data['msg']=$msg;
	        }
	    }
	    
	    
	    $this->load->view('front/frontheader.php',$header);
	    $this->load->view('front/contactus.php',$data);
		$this->load->view('front/frontfooter.php');
	}
	public function aboutus(){
	    
	    $this->load->view('front/frontheader.php',$header);
	    $this->load->view('front/aboutus.php');
		$this->load->view('front/frontfooter.php');
	   
	}
	public function policy(){

	    $this->load->view('front/frontheader.php',$header);
	    $this->load->view('front/policy.php');
		$this->load->view('front/frontfooter.php');
	    
	}
	public function disclaimer(){
	    $this->load->view('front/frontheader.php',$header);
	    $this->load->view('front/disclaimer.php');
	    $this->load->view('front/frontfooter.php');
	}
	
	public function celebrities($folder_name,$clean_url){
		/*
		 * Pagination Code
		 */
		
		if (!isset ($_GET['page']) ) {  
	    $page = 1;  
		} else {  
		    $page = $_GET['page'];  
		} 
		$results_per_page = 12;
		
		$page_first_result = ($page-1) * $results_per_page;
		$limit = $results_per_page;
		$getArticleDetails = $this->Article->getArticleByFolderName($folder_name);
		
		$data['title'] = $getArticleDetails[0]->title;
		$data['meta_keywords'] = strip_tags($getArticleDetails[0]->meta_keywords);
		$content_striptags = strip_tags($getArticleDetails[0]->meta_desc);
		$meta_tags = strip_tags($getArticleDetails[0]->meta_tags);
		$pos=strpos($content_striptags, ' ', 160);
		$content = substr($content,0,$pos ); 
		if(empty($content)){
			$content = $content_striptags;
		}
		$data['meta_description'] = $content;
		$title=$getArticleDetails[0]->title;;
		$page_title = $this->Article->getCleanUrl($title);
		$data['category'] = $this->Categories_model;
		$data['articledetails'] = $getArticleDetails;
		$data['file'] = $this->File;
		$article_id = $getArticleDetails[0]->id;
		
		$cat_id = $getArticleDetails[0]->category;
		$sub_cat_id = $getArticleDetails[0]->subcategory;
		$getAllCount = $this->File->getFileCountByArticleId($article_id);
		
		$sub_cat_details = $this->Subcategory_model->get_by_id($sub_cat_id);
		$data['sub_cat_details']=$sub_cat_details;
		
		$number_of_page = ceil ($getAllCount / $results_per_page);
		
		if($page<$number_of_page)
		{
			$page++;
		}
		
		//echo "number of page ".$number_of_page;
		//echo "page first result ".$limit;
		$data['count']=$getAllCount;
		$data['article'] = $this->Article;
		
		$getRelatedArticles = $this->Article->getRelatedByCatId($cat_id,3,$article_id);
		$data['getrelatedarticles']=$getRelatedArticles;
		
		$data['page']=$page;
		$data['limit']=$results_per_page;
		$data['start']=$page_first_result;
		$data['folder_name_page']=$folder_name;
		$data['number_of_page']=$number_of_page;
		$data['page_title']=$page_title;
		
		$data['url']=base_url('celebrities/').$folder_name.'/'.$page_title;
		$data['meta_tags']= $meta_tags ;
		
		$this->load->view('front/frontheader.php',$data);
	    $this->load->view('front/celebrities.php',$data);
	    $this->load->view('front/frontfooter.php');
	}
	
public function photos($folder_name,$filename,$id){
		$article_id='';
		
		$encode_id = $id;
		$id = $this->Article->urldecodeId($id);
		$files = $this->File->get_by_id($id);
		$article_id = $files->article_id;
		
		$getArticle = $this->Article->get_by_id($article_id);
		
		$getFolderName = $getArticle->folder_name;
		$getArticleDetails = $this->Article->getArticleByFolderName($getFolderName);
		$data['title'] = $getArticleDetails[0]->title;
		$data['meta_keywords'] = strip_tags($getArticleDetails[0]->meta_keywords);
		$content = strip_tags($getArticleDetails[0]->meta_desc);
		$meta_tags = strip_tags($getArticleDetails[0]->meta_tags);
		$pos=strpos($content, ' ', 160);
		$content = substr($content,0,$pos ); 
		$data['meta_description'] = $content;
		$title=$getArticleDetails[0]->title;;
		$page_title = $this->Article->getCleanUrl($title);
		
		$title_head = $getArticle->title;
		$data['heading'] = $this->Article->getCleanUrl($title_head);

		if($folder_name!=$getFolderName){
		redirect(base_url('celebrities/'.$folder_name));
		}
	
		$data['category'] = $this->Categories_model;
		$data['articledetailsphotos'] = $getArticleDetails;
		$category_id = $getArticleDetails[0]->category;
		
		$category_name = $this->Categories_model->get_by_id($category_id);
    	$category = strtolower($category_name->category);

    	$create_month_folder = './uploads/'.$category.'/'.$folder_name.'/';
    	
    	$sub_cat_id = $getArticleDetails[0]->subcategory;
		$sub_cat_details = $this->Subcategory_model->get_by_id($sub_cat_id);
		$data['sub_cat_details']=$sub_cat_details;
    	
    	$data['id'] = $id;
		$data['file'] = $this->File;
		$data['article'] = $this->Article;
		$article_id = $getArticleDetails[0]->id;
		$getAllCount = $this->File->getFileCountByArticleId($article_id);
		
		$get_privious_next_file_id = $this->File->getNextPreviousFileId($article_id,$id);
		
		$data['next_photo_id']=$get_privious_next_file_id['next_photo_id'];
		$data['previous_photo_id']=$get_privious_next_file_id['previous_photo_id'];
		
		$data['count']=$getAllCount;
		$data['folder_name']=$folder_name;
		$data['folder_name_page']=$folder_name;
		$data['create_month_folder']=$create_month_folder;
		$data['page_title']=$page_title;
		
		$file_title = $this->Article->getCleanUrl($files->title);
		
		$getRelatedArticles = $this->Article->getRelatedByCatId($category_id,4,$article_id);
		$data['getrelatedarticles']=$getRelatedArticles;
		$data['article_id']=$article_id;
		$data['files']=$files;
		$data['url']=base_url().$folder_name.'/'.$file_title.'/'.$encode_id;
		$data['meta_tags']=$meta_tags;
		$this->load->view('front/frontheader.php',$data);
	    $this->load->view('front/photos.php',$data);
	    $this->load->view('front/frontfooter.php');
	}
}