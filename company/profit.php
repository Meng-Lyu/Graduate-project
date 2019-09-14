<?php
error_reporting(0);
require_once 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>利润业绩</title>
    <link rel="stylesheet" type="text/css" href="profit.css">
    <?php
    $copname = $_POST["code"];
    query($copname);
    $code = getCode();
    $conn = connectDb();
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, "SELECT name,web FROM gszl WHERE code=$code");
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $web = $row['web'];
    $result2 = mysqli_query($conn, "SELECT sy,pe,jzc,sjl,ys,ystb,jlr,jlrtb,mll,jll,roe,fzl,zgb,zz,ltg,lz,wfplr,date FROM profit WHERE code=$code");
    $row2 = mysqli_fetch_array($result2);
    $sy = $row2['sy'];
    $pe = $row2['pe'];
    $jzc = $row2['jzc'];
    $sjl = $row2['sjl'];
    $ys = $row2['ys'];
    $ystb = $row2['ystb'];
    $jlr = $row2['jlr'];
    $jlrtb = $row2['jlrtb'];
    $mll = $row2['mll'];
    $jll = $row2['jll'];
    $roe = $row2['roe'];
    $fzl = $row2['fzl'];
    $zgb = $row2['zgb'];
    $zz = $row2['zz'];
    $ltg = $row2['ltg'];
    $lz = $row2['lz'];
    $wfplr = $row2['wfplr'];
    $date = $row2['date'];
    ?>
</head>
<body>
<img src="images/cxk.gif" width="150" height="150" id="gif">
<div class="top">
    <div class="cat"><img src="images/cat.gif" id="cat"></div>
    <div class="guide">
        <nav>
            <span><a onClick="jumpGSZL(this);"><strong>公司资料</strong></a></span>
            <span><a onClick="jumpGDFX(this);"><strong>公司股东</strong></a></span>
            <span><a onClick="jumpYGGC(this);"><strong>员工构成</strong></a></span>
            <span><a style="color: white"><strong>利润业绩</strong></a></span>
        </nav>
    </div>
    <div class="query">
        <form action="" method="post">
            <input type="text" name="code" placeholder="公司代码/名称" id="icon">
        </form>
    </div>
    <div class="heading_img">
        <img src="images/dio.jpg">
    </div>
</div>

<div class="body">
    <table class="tb">
        <tr>
            <td colspan="4">
                <h1>
                    <a href="" id="jump" target="_blank"><?php echo $name; ?></a>(<span id="code"><?php echo $code; ?></span>) 利润业绩
                </h1>
            </td>
        </tr>
        <tr class="dbrow">
            <td class="td_label">收益（第一季度）</td>
            <td class="td_width160"><?php echo $sy; ?></td>
            <td class="td_label">动态市盈率（PE）</td>
            <td class="td_width160"><?php echo $pe; ?></td>
        </tr>
        <tr>
            <td class="td_label">净资产</td>
            <td class="td_width160"><?php echo $jzc; ?></td>
            <td class="td_label">市净率</td>
            <td class="td_width160"><?php echo $sjl; ?></td>
        </tr>
        <tr class="dbrow">
            <td class="td_label">营业收入</td>
            <td class="td_width160"><?php echo $ys; ?></td>
            <td class="td_label">跟去年同期比</td>
            <td class="td_width160"><?php echo $ystb; ?></td>
        </tr>
        <tr>
            <td class="td_label">净利润</td>
            <td class="td_width160"><?php echo $jlr; ?></td>
            <td class="td_label">跟去年同期比</td>
            <td class="td_width160"><?php echo $jlrtb; ?></td>
        </tr>
        <tr class="dbrow">
            <td class="td_label">毛利率</td>
            <td class="td_width160"><?php echo $mll; ?></td>
            <td class="td_label">净利率</td>
            <td class="td_width160"><?php echo $jll; ?></td>
        </tr>
        <tr>
            <td class="td_label" title="加权净资产收益率">ROE</td>
            <td class="td_width160"><?php echo $roe; ?></td>
            <td class="td_label">负债率</td>
            <td class="td_width160"><?php echo $fzl; ?></td>
        </tr>
        <tr class="dbrow">
            <td class="td_label">总股本</td>
            <td class="td_width160"><?php echo $zgb; ?></td>
            <td class="td_label">总值</td>
            <td class="td_width160"><?php echo $zz; ?></td>
        </tr>
        <tr>
            <td class="td_label">流通股</td>
            <td class="td_width160"><?php echo $ltg; ?></td>
            <td class="td_label">流值</td>
            <td class="td_width160"><?php echo $lz; ?></td>
        </tr>
        <tr class="dbrow">
            <td class="td_label">每股未分配利润</td>
            <td class="td_width160"><?php echo $wfplr; ?></td>
            <td class="td_label">上市时间</td>
            <td class="td_width160"><?php echo $date; ?></td>
        </tr>
    </table>
    <div class="frame">
        <div class="icon">
            <button type="button" onclick="showFrame()" id="button1"><a href="#myframe" style="color: #585858">查看更多财经信息</a></button>
            <button type="button" onclick="hideFrame()" id="button2"><a href="#jump" style="color: #585858">隐藏</a></button>
        </div>
        <div class="iframe">
            <iframe src="" frameborder="0" id="myframe"></iframe>
        </div>
    </div>
    <div class="push">
        <span id="web" style="display: none"><?php echo $web; ?></span>
    </div>
</div>

<script>
    var  web = document.getElementById("web").innerHTML;
    web = "http://" + web + "/";
    document.getElementById("jump").href = web;
</script>

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

<script type="text/javascript" src="javascript.js"></script>
</body>
</html>
