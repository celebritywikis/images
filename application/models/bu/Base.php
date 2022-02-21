<?php

class Base extends CI_Model {

    protected $table = '';

    public function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
    }

    public function get_all() {
        return $this->db->get($this->table)
                        ->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, array('id' => $id))
                        ->row();
    }

    public function get_where($where) {
        return $this->db->where($where)
                        ->get($this->table)
                        ->result();
    }
    public function getResultByCommaSeparated($category){
        return $this->db->select('*')
        ->where('find_in_set("'.$category.'", category) <> 0')
        ->get($this->table)
        ->result();
        
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
    
    public function languages(){
        $select=array('English'=>'English','Hindi'=>'Hindi','Telugu'=>'Telugu','Tamil','Marathi'=>'Marathi');
        return $select;
        
    }
    
    public function selectyesno(){
        $select=array('Yes'=>'Yes','No'=>'No');
        return $select;
        
    }
    
    public function users_select(){
        $select=array('User'=>'User','Administrator'=>'Administrator');
        return $select;
        
    }
    
    public function getIndianTime(){
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d H:i:s');
        return $currentTime;
        
    }
    
    public function getRandomNumber(){
        $random_number = mt_rand(1000000,10000000);
        return $random_number;
    }
    
    Public function uploadImageResize($path,$image_path,$upload_data,$image_sizes){
        
        $getRandomNumber = $this->getRandomNumber();
        $pathinfo = pathinfo($upload_data['file_name']);
        
        $original_path_size = base_url($path);
        list($width, $height, $type, $attr) = getimagesize($original_path_size); 
        
        $pathinfo['filename'] = str_replace(' ', '_', $pathinfo['filename']);
        
        foreach ($image_sizes as $key=>$resizes){
            
            $sub_folders = $image_path.$key;
            if (!is_dir($sub_folders)) {
                mkdir($sub_folders, 0777, TRUE);
            }
            
            if(preg_match('/large/',$key)){
            	if(strlen($width)){
            		$resizes[0]=$width;
            	}
            	if(strlen($height)){
            		$resizes[1]=$height;
            	}
            }
            
            $new_filename[$key] = date('Y-m').'/'.$key."/".$pathinfo['filename'].'_'.$getRandomNumber.".".$pathinfo['extension'];
            $configrez2['image_library'] = 'gd2';
            $configrez2['source_image'] = $path;
            $configrez2['create_thumb'] = FALSE;
            $configrez2['maintain_ratio'] = FALSE;
            $configrez2['quality'] = '60%';
            $configrez2['new_image'] = $image_path.$key."/".$pathinfo['filename'].'_'.$getRandomNumber.".".$pathinfo['extension'];
            $configrez2['width'] = $resizes[0];
            $configrez2['height'] = $resizes[1];
            $this->image_lib->initialize($configrez2);
            $this->image_lib->resize();
            
            $new_image_path_for_watermark = $image_path.$key."/".$pathinfo['filename'].'_'.$getRandomNumber.".".$pathinfo['extension'];
            
            /*
             * Water Mark Code
             */
            $imgConfig = array();
            $imgConfig['image_library']   = 'GD2';
            $imgConfig['source_image']    = $new_image_path_for_watermark;
            $imgConfig['wm_type']         = 'text';
            if(preg_match('/mobile/',$new_image_path_for_watermark)){
            $imgConfig['wm_text']         = '108images.com';
            $imgConfig['wm_font_size']    = '2';
            $imgConfig['wm_font_color']    = '#808080';
            }else{
            $imgConfig['wm_text']         = '108images.com';
            $imgConfig['wm_font_size']    = '8';
            $imgConfig['wm_font_color']    = '#808080';
            $imgConfig['wm_hor_alignment'] = 'right';
            $imgConfig['wm_opacity']       = 60;
            }
            $this->image_lib->initialize($imgConfig);
            $this->image_lib->watermark();
        }
        return $new_filename;
    }
    
    /*
     * This function generated unique title from the specified Table name and column
     */
    public function generate_url_slug($string,$table,$field='url_slug',$key=NULL,$value=NULL){
        $t =& get_instance();
        $slug = url_title($string);
        $slug = strtolower($slug);
        $i = 0;
        $params = array ();
        $params[$field] = $slug;
        
        if($key)$params["$key !="] = $value;
        
        while ($t->db->where($params)->get($table)->num_rows())
        {
            if (!preg_match ('/-{1}[0-9]+$/', $slug ))
                $slug .= '-' . ++$i;
                else
                $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
                    
            $params [$field] = $slug;
        }
        return $slug;
    }
    
    public function getWaterMark($path){
        $configwm ['wm_text']        = '108images.com';
        $configwm['source_image']    = $path;
        $configwm['wm_type']         = 'text';
        $configwm['wm_font_size']    = '8';
        $this->image_lib->initialize($configwm);
        $this->image_lib->watermark();
    }
    
}