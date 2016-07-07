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
        $data['news'] = $this->newsModel->get_news($id);
        //var_dump($data['news']);die();

    }

    public function index()
    {
       $data['news'] = $this->newsModel->get_news();
        $data['title'] = 'News archive';
        /*$this->load->view('pages/template', $data);*/
        $data['content'] = $this->load->view( 'pages/news/index');
        $this->load->view('templates/header',$data);
        $this->load->view('pages/news/index',$data);
        $this->load->view('templates/footer');

        /*var_dump($data);die();*/



    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';
        $data['content']= $this->load->view('pages/news/create',[],true);

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('pages/template', $data);

        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }

    public function delete($id)
    {

    }

    public function update()
    {

    }
}