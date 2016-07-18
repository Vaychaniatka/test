<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usersModel');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
    }

    public function addUser()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title']='Create new user';
        $data['content']=$this->load->view('pages/users/add',[],true);

        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('pages/template', $data);

        }
        else
        {
            $this->usersModel->addUser();
            $data['title']='Success message';
            $data['content']=$this->load->view('pages/news/success',[],true);
            $this->load->view('pages/template',$data);
        }
    }

    public function index()
    {
        $data['title']='Log In';
        $data['content']=$this->load->view('pages/users/index',['users'=>$this->usersModel->getUsers()],true);
        $this->load->view('pages/template', $data);

    }

    public function logIn()
    {
        if(isset($_POST['password']))
        {
            $pass=$_POST['password'];//var_dump($_POST['user_name']);die;
            $user_name=$_POST['user_name'];
            $passControl=$this->usersModel->getPass($user_name);
            if($pass===$passControl)
            {
                session_start();
                $session_data['logon']='yes';
                $session_data['user_name']=$user_name;
                $this->session->set_userdata($session_data);
                
            }
            redirect('');

        }

    }

    public function logOff()
    {
        //$this->session->unset_userdata['logon'];
        $this->session->sess_destroy();
        redirect('');
    }
    
    
}