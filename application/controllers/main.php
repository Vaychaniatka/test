<?php
class Main extends CI_Controller{
    public function view(){
        $this->load->helper('url');
       
        $data['title'] = 'Main';
        $data['content']= $this->load->view('pages/main/hello','',true);

        $this->load->view('pages/template', $data);


    }

}