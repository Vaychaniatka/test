<?php

class CommentsModel extends MY_Model
{
    protected $tableName='comments';
    protected $text;
    protected $news_id;
    protected $user_id;
    protected $user_name;

    public function getUserName()
    {
        return $this->user_name;
    }

    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getNewsId()
    {
        return $this->news_id;
    }

    public function setNewsId($news_id)
    {
        $this->news_id = $news_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function add_comment($comData)
    {
        foreach ($comData as $key=>$value)
        {
            $this->setProperty($key,$value);
        }
        $this->save();
    }

    public function  get_comments($id)
    {
        $query=$this->db->get_where('comments',array('news_id'=>$id));
        return $query->result_array();
    }

    public function delete_comment($id)
    {
        $this->db->delete($this->tableName,array('id'=>$id));
    }

}