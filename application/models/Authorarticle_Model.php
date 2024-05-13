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
        // Specify the columns you want to select from both tables
        $this->db->select('articles.*, volume.vol_name, description');
        $this->db->from('articles');

        // Join the 'volume' table based on the relationship between 'articles.volume_id' and 'volume.id'
        $this->db->join('volume', 'volume.volumeid = articles.volumeid');

        if ($id !== FALSE) {
            // If an article ID is provided, fetch the specific article
            $this->db->where('articles.id', $id);
            $query = $this->db->get();
            return $query->row_array(); // Return single article
        } else {
            // If no specific article ID is provided, fetch all articles
            $query = $this->db->get();
            return $query->result_array(); // Return array of articles
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

