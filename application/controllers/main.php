<?php
class Main extends CI_Controller{
    public function view($page){
       if  (empty($page))
        {
            $page='home';
        }

        if ( ! file_exists('application/views/pages/template.php'))
        {
            // Упс, у нас нет такой страницы!
           show_404();
        }
        $data['title'] = ucfirst($page); // Сделать первую букву заглавной

        //var_dump($data);die();
        /*$this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);*/
        $this->load->view('pages/template.php', $data);
    }

}