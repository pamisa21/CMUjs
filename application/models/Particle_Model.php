<?php

class Particle_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_particle($id = FALSE)
    {
        $this->db->select('articles.*, volume.vol_name, volume.status, authors.complete_name,authors.email, keywords');
        $this->db->from('articles');
        $this->db->join('volume', 'volume.volumeid = articles.volumeid');
        $this->db->join('authors', 'authors.auid = articles.auid'); 

        $this->db->where('volume.status', 3);
        $this->db->where('articles.published', 1);

        if ($id !== FALSE) {
            $this->db->where('articles.id', $id);
            $query = $this->db->get();
            return $query->row_array(); 
        } else {
            $query = $this->db->get();
            return $query->result_array(); 
        }
    }

    public function get_volumes()
    {
        $this->db->select('*');
        $this->db->from('volume');
        $this->db->where('status', 3);
        $query = $this->db->get();
        return $query->result_array();
    }
}




