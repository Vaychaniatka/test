<?php if(isset($this->session->userdata['logon'])){
echo "<p><a href='/news/create'>Create new item</a> </p>" ;}

foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['name'] ?></h2>
    <p>
        <?php echo $news_item['content'] ?>
    </p>
    <p><a href="view/<?php echo $news_item['id'] ?>">View article</a></p>


    <?php if(isset($this->session->userdata['logon'])&&($news_item['user_id']===$this->session->userdata['user_id'])){
        $n=$news_item['id'];
        echo "<p> <a href='/news/delete/$n'>Delete</a></p>";
    }

endforeach ?>