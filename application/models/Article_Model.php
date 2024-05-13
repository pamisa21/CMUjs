<?php
class Article_Model extends CI_Model
{
    public function __construct()
    {
        // Database library is loaded automatically
    }

    public function get_article()
    {
        // Perform inner join between articles, authors, and volume tables
        $this->db->select('articles.*, authors.author_name AS author_name, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('authors', 'articles.auid = authors.auid', 'inner');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid','volume.volumeid', 'inner');
        
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
    // Select authorid and author_name from the authors table
    $this->db->select('auid, author_name');
    
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
    $this->db->select('articles.*, authors.author_name AS author_name,volume.volumeid,volume.vol_name, users.complete_name');
    $this->db->from('articles');
    $this->db->join('authors', 'articles.auid = authors.auid', 'inner');
    $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
    $this->db->join('users', 'articles.userid = users.userid', 'left');
    $this->db->where('articles.articleid', $articleid);
    $query = $this->db->get();
    return $query->row_array(); 
}

public function editArticle($articleid, $data) {
    $this->db->where('articleid', $articleid);
    return $this->db->update('articles', $data);
}

public function assignarticle($articleid, $data) {
    $this->db->where('articleid', $articleid);
    return $this->db->update('articles', $data);
}


public function get_users()
{
    $this->db->select('userid, complete_name');
    $query = $this->db->get('users');
    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return array();
    }
}


}