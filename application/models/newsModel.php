<?php


class NewsModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', array('id' => $id));
        return $query->row_array();
    }

    public function delete_news($id)
    {
        $this->db->delete('news', array('id' => $id));
    }

    public function create_news()
    {
        
    }
}