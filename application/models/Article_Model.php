<?php
class Article_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_article()
    {
        // Perform inner join between articles, authors, and volume tables
        $this->db->select('articles.*, authors.complete_name AS complete_name, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('authors', 'articles.auid = authors.auid', 'inner');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'inner');
        
        // Order by volume_id in ascending order
        $this->db->order_by('articles.volumeid', 'ASC');
    
        // Execute the query
        $query = $this->db->get();
    
        // Check if there are results
        if ($query->num_rows() > 0) {
            // Return the result as an array of objects
            return $query->result_array();
        } else {
            // No results found, return empty array
            return array();
        }
    }

    public function get_volumes()
    {
        $this->db->select('volumeid, vol_name');
        $query = $this->db->get('volume');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function get_authors()
    {
        // Select authorid and complete_name from the authors table
        $this->db->select('auid, complete_name');
        
        // Get all rows from the authors table
        $query = $this->db->get('authors');
        
        // Check if there are any results
        if ($query->num_rows() > 0) {
            // Return the results as an array of rows
            return $query->result_array();
        } else {
            // Return an empty array if no results found
            return array();
        }
    }

    public function deletearticle($articleid) {
        $this->db->where('articleid', $articleid);
        $this->db->delete('articles');
    
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_article_by_id($articleid) {
        $this->db->select('articles.*, authors.complete_name AS complete_name, volume.volumeid, volume.vol_name, evaluator.complete_name');
        $this->db->from('articles');
        $this->db->join('authors', 'articles.auid = authors.auid', 'inner');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
        $this->db->join('evaluator', 'articles.userid = evaluator.userid', 'left');
        $this->db->where('articles.articleid', $articleid);
        $query = $this->db->get();
        return $query->row_array(); 
    }

    public function editArticle($articleid, $data) {
        $this->db->where('articleid', $articleid);
        return $this->db->update('articles', $data);
    }

    public function assign_articles($articleid, $userids) {
        // Delete existing assignments for the article
        $this->db->where('articleid', $articleid);
        $this->db->delete('article_assigned');
        
        // Insert new assignments
        $data = [];
        foreach ($userids as $userid) {
            $data[] = [
                'articleid' => $articleid,
                'userid' => $userid
            ];
        }
        return $this->db->insert_batch('article_assigned', $data);
    }

    public function get_users()
    {
        $this->db->select('userid, complete_name');
        $query = $this->db->get('evaluator');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function get_article_by_userid($userid = 1)
    {
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
