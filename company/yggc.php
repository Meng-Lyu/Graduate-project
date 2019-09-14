<?php
error_reporting(0);
require_once 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>员工构成</title>
    <link rel="stylesheet" type="text/css" href="yggc.css">
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
    $result2 = mysqli_query($conn, "SELECT comp_1,perc_1,comp_2,perc_2,comp_3,perc_3,comp_4,perc_4,comp_5,perc_5 FROM yggc WHERE code=$code");
    $row2 = mysqli_fetch_array($result2);
    $comp1 = $row2['comp_1'];
    $perc1 = $row2['perc_1'];
    $comp2 = $row2['comp_2'];
    $perc2 = $row2['perc_2'];
    $comp3 = $row2['comp_3'];
    $perc3 = $row2['perc_3'];
    $comp4 = $row2['comp_4'];
    $perc4 = $row2['perc_4'];
    $comp5 = $row2['comp_5'];
    $perc5 = $row2['perc_5'];
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
            <span><a style="color: white"><strong>员工构成</strong></a></span>
            <span><a onClick="jumpProfit(this);"><strong>利润业绩</strong></a></span>
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
    <div class="table">
        <table class="tb">
            <tr>
                <td colspan="2">
                    <h1>
                        <a href="" id="jump" target="_blank"><?php echo $name; ?></a>(<?php echo $code; ?>) 员工构成
                    </h1>
                </td>
            </tr>
            <tr class="dbrow">
                <td class="td_label">学历</td>
                <td class="td_label">员工占比</td>
            </tr>
            <tr>
                <td class="td_width" onmouseleave="hiddenPic()" onmouseenter="showPic(this)"><?php echo $comp1; ?></td>
                <td class="td_width160"><?php echo $perc1; ?></td>
            </tr>
            <tr class="dbrow">
                <td class="td_width" onmouseleave="hiddenPic()" onmouseenter="showPic(this)"><?php echo $comp2; ?></td>
                <td class="td_width160"><?php echo $perc2; ?></td>
            </tr>
            <tr>
                <td class="td_width" onmouseleave="hiddenPic()" onmouseenter="showPic(this)"><?php echo $comp3; ?></td>
                <td class="td_width160"><?php echo $perc3; ?></td>
            </tr>
            <tr class="dbrow">
                <td class="td_width" onmouseleave="hiddenPic()" onmouseenter="showPic(this)"><?php echo $comp4; ?></td>
                <td class="td_width160"><?php echo $perc4; ?></td>
            </tr>
            <tr>
                <td class="td_width" onmouseleave="hiddenPic()" onmouseenter="showPic(this)"><?php echo $comp5; ?></td>
                <td class="td_width160"><?php echo $perc5; ?></td>
            </tr>
        </table>
    </div>
    <div class="graph" id="show">
    </div>

    <div class="diagram">
        <div class="icon">
            <button type="button" id="button1" onclick="showChart1()">按比例</button>
            <button type="button" style="margin-left: -3px" id="button2" onclick="showChart2()">按员工</button>
            <span>本数据均为“此员工类型，在3604个公司中，处于第几占比的比例”。 例：约24.69%公司中，本科生占比最大。  *此数据仅供参考。</span>
        </div>

        <div class="chart">
            <table class="chart1" id="tb1">
                <tr class="headline">
                    <td class="td_width">占比/员工</td>
                    <td class="td_width">博士以上</td>
                    <td class="td_width">研究生</td>
                    <td class="td_width">本科</td>
                    <td class="td_width">大专</td>
                    <td class="td_width">中专及以下</td>
                </tr>
                <tr class="dbrow">
                    <td class="title">第一</td>
                    <td class="td_width">0.31%</td>
                    <td class="td_width">0.36%</td>
                    <td class="td_width">24.69%</td>
                    <td class="td_width">14.87%</td>
                    <td class="td_width">59.77%</td>
                </tr>
                <tr>
                    <td class="title">第二</td>
                    <td class="td_width">0.31%</td>
                    <td class="td_width">4.25%</td>
                    <td class="td_width">27.97%</td>
                    <td class="td_width">59.32%</td>
                    <td class="td_width">8.16%</td>
                </tr>
                <tr class="dbrow">
                    <td class="title">第三</td>
                    <td class="td_width">6.10%</td>
                    <td class="td_width">16.20%</td>
                    <td class="td_width">42.59%</td>
                    <td class="td_width">21.56%</td>
                    <td class="td_width">13.54%</td>
                </tr>
                <tr>
                    <td class="title">第四</td>
                    <td class="td_width">35.54%</td>
                    <td class="td_width">57.52%</td>
                    <td class="td_width">0.28%</td>
                    <td class="td_width">1.14%</td>
                    <td class="td_width">5.52%</td>
                </tr>
                <tr class="dbrow">
                    <td class="title">第五</td>
                    <td class="td_width">57.74%</td>
                    <td class="td_width">21.67%</td>
                    <td class="td_width">4.47%</td>
                    <td class="td_width">3.11%</td>
                    <td class="td_width">13.01%</td>
                </tr>
            </table>

            <table class="chart2" id="tb2">
                <tr class="headline">
                    <td class="td_width">员工/占比</td>
                    <td class="td_width">第一</td>
                    <td class="td_width">第二</td>
                    <td class="td_width">第三</td>
                    <td class="td_width">第四</td>
                    <td class="td_width">第五</td>
                </tr>
                <tr class="dbrow">
                    <td class="title">博士以上</td>
                    <td class="td_width">0.31%</td>
                    <td class="td_width">0.31%</td>
                    <td class="td_width">6.10%</td>
                    <td class="td_width">35.54%</td>
                    <td class="td_width">57.74%</td>
                </tr>
                <tr>
                    <td class="title">研究生</td>
                    <td class="td_width">0.36%</td>
                    <td class="td_width">4.25%</td>
                    <td class="td_width">16.20%</td>
                    <td class="td_width">57.52%</td>
                    <td class="td_width">21.67%</td>
                </tr>
                <tr class="dbrow">
                    <td class="title">本科</td>
                    <td class="td_width">24.69%</td>
                    <td class="td_width">27.97%</td>
                    <td class="td_width">42.59%</td>
                    <td class="td_width">0.28%</td>
                    <td class="td_width">4.47%</td>
                </tr>
                <tr>
                    <td class="title">大专</td>
                    <td class="td_width">14.87%</td>
                    <td class="td_width">59.32%</td>
                    <td class="td_width">21.56%</td>
                    <td class="td_width">1.14%</td>
                    <td class="td_width">3.11%</td>
                </tr>
                <tr class="dbrow">
                    <td class="title">中专及以下</td>
                    <td class="td_width">59.77%</td>
                    <td class="td_width">8.16%</td>
                    <td class="td_width">13.54%</td>
                    <td class="td_width">5.52%</td>
                    <td class="td_width">13.01%</td>
                </tr>
            </table>
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
