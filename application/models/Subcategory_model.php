<?php

class Subcategory_model extends Base {
    protected $table = 'subcategory';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_related_celebrity($url_slug){
        $url_slug_bracket = '('."'".$url_slug."'".')';
        $this->db->where('subcategory.url_slug not in '.$url_slug_bracket  )
        ->select('*')
        ->from('subcategory')
        ->limit(10);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
    
	public function fetch_subcategory($id)
	 {
	  $this->db->where('category', $id);
	  $this->db->order_by('subcategory', 'ASC');
	  $query = $this->db->get('subcategory');
	  $output = '<option value="">Select Subcategory</option>';
	  foreach($query->result() as $row)
	  {
	   $output .= '<option value="'.$row->id.'">'.$row->subcategory.'</option>';
	  }
	  return $output;
	 }
	 
	 public function getMainSubCategorNames(){
	 	$this->db
        ->select('subcategory.*,categories.category as categoryname')
        ->from('subcategory')
        ->join('categories', 'subcategory.category = categories.id');
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        return $query->result();
	 }
	 
	public function getMainSubCategorNamesByCatid($id){
	 	$this->db
        ->select('subcategory.*,categories.category as categoryname')
        ->from('subcategory')
        ->join('categories', 'subcategory.category = categories.id')
        ->where('subcategory.category', $id);
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        return $query->result();
	 }
}