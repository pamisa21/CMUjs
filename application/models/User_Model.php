<?php
class User_Model extends CI_Model
{
    public function __construct()
    {
        
        $this->load->database(); // Load the database library
    }

    public function get_users($id= FALSE)
    {
    if ($id === FALSE) {

        $query = $this->db->get('users');
        return $query->result_array();
    }
      $query = $this -> db -> get_where('users', array('id'=> $id));
      return $query->row_array();
    }

    // public function insertUsers($data)
    // {
    //     return $this->db->insert('users', $data);
    // }
    
        
    public function delete_user($userid) {
        $this->db->where('userid', $userid);
        $this->db->delete('users');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_user_by_id($userid) {
        $this->db->select('users.userid, users.complete_name, users.email, users.profile_pic, users.status, users.date_created,users.sex');
        $this->db->from('users');
        // $this->db->join('authors', 'authors.auid = users.auid', 'left');
        $this->db->where('users.userid', $userid);
        $query = $this->db->get();
        return $query->row_array(); // Assuming you only expect one row
    }
    
    public function editUser($userid, $data) {
        $this->db->where('userid', $userid);
        return $this->db->update('users', $data);
    }


}








// class UsersModel extends CI_Model
// {
//     public function __construct()
//     {
//         parent::__construct();
//         $this->load->database(); // Load the database library
//     }

//     public function getUsers()
//     {
//         $query = $this->db->get('users');
//         return $query->result();
//     }

//     public function insertUsers($data)
//     {
//         return $this->db->insert('users', $data);
//     }
// }