<?php
error_reporting(0);
require_once 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>企业名录查询</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <?php
    $name = $_POST["code"];
    query($name);
    ?>
</head>
<body>
<div class="top">
    <div class="cat"><img src="images/cat.gif" id="cat"></div>
    <div class="guide">
        <nav>
            <span><a href="#"><strong>公司资料</strong></a></span>
            <span><a href="#"><strong>公司股东</strong></a></span>
            <span><a href="#"><strong>员工构成</strong></a></span>
            <span><a href="#"><strong>利润业绩</strong></a></span>
        </nav>
    </div>
    <div class="heading_img">
        <img src="images/dio.jpg">
    </div>
</div>

<div class="body">
    <div class="body_icon">
        <form action="" method="post">
            <h1>公司信息查询：
                <br/>
                <label>请输入六位公司代码或公司名称。</label> </h1>
            <br/>
            <input type="text" name="code" autofocus required="required" placeholder="公司代码/名称" id="icon">
            <br/> <br/><br/>
            <input type="submit" value=" 查询 " id="button" style="display:block;margin:0 auto">
        </form>
    </div>
    <div class="push"></div>
</div>

<div class="bottom">
    <div class="bottom_left">
        <p>作者：吕萌</p>
        <p>班级：10班</p>
        <p>学号：55151001</p>
        <p>学院：软件学院</p>
    </div>
    <div class="bottom_right">
        <p>技术支持：Scrapy+BERT+XAMPP</p>
        <p>信息获取网站：<a href="http://quotes.money.163.com" target="_blank">网易财经</a>+<a href="http://www.eastmoney.com" target="_blank">东方财富网</a></p>
        <p>参考资料：NULL</p>
    </div>
</div>
</body>
</html>