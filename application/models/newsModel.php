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
        $data['name']= $this->input->post('title');
        $data['content']=$this->input->post('text');
        return $this->db->insert('news', $data);
    }

    public function add_comment($id)
    {
        $data['text']=$this->input->post('text');
        $data['news_id']=$id;
        $data['user_name']=$this->session->userdata['user_name'];
        //var_dump($id);die();
        return $this->db->insert('comments', $data);
    }
}