<?php


    class Particle_Model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }
    
        public function get_particle($id = FALSE)
        {
            $this->db->select('articles.*, volume.vol_name, volume.status, authors.complete_name,authors.email, keywords,authors.profile_pic');
            $this->db->from('articles');
            $this->db->join('volume', 'volume.volumeid = articles.volumeid');
            $this->db->join('authors', 'authors.auid = articles.auid', 'left'); 
            $this->db->order_by('vol_name', 'ASC');
            $this->db->where('volume.status', 1);
            $this->db->where('articles.published', 1);
    
            if ($id !== FALSE) {
                $this->db->where('articles.id', $id);
                $query = $this->db->get();
                return $query->row_array(); 
            } else {
                $query = $this->db->get();
                $result = $query->result_array();
                
                // Check if authors are found
                foreach ($result as &$row) {
                    if (empty($row['complete_name'])) {
                    
                        $row['complete_name'] = 'Uknown Authors';
                    }
                }
                
                return $result; 
            }
        }
    
        public function get_volumes()
        {
            $this->db->select('*');
            $this->db->from('volume');
            $this->db->where('status', 1);
            $query = $this->db->get();
            return $query->result_array();
        }


        public function viewpublicarticle($articleid) {
            $this->db->select('articles.*, COALESCE(authors.complete_name, "unknown") AS complete_name, volume.volumeid,authors.profile_pic,authors.email, volume.vol_name,evaluator.complete_name');
            $this->db->from('articles');
            $this->db->join('authors', 'articles.auid = authors.auid', 'left');
            $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');
            $this->db->join('evaluator', 'articles.userid = evaluator.userid', 'left');
            $this->db->where('articles.articleid', $articleid);
            $query = $this->db->get();
            return $query->row_array(); 
        }
        

        public function viewpublicvolume($volumeid) {
            $this->db->select('*');
            $this->db->from('volume');
            $this->db->where('status', 3);
            $this->db->where('volumeid', $volumeid); // Filtering by volumeid
            $query = $this->db->get();
        
            return $query->row_array();
        }

        public function get_articles_by_volume($volumeid) {
            $this->db->select('articles.*, authors.complete_name');
            $this->db->from('articles');
            $this->db->join('authors', 'articles.auid = authors.auid', 'left');
            $this->db->where('articles.volumeid', $volumeid);
            $this->db->where('articles.published', 1);
            $query = $this->db->get();
            return $query->result_array();
        }
        
    }        
    
    



