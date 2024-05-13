<?php
class Volume_Model extends CI_Model
{
    public function __construct()
    {
        // Database library is loaded automatically
    }

    public function get_volumes($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('volume');
            return $query->result_array();
        }

        $query = $this->db->get_where('volume', array('id' => $id));
        return $query->row_array();
    }public function delete_volume($volumeid) {
        $this->db->where('volumeid', $volumeid);
        $this->db->delete('volume');
    
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_volume_by_id($volumeid) {
        $this->db->select(' ');
        $this->db->from('volume');
        $this->db->where('volume.volumeid', $volumeid);
        $query = $this->db->get();
        return $query->row_array(); // Assuming you only expect one row
    }

    public function editVolume($volumeid, $data) {
        $this->db->where('volumeid', $volumeid);
        return $this->db->update('volume', $data);
    }
}