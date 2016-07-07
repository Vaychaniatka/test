<?php
$news=$this->newsModel->get_news();
foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['name'] ?></h2>
    <p>
        <?php echo $news_item['content'] ?>
    </p>
    <p><a href="view/<?php echo $news_item['id'] ?>">View article</a></p>


   <p> <a href='/news/delete/<?php echo $news_item['id'] ?>'>Delete</a></p>

<?php endforeach ?>