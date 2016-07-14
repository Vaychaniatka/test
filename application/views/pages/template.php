<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="keywords should be here" />
    <meta name="description" content="here should be description" />
    <link href="<?php echo base_url('/media/css/workPage.css');?>" rel="stylesheet" type="text/css" />
    <title><?php
        if (isset($title)){
        echo $title;
        }else{
            echo"Title";
        }
        ?></title>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="logo">
            <h1><a href="/main/view">My<strong>Syte</strong><span>News and Users</span></a></h1>
        </div><!-- end of logo -->
        <div id="menu">
            <ul>
                <li><a href="/main/view">Main</a></li>
                <li><a href="/news/index">News</a></li>
                <li><a href="/users/index">Users</a></li>
            </ul>
        </div><!-- end of menu -->
    </div><!-- end of header -->
    <div id="content_box">

      <?php
            if (isset($content)) {
                echo $content;
            } else {
                echo "<p>Here will be content</p>";
            }

        ?>
    </div><!-- end of content_box -->
    <div id="footer">
        <span>Copyright © 2016 <a href="">Pavel Solov'ev</a></span>
    </div><!-- end of footer -->
</div><!-- end of wrapper -->
</body>
</html>