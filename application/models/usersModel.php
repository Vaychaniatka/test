<?php

class UsersModel1 extends MY_Model
{
    protected $tableName='user';
    protected $id;
    protected $name;
    protected $password;
    protected $email;
    protected $authorised;


    function __construct()
    {
        parent::__construct();
    }

    public function getTableName()
    {
        return $this->tableName;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getAuthorised()
    {
        return $this->authorised;
    }


    public function setAuthorised($authorised)
    {
        $this->authorised = $authorised;
    }

    public function addUser($userData)
    {
        foreach ($userData as $key=>$value)
        {
           $this->setProperty($key,$value);
        }
        $this->save();
    }

    public function getUsers($name = FALSE)
    {
        if ($name === FALSE)
        {
            $query=$this->db->get($this->tableName);
            return $query->result_array();
        }

        $query=$this->db->get_where($this->tableName,array('name'=>$name));

        return $query->row_array();
    }


    public function setUserData($name)
    {
        $query=$this->db->get_where($this->tableName,array('name'=>$name));
        $row=$query->row_array();
        foreach ($row as $key=>$value)
        {
            $this->setProperty($key,$value);
        }

    }


}