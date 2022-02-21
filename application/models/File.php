<?php

class File extends Base {
    protected $table = 'file';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getFilesByArticleId($id){
    	 return $this->db->get_where($this->table, array('article_id' => $id))
         ->result();
    }
    
    public function getFilesByArticleIdLimit($id,$limit){
    	$this->db->select("file.*");
    	$this->db->from('file');
    	$this->db->where("file.article_id = $id");
    	$this->db->order_by('file.id desc');
    	if($limit>0)
    	$this->db->limit($limit);
    	$query = $this->db->get();
    	
     	if(!empty($query) && is_object($query) && $query->num_rows()>0){
            return $query->result();
        }
    }
    
public function getFilesByArticleIdLimitPagination($id,$start,$limit){
    	
    	//echo "lmit ".$limit;exit;
    	$this->db->select("file.*");
    	$this->db->from('file');
    	$this->db->where("file.article_id = $id");
    	$this->db->order_by('file.id desc');
        $this->db->limit($limit,$start);
    	$query = $this->db->get();
    	//echo $this->db->last_query();exit;
     	if(!empty($query) && is_object($query) && $query->num_rows()>0){
            return $query->result();
        }
    }
    
public function getFilesByArticleIdLimitPaginationForXML($start,$limit){
    	
    	//echo "lmit ".$limit;exit;
    	$this->db->select("file.*");
    	$this->db->from('file');
    	$this->db->order_by('file.id desc');
        $this->db->limit($limit,$start);
    	$query = $this->db->get();
    	//echo $this->db->last_query();exit;
     	if(!empty($query) && is_object($query) && $query->num_rows()>0){
            return $query->result();
        }
    }
    
    public function getFileCountByArticleId($articleid){
    	$this->db->select("file.*");
    	$this->db->from('file');
    	if($articleid>0)
    	$this->db->where("file.article_id = $articleid");
    	$query = $this->db->get();
    	
     	if(!empty($query) && is_object($query) && $query->num_rows()>0){
            return $query->num_rows();
        }
    }
    
public function getFileCount(){
    	$this->db->select("file.*");
    	$this->db->from('file');
    	$query = $this->db->get();
     	if(!empty($query) && is_object($query) && $query->num_rows()>0){
            return $query->num_rows();
        }
    }
    
	public function getFilesByFolderId($id){
        $query = $this->db->select('yearmonth')
        ->where(array('article_id' => $id))
        ->group_by('yearmonth')
        ->get($this->table)
        ->result();
        return $query;
    }
    
	public function deleteDir($dirPath) {
    	if (empty($dirPath)) {
    		return false;
    	}
    	if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
    		$dirPath .= '/';
    	}
    	if (is_file($dirPath)) {
    		return unlink($dirPath);
    	}
    	elseif (is_dir($dirPath)) {
    		$scan = glob(rtrim($dirPath,'/').'/*');
    		foreach($scan as $index=>$path) {
    			$this->deleteDir($path);
    		}
    		return @rmdir($dirPath);
    	}
    }
    
 public function date_decode($str_server_datetime,
                                        $str_user_timezone,
                                        $str_user_dateformat) {
 
        // create date object
        try {
                $date = new DateTime($str_server_datetime);
        } catch(Exception $e) {
                trigger_error('date_decode: Invalid datetime: ' . $e->getMessage(), E_USER_ERROR);
        }
 
        // convert to user timezone
        $userTimeZone = new DateTimeZone($str_user_timezone);
        $date->setTimeZone($userTimeZone);
 
        // convert to user dateformat
        $str_user_datetime = $date->format($str_user_dateformat);
 
        return $str_user_datetime;
}

	public function getNextPreviousFileId($article_id,$id)
	{
		$next_file_id=0;
		$previous_file_id=0;
		$file_ids=array();
		$files_array= $this->getFilesByArticleId($article_id);
		foreach ($files_array as $index=>$single_file){
			if($single_file->id==$id){
				if(isset($files_array[$index+1])){
					$next_file_id = $files_array[$index+1]->id;
				}
				if(isset($files_array[$index-1])){
					$previous_file_id = $files_array[$index-1]->id;
				}
				$file_ids =array(
				"next_photo_id"=>($next_file_id>0?$next_file_id:0),
				"previous_photo_id"=>($previous_file_id>0?$previous_file_id:0),
				);
			}
		}
		return $file_ids;
	}
}