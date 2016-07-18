<?php
$this->load->helper('form');
$this->load->library('form_validation');
echo '<h2>'.$news_item['name'].'</h2>';
echo $news_item['content'].'<br/>';
 if(isset($this->session->userdata['logon'])){
     echo validation_errors();
     echo form_open('news/addComment');

     echo "<h2>Add comment</h2>";
     echo '<label for="text">Text</label>
    <textarea name="text"></textarea><br />
    <input type="submit" name="submit" value="Add" />
    </form>';}?>
    <p><a href='/news/index'>Back</a></p>