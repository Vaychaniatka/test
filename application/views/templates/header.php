<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="keywords should be here" />
    <meta name="description" content="here should be description" />
    <link href="<?php echo base_url('application/media/css/workPage.css');?>" rel="stylesheet" type="text/css" />
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
            <h1><a href="">My<strong>Syte</strong><span>News and Users</span></a></h1>
        </div><!-- end of logo -->
        <div id="menu">
            <ul>
                <li><a href="index.html">Main</a></li>
                <li><a href="news.html">News</a></li>
                <li><a href="about.html">Users</a></li>
            </ul>
        </div><!-- end of menu -->
    </div><!-- end of header -->
    <div id="content_box">


