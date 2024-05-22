<?php

class Authorarticle_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // It's good practice to call the parent constructor
    }

    public function get_article($id = FALSE)
    {
        $this->db->select('articles.*, volume.vol_name, description');
        $this->db->from('articles');
        $this->db->join('volume', 'volume.volumeid = articles.volumeid');
        $this->db->where('articles.published', 1);
        if ($id !== FALSE) {
            $this->db->where('articles.id', $id);
            $query = $this->db->get();
            return $query->row_array(); 
        } else {
   
            $query = $this->db->get();
            return $query->result_array(); 
        }
    }

    





    
    public function get_article_by_auid($auid = 1)
    {
        // Specify the columns you want to select from both tables
        $this->db->select('articles.*, volume.vol_name, description');
        $this->db->from('articles');
    
        // Join the 'volume' table based on the relationship between 'articles.volume_id' and 'volume.id'
        $this->db->join('volume', 'volume.volumeid = articles.volumeid');
    
        // Add a condition to filter articles by auid
        $this->db->where('articles.auid', $auid);
    
        // Execute the query and return the result
        $query = $this->db->get();
        return $query->result_array();
    }
    
}

