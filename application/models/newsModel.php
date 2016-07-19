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

    public function add_comment()
    {
        $data['text']=$this->input->post('text');
        $data['news_id']=$this->input->post('id');
        $data['user_name']=$this->session->userdata['user_name'];
        //var_dump($this->input->post('id'));die();
        return $this->db->insert('comments', $data);
    }

    public function  get_comments($id)
    {
        $query=$this->db->get_where('comments',array('news_id'=>$id));
        return $query->result_array();
    }
}