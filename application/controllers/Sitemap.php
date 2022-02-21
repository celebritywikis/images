<?php 

Class Sitemap extends CI_Controller {
	
    public function __construct() {
        parent::__construct();
        //error_reporting(0);
        $this->load->model('Article');
        $this->load->model('Categories_model');
        $this->load->helper('url');
        $this->load->model('File');
        $this->load->model('Subcategory_model');
    }
    
   public function index()
    {
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap/index",$data);
    }
    
    public function articleslist(){
    	header("Content-Type: text/xml;charset=iso-8859-1");

    	$results_per_page = 8;

    	$page_first_result = ($page-1) * $results_per_page;
    	$getAllCount = $this->Article->getArticlesCount();
    	 
    	$number_of_page = ceil ($getAllCount / $results_per_page);
    	$data['number_of_page']=$number_of_page;
    	$this->load->view("sitemap/articleslist",$data);
    }
    
	public function articles(){
    	header("Content-Type: text/xml;charset=iso-8859-1");

    	if (!isset ($_GET['page']) ) {  
	    $page = 1;  
		} else {  
		    $page = $_GET['page'];  
		} 
		$results_per_page = 8;
		
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
	    
    	$this->load->view("sitemap/articles",$data);
    }
    
    public function imageslist(){
    	
    	header("Content-Type: text/xml;charset=iso-8859-1");

    	$results_per_page = 50;

    	$page_first_result = ($page-1) * $results_per_page;
    	$getAllCount = $this->File->getFileCount();
    	 
    	$number_of_page = ceil ($getAllCount / $results_per_page);
    	$data['number_of_page']=$number_of_page;
    	$this->load->view("sitemap/imageslist",$data);
    }
    
public function images(){
    	header("Content-Type: text/xml;charset=iso-8859-1");
    	if (!isset ($_GET['page']) ) {  
	    $page = 1;  
		} else {  
		    $page = $_GET['page'];  
		} 
		$results_per_page = 50;
		
		$page_first_result = ($page-1) * $results_per_page;
		$limit = $results_per_page;
		$getAllCount = $this->File->getFileCount();
	    $files = $this->File->getFilesByArticleIdLimitPaginationForXML($page_first_result,$results_per_page);
	    
	    $data['file'] = $this->File;
	    $data['article'] = $this->Article;
	    $data['images']=$files;
    	 
    	$this->load->view("sitemap/images",$data);
    }
}

?>