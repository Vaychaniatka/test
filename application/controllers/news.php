<?php

class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('newsModel');
        $this->load->helper('url');
    }

    public function view($id)
    {
        $cont_arr=array(
        'comments'=>$this->newsModel->get_comments($id),
        'news_item'=>$this->newsModel->get_news($id));
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
            $this->newsModel->create_news();
            $data['title']='Success message';
            $data['content']=$this->load->view('pages/news/success',[],true);
            $this->load->view('pages/template',$data);
        }
    }

    public function delete($id)
    {
        $data['title']= 'Success message';

        $this->newsModel->delete_news($id);
        $this->load->view('pages/news/success',[],true);
        $this->load->view('pages/template');
    }
    
    public function addComment()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('text', 'text', 'trim|required|xss_clean');

        if ($this->form_validation->run() === FALSE)
        {
            $n=$this->input->post('id');
            //var_dump($n);die();
            redirect('');

        }
        else
        {

            //var_dump($this->input->post('id'));die();
            $this->newsModel->add_comment();
            $data['title']='Success message';
            $data['content']=$this->load->view('pages/news/success',[],true);
            $this->load->view('pages/template',$data);
        }
    }


}