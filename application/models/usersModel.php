<?php

class UsersModel extends CI_Model
{
    public function __construct()
    {
        //parent::__construct();
        $this->load->database();
    }

    public function getUsers($name = FALSE)
    {
        if ($name === FALSE)
        {
            $query=$this->db->get('user');
            return $query->result_array();
        }

        $query=$this->db->get_where('user',array('name'=>$name));

        return $query->row_array();
    }

    public function getPass($name)
    {
        $query=$this->db->get_where('user',array('name'=>$name));
        $row=$query->row_array();//var_dump($row);die();
        return $row['password'];
    }

    public function addUser()
    {
        $data['name']=$this->input->post('name');
        $data['password']=$this->input->post('password');
        $data['email']=$this->input->post('email');
        $data['authorised']=FALSE;

        return $this->db->insert('user', $data);
    }

}