<?php

class MY_Model extends CI_Model
{
    private $excludeVars=[];
    private $tableName;

    public function __construct()
    {
        parent::__construct();
    }

    public function setProperty($propName, $propValue)
    {
        $this->$propName=$propValue;
    }

    public function getPropety($propName)
    {
        return $this->$propName;
    }

    public function getAvailibleVars()
    {
        $defaultExclude=['excludeVars','tableName'];
        $vars=array_keys(get_object_vars($this));
        $exclude = array_merge($defaultExclude,$this->excludeVars);
        return array_diff($vars,$exclude);
    }

    public function save()
    {
        $vars=$this->getAvailibleVars();
        foreach ($vars as $key=>$value)
        {
            $this->db->set($key,$value);
            $this->db->insert($this->tableName);

        }
    }
}