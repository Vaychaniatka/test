<?php session_start() ?>
<h2>Hello!</h2>
<p>This is main page of my first site</p>
<?php //var_dump($_SESSION);die();

if(isset($this->session->userdata['logon'])){
    echo $this->session->userdata['user_name'];
}?>