<?php
class Author_Model extends CI_Model
{
    public function __construct()
    {
        
        $this->load->database(); // Load the database library
    }

    public function get_authors($id= FALSE)
    {
    if ($id === FALSE) {

        $query = $this->db->get('authors');
        return $query->result_array();
    }
      $query = $this -> db -> get_where('authors', array('id'=> $id));
      return $query->row_array();
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
    $this->db->select('authors.auid, authors.author_name, authors.email, authors.profile_pic, authors.contact_num, authors.title,authors.sex');
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