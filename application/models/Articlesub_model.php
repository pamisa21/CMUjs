<?php
class Articlesub_model extends CI_Model
{
    public function __construct()
    {
        // Database library is loaded automatically
    }

    public function get_articlesub($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('article_submission');
            return $query->result_array();
        }

        $query = $this->db->get_where('article_submission', array('id' => $id));
        return $query->row_array();
    }
}
