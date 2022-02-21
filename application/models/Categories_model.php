<?php

class Categories_model extends Base {
    protected $table = 'categories';
    
    public function __construct() {
        parent::__construct();
    }
    
	public function get_by_cate_id($id) {
        return $this->db->get_where($this->table, array('id' => $id))
                        ->row();
    }
}