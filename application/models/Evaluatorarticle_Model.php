<?php

class Evaluatorarticle_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function get_article($id = FALSE)
    {
        $this->db->select('articles.*, volume.vol_name, description');
        $this->db->from('articles');
        $this->db->join('volume', 'volume.volumeid = articles.volumeid');
        $this->db->join('article_assigned', 'article_assigned.userid = evaluator.userid');
        if ($id !== FALSE) {
            $this->db->where('articles.id', $id);
            $query = $this->db->get();
            return $query->row_array(); 
        } else {
            $query = $this->db->get();
            return $query->result_array(); 
        }
    }

    



    public function get_article_by_userid($userid = 1)
    {
        // Specify the columns you want to select from the joined tables, including article_assigned.userid
        $this->db->select('articles.*, volume.vol_name, volume.description, article_assigned.userid, evaluator.complete_name');
        $this->db->from('article_assigned');
        
        // Join the articles table
        $this->db->join('articles', 'article_assigned.articleid = articles.articleid');
        
        // Join the volume table
        $this->db->join('volume', 'articles.volumeid = volume.volumeid');
        
        // Join the evaluator table
        $this->db->join('evaluator', 'article_assigned.userid = evaluator.userid');
        
        // Add a condition to filter articles by userid
        $this->db->where('article_assigned.userid', $userid);
        
        // Execute the query and return the result
        $query = $this->db->get();
        return $query->result_array();
    }
}

