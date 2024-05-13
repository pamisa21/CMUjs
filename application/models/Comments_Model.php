<?php
class Comments_Model extends CI_Model
{
    public function __construct()
    {
        
        $this->load->database(); // Load the database library
    }

    public function get_comments($id= FALSE)
    {
    if ($id === FALSE) {

        $query = $this->db->get('comments');
        return $query->result_array();
    }
      $query = $this -> db -> get_where('comments', array('id'=> $id));
      return $query->row_array();
    }

    // public function insertUsers($data)
    // {
    //     return $this->db->insert('users', $data);
    // }
}
