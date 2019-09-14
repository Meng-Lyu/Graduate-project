<?php
error_reporting(0);
require_once 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>公司资料</title>
    <link rel="stylesheet" type="text/css" href="gszl.css">
    <?php
    $copname = $_POST["code"];
    query($copname);
    $code = getCode();
    $conn = connectDb();
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, "SELECT name,form,location,sim_name,addr,all_name,tel,en_name,email,fund,chairman,emp_num,represent,manager,web,inf_web,inf_news,business,field,evolution FROM gszl WHERE code=$code");
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $form = $row['form'];
    $loc = $row['location'];
    $simname = $row['sim_name'];
    $addr = $row['addr'];
    $allname = $row['all_name'];
    $tel = $row['tel'];
    $enname = $row['en_name'];
    $email = $row['email'];
    $fund = $row['fund'];
    $chairman = $row['chairman'];
    $empnum = $row['emp_num'];
    $represent = $row['represent'];
    $manager = $row['manager'];
    $web = $row['web'];
    $infweb = $row['inf_web'];
    $infnews = $row['inf_news'];
    $bus = $row['business'];
    $field = $row['field'];
    $evol = $row['evolution'];
    ?>
</head>
<body>
<img src="images/cxk.gif" width="150" height="150" id="gif">
<div class="top">
    <div class="cat"><img src="images/cat.gif" id="cat"></div>
    <div class="guide">
        <nav>
            <span><a style="color: white"><strong>公司资料</strong></a></span>
            <span><a onClick="jumpGDFX(this);"><strong>公司股东</strong></a></span>
            <span><a onClick="jumpYGGC(this);"><strong>员工构成</strong></a></span>
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
    <table class="tb">
        <tr>
            <td colspan="4">
                <h1>
                    <a href="" id="jump" target="_blank"><?php echo $name; ?></a>(<?php echo $code; ?>) 公司简介
                </h1>
            </td>
        </tr>
        <tr class="dbrow">
            <td class="td_label">组织形式</td>
            <td class="td_width160"><?php echo $form; ?></td>
            <td class="td_label">地域</td>
            <td class="td_width160"><?php echo $loc; ?></td>
        </tr>
        <tr>
            <td class="td_label">中文简称</td>
            <td class="td_width160"><?php echo $simname; ?></td>
            <td class="td_label">办公地址</td>
            <td class="td_width160"><?php echo $addr; ?></td>
        </tr>
        <tr class="dbrow">
            <td class="td_label">公司全称</td>
            <td class="td_width160"><?php echo $allname; ?></td>
            <td class="td_label">公司电话</td>
            <td class="td_width160"><?php echo $tel; ?></td>
        </tr>
        <tr>
            <td class="td_label">英文名称</td>
            <td class="td_width160"><?php echo $enname; ?></td>
            <td class="td_label">公司电子邮箱</td>
            <td class="td_width160"><?php echo $email; ?></td>
        </tr>
        <tr class="dbrow">
            <td class="td_label">注册资本</td>
            <td class="td_width160"><?php echo $fund; ?></td>
            <td class="td_label">董事长</td>
            <td class="td_width160"><?php echo $chairman; ?></td>
        </tr>
        <tr>
            <td class="td_label">员工人数</td>
            <td class="td_width160"><?php echo $empnum; ?></td>
            <td class="td_label">法人代表</td>
            <td class="td_width160"><?php echo $represent; ?></td>
        </tr>
        <tr class="dbrow">
            <td class="td_label">总经理</td>
            <td class="td_width160"><?php echo $manager; ?></td>
            <td class="td_label">公司网址</td>
            <td class="td_width160" id="web"><?php echo $web; ?></td>
        </tr>
        <tr>
            <td class="td_label">信息披露网址</td>
            <td class="td_width160"><?php echo $infweb; ?></td>
            <td class="td_label">信息披露报纸名称</td>
            <td class="td_width160"><?php echo $infnews; ?></td>
        </tr>
        <tr class="dbrow">
            <td class="td_label">主营业务</td>
            <td colspan="3"><?php echo $bus; ?></td>
        </tr>
        <tr>
            <td class="td_label">经营范围</td>
            <td colspan='3'><?php echo $field; ?></td>
        </tr>
        <tr class="dbrow">
            <td class="td_label">公司沿革</td>
            <td colspan='3'><?php echo $evol; ?></td>
        </tr>
        <tr>
            <td class="td_label">经营业务识别</td>
            <td>
                <form action="" method="post">
                    <select name="choose" class="select">
                        <option value="bus">主营业务</option>
                        <option value="field">经营范围</option>
                        <option value="text">自行输入</option>
                    </select>
                    <input type="submit" value="识别" id="button">
                    <br/>
                    <textarea cols="40" rows="10"  placeholder="请输入想要识别的文本。" id="text" name="text"></textarea>
                </form>
            </td>
            <td colspan="2">
                <?php
                $choose = $_POST['choose'];
                switch ($choose){
                    case bus:
                        recognize($bus);
                        break;
                    case field:
                        recognize($field);
                        break;
                    case text:
                        $str = $_POST['text'];
                        recognize($str);
                        echo "<script> document.getElementById('text').innerHTML='$str';</script>";
                    default:
                        break;
                }
                ?>
            </td>
        </tr>
    </table>
    <div class="push"></div>
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
