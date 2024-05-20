<?php

class Archieved_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_archived($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->where('status', 3);
            $query = $this->db->get('volume');
            return $query->result_array();
        }

        $this->db->where(array('id' => $id, 'status' => 3));
        $query = $this->db->get('volume');
        return $query->row_array();
    }

    public function get_articles_by_volume($volume_id)
    {
        $this->db->where('volumeid', $volume_id);
        $this->db->where('published', 1); 
        
        $query = $this->db->get('articles');
        return $query->result_array();
    }
    
}



