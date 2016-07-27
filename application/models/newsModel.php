<?php

class NewsModel extends MY_Model
{
    protected $tableName='news';
    protected $name;
    protected $content;
    protected $user_id;

    public function __construct()
    {
        parent::__construct();
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function create_news($newsData)
    {
        foreach ($newsData as $key=>$value)
        {
            $this->setProperty($key,$value);
        }
        $this->save();
    }

    public function get_news($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get($this->tableName);
            return $query->result_array();
        }

        $query = $this->db->get_where($this->tableName, array('id' => $id));
        return $query->row_array();
    }

    public function delete_news($id)
    {
        $this->db->delete($this->tableName, array('id' => $id));
    }
}