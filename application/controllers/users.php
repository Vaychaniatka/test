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
        $data['content']=$this->load->view('pages/users/add','',true);

        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('pages/template', $data);

        }
        else
        {
            $userData['name']=$this->input->post('name');
            $userData['password']=$this->input->post('password');
            $userData['email']=$this->input->post('email');
            $userData['authorised']=FALSE;
            $this->usersModel->addUser($userData);
            $data['title']='Success message';
            $data['content']=$this->load->view('pages/news/success','',true);
            $this->load->view('pages/template',$data);
        }
    }

    public function index()
    {
        $data['title']='Log In';
        //$users=$this->usersModel1->getUsers();
        $data['content']=$this->load->view('pages/users/index',['users'=>$this->usersModel->getUsers()],true);
        $this->load->view('pages/template', $data);

    }

    public function logIn()
    {
        $pass=$_POST['password'];
        $usrName=$_POST['user_name'];
        if(isset($pass)&& isset($usrName))
        {
            $this->usersModel->setUserData($_POST['user_name']);
            if($pass===$this->usersModel1->getPassword())
            {
                session_start();
                $session_data['logon']='yes';
                $session_data['user_name']=$this->usersModel->getName();
                $session_data['user_id']=$this->usersModel->getID();
                $this->session->set_userdata($session_data);
                
            }
            redirect('');

        }

    }

    public function logOff()
    {
        $this->session->sess_destroy();
        redirect('');
    }
    
    
}