<?php

class Comments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('newsModel1');
        $this->load->model('commentsModel');
        $this->load->helper('url');
    }

    public function addComment()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('text', 'text', 'trim|required|xss_clean');

        if ($this->form_validation->run() === FALSE)
        {
            redirect('');

        }
        else
        {

            $comData['text']=$this->input->post('text');
            $comData['news_id']=$this->input->post('id');
            $comData['user_id']=$this->session->userdata['user_id'];
            $comData['user_name']=$this->session->userdata['user_name'];
            $this->commentsModel->add_comment($comData);
            $data['title']='Success message';
            $data['content']=$this->load->view('pages/news/success',[],true);
            $this->load->view('pages/template',$data);
        }
    }

    public function delete($id)
    {
        $data['title']= 'Success message';

        $this->commentsModel->delete_comment($id);
        $data['content']=$this->load->view('pages/news/success',[],true);
        $this->load->view('pages/template',$data);
    }

}