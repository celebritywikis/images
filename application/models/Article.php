<?php

class Article extends Base {
    protected $table = 'article';
    
    
    public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
    }
    
    public function get_where_by_limit($start,$limit){
        $this->db->select('article.*,categories.category as category, subcategory.subcategory as subcategory, categories.id as cat_id')
        ->from('article')
        ->join('categories', 'article.category = categories.id')
        ->join('subcategory', 'article.subcategory = subcategory.id')
        ->order_by('article.id desc')
        ->limit($limit,$start);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
    
    public function get_cate_wise_articles($categories){
        foreach($categories as $single_category){
            $get_articles_data_by_cate = $this->Article->get_where_by_limit($single_category->id);
            if(count($get_articles_data_by_cate)>0){
                $get_all_results[$single_category->category] = $get_articles_data_by_cate;
            }
        }
        return $get_all_results;
    }
    
      
	public function set_upload_options($create_month_folder,$image_file_name)
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path']   = $create_month_folder;
	    $config['allowed_types'] = 'gif|jpg|jpeg|png';
	    $config['file_name'] 	 = $image_file_name;
	
	    return $config;
	}
public function getArticlesCount(){
    	$this->db->select("article.*");
    	$this->db->from('article');
    	$query = $this->db->get();
    	
     	if(!empty($query) && is_object($query) && $query->num_rows()>0){
            return $query->num_rows();
        }
    }
	
public function getAllArticleByCatNames(){
	 	$this->db
        ->select('article.*,categories.category as categoryname,subcategory.subcategory as subcategoryname')
        ->from('article')
        ->join('categories', 'article.category = categories.id')
        ->join('subcategory', 'article.subcategory = subcategory.id');
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        return $query->result();
	 }
	 
public function getArticleByFolderName($folder_name){
	 	$this->db->select('article.*,categories.category as categoryname,subcategory.subcategory as subcategoryname');
        $this->db->from('article');
        if($folder_name){
        $this->db->where('article.folder_name',$folder_name);
        }
        $this->db->join('categories', 'article.category = categories.id');
        $this->db->join('subcategory', 'article.subcategory = subcategory.id');
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
	 }
	 
	public function getRelatedByCatId($id,$limit,$article_id){
		
		$article_id = "(".$article_id.")";
	 	$this->db->select('article.*,categories.category as categoryname,subcategory.subcategory as subcategoryname, categories.id as cat_id');
        $this->db->from('article');
        if($id){
        $this->db->where('article.category',$id);
        }
        if(strlen($article_id)){
        	$this->db->where('article.id not in '.$article_id);
        }
        $this->db->join('categories', 'article.category = categories.id');
        $this->db->join('subcategory', 'article.subcategory = subcategory.id');
        $this->db->order_by('article.id desc');
        if($limit>0)
        $this->db->limit($limit);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
	 }
	public function getCleanUrl($title)
	{
		// remove all non alphanumeric characters except spaces
	    $clean =  preg_replace('/[^a-zA-Z0-9\s]/', '', strtolower($title)); 
	
	    // replace one or multiple spaces into single dash (-)
	    $clean =  preg_replace('!\s+!', '-', $clean); 
	
	    return $clean;
	}
	
	public function urlEncodeId($id)
	{
		$urlencode = base64_encode($id);
		return $urlencode;
	}
	public function urldecodeId($id)
	{
		$urldecode = base64_decode($id);
		return $urldecode;
	}
	
	public function getIndianTime(){
		date_default_timezone_set('Asia/Kolkata');
		return  date('Y-m-d H:i:s');
	}
	
}