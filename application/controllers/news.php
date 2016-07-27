<?php

class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('newsModel');
        $this->load->model('commentsModel');
        $this->load->helper('url');
    }

    public function view($id)
    {
        $cont_arr=array(
        'comments'=>$this->commentsModel->get_comments($id),
        'news_item'=>$this->newsModel->get_news($id));
        //var_dump($cont_arr['comments']);die();
        $data['content']= $this->load->view('pages/news/view',['cont_arr'=>$cont_arr],true);
        
        if (empty($this->newsModel->get_news($id)))
        {
            show_404();
        }

        $this->load->view('pages/template', $data);
    }

    public function index()
    {
        $data['news']=$this->newsModel->get_news();
        $data['title'] = 'News archive';
        $data['content'] = $this->load->view( 'pages/news/index',['news'=>$this->newsModel->get_news()],true);
        $this->load->view('pages/template', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';
        $data['content']= $this->load->view('pages/news/create',[],true);

        $this->form_validation->set_rules('title', 'title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('text', 'text', 'trim|required|xss_clean');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('pages/template', $data);

        }
        else
        {
            $newsData['name']= $this->input->post('title');
            $newsData['content']=$this->input->post('text');
            $newsData['user_id']=$this->session->userdata['user_id'];
            $this->newsModel->create_news($newsData);
            $data['title']='Success message';
            $data['content']=$this->load->view('pages/news/success',[],true);
            $this->load->view('pages/template',$data);
        }
    }

    public function delete($id)
    {
        $data['title']= 'Success message';

        $this->newsModel->delete_news($id);
        $data['content']=$this->load->view('pages/news/success',[],true);
        $this->load->view('pages/template',$data);
    }
    


}