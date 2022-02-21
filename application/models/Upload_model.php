<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload Model: CodeIgniter Upload image with MySQL
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload_model extends CI_Model {

    private $_ID;
    private $_url;

    public function setID($ID) {
        $this->_ID = $ID;
    }

    public function setURL($url) {
        $this->_url = $url;
    }
    // get image
    public function getPicture() {        
        $this->db->select(array('p.id', 'p.url'));
        $this->db->from('picture p');  
        $this->db->where('p.id', $this->_ID);     
        $query = $this->db->get();
       return $query->row_array();
    }
    // insert image
    public function create() { 
        $data = array(
            'url' => $this->_url,
        );
        $this->db->insert('picture', $data);
        return $this->db->insert_id();
    }
}
?>