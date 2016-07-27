<?php
$this->load->helper('form');
$this->load->library('form_validation');
$news_item=$cont_arr['news_item'];
$comments=$cont_arr['comments'];
echo '<h2>'.$news_item['name'].'</h2>';
echo $news_item['content'].'<br/>';
$nId=$news_item['id'];
//if (isset ($comments))
//{
//echo '<h2>Comments:</h2>';
foreach ($comments as $comm_item):
    echo '<p>'.$comm_item['user_name'].':</p>';
    echo '<p>'.$comm_item['text'].'</p><br/>';
    if ((isset($this->session->userdata['user_id']))&&($comm_item['user_id']===$this->session->userdata['user_id']))
    {
        $n=$comm_item['id'];
        echo "<p><a href='/comments/delete/$n'>Delete this comment</a></p>";
    }
    endforeach;
//}
//var_dump($id);die();
 if(isset($this->session->userdata['logon'])){
     echo validation_errors();
     echo form_open('comments/addComment');


     echo form_hidden('id',$nId);
     echo "<h2>Add comment</h2>";
     echo '<label for="text">Text</label>
    <textarea name="text"></textarea><br />
    
    <input type="submit" name="submit" value="Add" />
    </form>';}?>
    <p><a href='/news/index'>Back</a></p>