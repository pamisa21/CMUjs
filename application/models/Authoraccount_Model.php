<?php
class Authoraccount_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database(); // Load the database library
    }

    public function get_author_by_id($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('authors');
            return $query->result_array();
        }
        $query = $this->db->get_where('authors', array('auid' => 1));
        return $query->row_array();
    }
}



