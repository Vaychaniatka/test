<h2>Hello!</h2>
<p>This is main page of my first site</p>
<?php //var_dump($session_data);die();

if(isset($_SESSION['logon'])){
    echo $session_data['user_name'];
}?>