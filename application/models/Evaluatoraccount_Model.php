<?php
class Evaluatoraccount_Model extends CI_Model
{
    public function __construct()
    {
        $this->load->database(); // Load the database library
    }

    public function get_users_by_id($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('users');
            return $query->result_array();
        }
        $query = $this->db->get_where('users', array('userid' => 1));
        return $query->row_array();
    }
}



