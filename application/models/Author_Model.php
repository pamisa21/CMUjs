<?php
class Author_Model extends CI_Model
{
    public function __construct()
    {
        
        $this->load->database(); // Load the database library
    }

    public function get_authors($id = FALSE)
    {
        // Load the database library if not already loaded
        $this->load->database();
    
        if ($id === FALSE) {
            // Get all authors and sort them alphabetically by full_name
            $this->db->order_by('complete_name', 'ASC');  // Ensure to replace 'full_name' with the actual column name
            $query = $this->db->get('authors');
            return $query->result_array();
        } else {
            // Fetch the author by id
            $this->db->where('id', $id);
            $query = $this->db->get('authors');
            return $query->row_array();
        }
    }
    
    // public function insertUsers($data)
    // {
    //     return $this->db->insert('authors', $data);
    // }



public function deleteauthor($auid) {
    $this->db->where('auid', $auid);
    $this->db->delete('authors');

    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
}
public function get_author_by_id($auid) {
    $this->db->select('authors.auid, authors.complete_name, authors.email, authors.profile_pic, authors.contact_num, authors.title,authors.sex,authors.description,authors.address,authors.status');
    $this->db->from('authors');
    // $this->db->join('authors', 'authors.auid = authors.auid', 'left');
    $this->db->where('authors.auid', $auid);
    $query = $this->db->get();
    return $query->row_array(); // Assuming you only expect one row
}
public function editAuthor($auid, $data) {
    $this->db->where('auid', $auid);
    return $this->db->update('authors', $data);
}


}