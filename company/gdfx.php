<?php
error_reporting(0);
require_once 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>公司股东</title>
    <link rel="stylesheet" type="text/css" href="gdfx.css">
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
    $result2 = mysqli_query($conn, "SELECT shareholder_1,shareholder_2,shareholder_3,shareholder_4,shareholder_5,shareholder_6,shareholder_7,shareholder_8,shareholder_9,shareholder_10,perc_1,perc_2,perc_3 FROM gdfx WHERE code=$code");
    $row2 = mysqli_fetch_array($result2);
    $sh1 = $row2['shareholder_1'];
    $perc1 = $row2['perc_1'];
    $sh2 = $row2['shareholder_2'];
    $perc2 = $row2['perc_2'];
    $sh3 = $row2['shareholder_3'];
    $perc3 = $row2['perc_3'];
    $sh4 = $row2['shareholder_4'];
    $sh5 = $row2['shareholder_5'];
    $sh6 = $row2['shareholder_6'];
    $sh7 = $row2['shareholder_7'];
    $sh8 = $row2['shareholder_8'];
    $sh9 = $row2['shareholder_8'];
    $sh10 = $row2['shareholder_10'];
    $holderurl = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].'/company/holder.php?holder=';
    ?>
</head>
<body>
<img src="images/cxk.gif" width="150" height="150" id="gif">
<div class="top">
    <div class="cat"><img src="images/cat.gif" id="cat"></div>
    <div class="guide">
        <nav>
            <span><a onClick="jumpGSZL(this);"><strong>公司资料</strong></a></span>
            <span><a style="color: white"><strong>公司股东</strong></a></span>
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
                    <a href="" id="jump" target="_blank"><?php echo $name; ?></a>(<?php echo $code; ?>) 公司股东
                </h1>
            </td>
        </tr>
        <tr class="dbrow">
            <td class="td_width160"><a href="<?php echo $holderurl.$sh1; ?>" target="_blank"><?php echo $sh1; ?></a></td>
            <td class="td_width160"><?php echo $perc1; ?></td>
        </tr>
        <tr>
            <td class="td_width160"><a href="<?php echo $holderurl.$sh2; ?>" target="_blank"><?php echo $sh2; ?></a></td>
            <td class="td_width160"><?php echo $perc2; ?></td>
        </tr>
        <tr class="dbrow">
            <td class="td_width160"><a href="<?php echo $holderurl.$sh3; ?>" target="_blank"><?php echo $sh3; ?></a></td>
            <td class="td_width160"><?php echo $perc3; ?></td>
        </tr>
        <tr>
            <td class="td_width160" colspan="2"><a href="<?php echo $holderurl.$sh4; ?>" target="_blank"><?php echo $sh4; ?></a></td>
        </tr>
        <tr class="dbrow">
            <td class="td_width160" colspan="2"><a href="<?php echo $holderurl.$sh5; ?>" target="_blank"><?php echo $sh5; ?></a></td>
        </tr>
        <tr>
            <td class="td_width160" colspan="2"><a href="<?php echo $holderurl.$sh6; ?>" target="_blank"><?php echo $sh6; ?></a></td>
        </tr>
        <tr class="dbrow">
            <td class="td_width160" colspan="2"><a href="<?php echo $holderurl.$sh7; ?>" target="_blank"><?php echo $sh7; ?></a></td>
        </tr>
        <tr>
            <td class="td_width160" colspan="2"><a href="<?php echo $holderurl.$sh8; ?>" target="_blank"><?php echo $sh8; ?></a></td>
        </tr>
        <tr class="dbrow">
            <td class="td_width160" colspan="2"><a href="<?php echo $holderurl.$sh9; ?>" target="_blank"><?php echo $sh9; ?></a></td>
        </tr>
        <tr>
            <td class="td_width160" colspan="2"><a href="<?php echo $holderurl.$sh10; ?>" target="_blank"><?php echo $sh10; ?></a></td>
        </tr>
    </table>

    <div class="table2">
        <table class="tb2">
            <tr>
                <td><h1>股东名称</h1></td>
                <td><h1>持股公<br/>司数量</h1></td>
            </tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中央汇金资产管理有限责任公司" target="_blank">中央汇金资产管理有限责任公司</a></td><td class="td_width160">824</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>香港中央结算有限公司" target="_blank">香港中央结算有限公司</a></td><td class="td_width160">485</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国证券金融股份有限公司" target="_blank">中国证券金融股份有限公司</a></td><td class="td_width160">432</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国农业银行股份有限公司－中证500交易型开" target="_blank">中国农业银行股份有限公司<br/>－中证500交易型开</a></td><td class="td_width160">140</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>香港中央结算(代理人)有限公司" target="_blank">香港中央结算(代理人)有限公司</a></td><td class="td_width160">50</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社会保障基金理事会转持一户" target="_blank">全国社会保障基金理事会转持一户</a></td><td class="td_width160">46</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社会保障基金理事会转持二户" target="_blank">全国社会保障基金理事会转持二户</a></td><td class="td_width160">43</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中欧基金－农业银行－中欧中证金融资产管理计划" target="_blank">中欧基金－农业银行<br/>－中欧中证金融资产管理计划</a></td><td class="td_width160">42</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一零四组合" target="_blank">全国社保基金一零四组合</a></td><td class="td_width160">40</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>HKSCC NOMINEES LIMITED" target="_blank">HKSCC NOMINEES LIMITED</a></td><td class="td_width160">38</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国工商银行股份有限公司－中证上海国企交易型" target="_blank">中国工商银行股份有限公司<br/>－中证上海国企交易型</a></td><td class="td_width160">37</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一零二组合" target="_blank">全国社保基金一零二组合</a></td><td class="td_width160">37</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国农业银行股份有限公司-中证500交易型开" target="_blank">中国农业银行股份有限公司<br/>-中证500交易型开</a></td><td class="td_width160">36</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一零三组合" target="_blank">全国社保基金一零三组合</a></td><td class="td_width160">36</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>UBS AG" target="_blank">UBS AG</a></td><td class="td_width160">35</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国长城资产管理股份有限公司" target="_blank">中国长城资产管理股份有限公司</a></td><td class="td_width160">28</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国华融资产管理股份有限公司" target="_blank">中国华融资产管理股份有限公司</a></td><td class="td_width160">28</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>华夏基金－农业银行－华夏中证金融资产管理计划" target="_blank">华夏基金－农业银行<br/>－华夏中证金融资产管理计划</a></td><td class="td_width160">28</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一一四组合" target="_blank">全国社保基金一一四组合</a></td><td class="td_width160">28</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>嘉实基金－农业银行－嘉实中证金融资产管理计划" target="_blank">嘉实基金－农业银行<br/>－嘉实中证金融资产管理计划</a></td><td class="td_width160">27</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>深圳市创新投资集团有限公司" target="_blank">深圳市创新投资集团有限公司</a></td><td class="td_width160">26</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>VANGUARD EMERGING MARK" target="_blank">VANGUARD EMERGING MARK</a></td><td class="td_width160">24</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>领航投资澳洲有限公司－领航新兴市场股指基金(" target="_blank">领航投资澳洲有限公司<br/>－领航新兴市场股指基金</a></td><td class="td_width160">24</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国建设银行股份有限公司－中欧价值发现股票型" target="_blank">中国建设银行股份有限公司<br/>－中欧价值发现股票型</a></td><td class="td_width160">24</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一一三组合" target="_blank">全国社保基金一一三组合</a></td><td class="td_width160">24</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国银河证券股份有限公司" target="_blank">中国银河证券股份有限公司</a></td><td class="td_width160">23</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国建设银行股份有限公司－富国中证军工指数分" target="_blank">中国建设银行股份有限公司<br/>－富国中证军工指数分</a></td><td class="td_width160">23</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>博时基金－农业银行－博时中证金融资产管理计划" target="_blank">博时基金－农业银行<br/>－博时中证金融资产管理计划</a></td><td class="td_width160">23</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金六零四组合" target="_blank">全国社保基金六零四组合</a></td><td class="td_width160">23</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金五零三组合" target="_blank">全国社保基金五零三组合</a></td><td class="td_width160">22</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一一五组合" target="_blank">全国社保基金一一五组合</a></td><td class="td_width160">22</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>VANGUARD TOTAL INTERNA" target="_blank">VANGUARD TOTAL INTERNA</a></td><td class="td_width160">21</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>GIC PRIVATE LIMITED" target="_blank">GIC PRIVATE LIMITED</a></td><td class="td_width160">20</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>长城国融投资管理有限公司" target="_blank">长城国融投资管理有限公司</a></td><td class="td_width160">20</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国信达资产管理股份有限公司" target="_blank">中国信达资产管理股份有限公司</a></td><td class="td_width160">20</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>挪威中央银行－自有资金" target="_blank">挪威中央银行－自有资金</a></td><td class="td_width160">20</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>大成基金－农业银行－大成中证金融资产管理计划" target="_blank">大成基金－农业银行<br/>－大成中证金融资产管理计划</a></td><td class="td_width160">20</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国建设银行股份有限公司－鹏华中证国防指数分" target="_blank">中国建设银行股份有限公司<br/>－鹏华中证国防指数分</a></td><td class="td_width160">20</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>长安国际信托股份有限公司－长安信托－长安投资" target="_blank">长安国际信托股份有限公司<br/>－长安信托－长安投资</a></td><td class="td_width160">20</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>国新投资有限公司" target="_blank">国新投资有限公司</a></td><td class="td_width160">19</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中信证券股份有限公司" target="_blank">中信证券股份有限公司</a></td><td class="td_width160">19</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>安徽省铁路发展基金股份有限公司" target="_blank">安徽省铁路发展基金股份有限公司</a></td><td class="td_width160">19</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>招商银行股份有限公司－中欧恒利三年定期开放混" target="_blank">招商银行股份有限公司<br/>－中欧恒利三年定期开放混</a></td><td class="td_width160">19</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一零八组合" target="_blank">全国社保基金一零八组合</a></td><td class="td_width160">19</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>北京诚通金控投资有限公司" target="_blank">北京诚通金控投资有限公司</a></td><td class="td_width160">18</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>山东省国有资产投资控股有限公司" target="_blank">山东省国有资产投资控股有限公司</a></td><td class="td_width160">18</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国工商银行股份有限公司-易方达创业板交易型" target="_blank">中国工商银行股份有限公司<br/>-易方达创业板交易型</a></td><td class="td_width160">18</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国建设银行股份有限公司－景顺长城量化精选股" target="_blank">中国建设银行股份有限公司<br/>－景顺长城量化精选股</a></td><td class="td_width160">18</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金四一八组合" target="_blank">全国社保基金四一八组合</a></td><td class="td_width160">18</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>紫光集团有限公司" target="_blank">紫光集团有限公司</a></td><td class="td_width160">17</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国人寿保险股份有限公司－传统－普通保险产品" target="_blank">中国人寿保险股份有限公司<br/>－传统－普通保险产品</a></td><td class="td_width160">17</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一零七组合" target="_blank">全国社保基金一零七组合</a></td><td class="td_width160">17</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金五零四组合" target="_blank">全国社保基金五零四组合</a></td><td class="td_width160">17</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>徐开东" target="_blank">徐开东</a></td><td class="td_width160">16</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>国家集成电路产业投资基金股份有限公司" target="_blank">国家集成电路产业投资基金股份有限公司</a></td><td class="td_width160">16</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国人民财产保险股份有限公司－传统－普通保险" target="_blank">中国人民财产保险股份有限公司<br/>－传统－普通保险</a></td><td class="td_width160">16</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金四一三组合" target="_blank">全国社保基金四一三组合</a></td><td class="td_width160">16</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>吕强" target="_blank">吕强</a></td><td class="td_width160">15</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>上海高毅资产管理合伙企业(有限合伙)－高毅邻" target="_blank">上海高毅资产管理合伙企业(有限合伙)－高毅邻</a></td><td class="td_width160">15</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>招商银行股份有限公司－博时中证央企结构调整交" target="_blank">招商银行股份有限公司<br/>－博时中证央企结构调整交</a></td><td class="td_width160">15</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一一零组合" target="_blank">全国社保基金一一零组合</a></td><td class="td_width160">15</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一一八组合" target="_blank">全国社保基金一一八组合</a></td><td class="td_width160">15</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>招商证券香港有限公司" target="_blank">招商证券香港有限公司</a></td><td class="td_width160">14</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国建银投资有限责任公司" target="_blank">中国建银投资有限责任公司</a></td><td class="td_width160">14</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国国有企业结构调整基金股份有限公司" target="_blank">中国国有企业结构调整基金股份有限公司</a></td><td class="td_width160">14</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>华泰证券股份有限公司" target="_blank">华泰证券股份有限公司</a></td><td class="td_width160">14</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>上海祥禾泓安股权投资合伙企业(有限合伙)" target="_blank">上海祥禾泓安股权投资合伙企业(有限合伙)</a></td><td class="td_width160">14</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国人寿保险(集团)公司－传统－普通保险产品" target="_blank">中国人寿保险(集团)公司<br/>－传统－普通保险产品</a></td><td class="td_width160">14</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国工商银行股份有限公司－东方红产业升级灵活" target="_blank">中国工商银行股份有限公司<br/>－东方红产业升级灵活</a></td><td class="td_width160">14</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>兴业银行股份有限公司－兴全趋势投资混合型证券" target="_blank">兴业银行股份有限公司<br/>－兴全趋势投资混合型证券</a></td><td class="td_width160">14</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一零六组合" target="_blank">全国社保基金一零六组合</a></td><td class="td_width160">14</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>GUOTAI JUNAN SECURITIE" target="_blank">GUOTAI JUNAN SECURITIE</a></td><td class="td_width160">13</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国人民人寿保险股份有限公司－分红－个险分红" target="_blank">中国人民人寿保险股份有限公司<br/>－分红－个险分红</a></td><td class="td_width160">13</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国工商银行股份有限公司－上证上海改革发展主" target="_blank">中国工商银行股份有限公司<br/>－上证上海改革发展主</a></td><td class="td_width160">13</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一零一组合" target="_blank">全国社保基金一零一组合</a></td><td class="td_width160">13</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金四零七组合" target="_blank">全国社保基金四零七组合</a></td><td class="td_width160">13</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>西藏自治区投资有限公司" target="_blank">西藏自治区投资有限公司</a></td><td class="td_width160">12</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>青岛城投金融控股集团有限公司" target="_blank">青岛城投金融控股集团有限公司</a></td><td class="td_width160">12</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国国际金融股份有限公司" target="_blank">中国国际金融股份有限公司</a></td><td class="td_width160">12</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国工商银行股份有限公司－博时精选混合型证券" target="_blank">中国工商银行股份有限公司<br/>－博时精选混合型证券</a></td><td class="td_width160">12</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>广发基金－农业银行－广发中证金融资产管理计划" target="_blank">广发基金－农业银行<br/>－广发中证金融资产管理计划</a></td><td class="td_width160">12</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>华夏人寿保险股份有限公司－万能保险产品" target="_blank">华夏人寿保险股份有限公司<br/>－万能保险产品</a></td><td class="td_width160">12</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>交通银行股份有限公司－国泰金鹰增长灵活配置混" target="_blank">交通银行股份有限公司<br/>－国泰金鹰增长灵活配置混</a></td><td class="td_width160">12</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国人寿保险股份有限公司－分红－个人分红-0" target="_blank">中国人寿保险股份有限公司<br/>－分红－个人分红-0</a></td><td class="td_width160">12</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>招商银行股份有限公司－兴全合宜灵活配置混合型" target="_blank">招商银行股份有限公司<br/>－兴全合宜灵活配置混合型</a></td><td class="td_width160">12</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中欧基金-农业银行-中欧中证金融资产管理计划" target="_blank">中欧基金-农业银行<br/>-中欧中证金融资产管理计划</a></td><td class="td_width160">12</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金四零六组合" target="_blank">全国社保基金四零六组合</a></td><td class="td_width160">12</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金五零二组合" target="_blank">全国社保基金五零二组合</a></td><td class="td_width160">12</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金四一四组合" target="_blank">全国社保基金四一四组合</a></td><td class="td_width160">12</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>刘伟" target="_blank">刘伟</a></td><td class="td_width160">11</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>高雅萍" target="_blank">高雅萍</a></td><td class="td_width160">11</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中泰证券股份有限公司" target="_blank">中泰证券股份有限公司</a></td><td class="td_width160">11</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>北京紫光通信科技集团有限公司" target="_blank">北京紫光通信科技集团有限公司</a></td><td class="td_width160">11</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>招商局公路网络科技控股股份有限公司" target="_blank">招商局公路网络科技控股股份有限公司</a></td><td class="td_width160">11</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国人民人寿保险股份有限公司－传统－普通保险" target="_blank">中国人民人寿保险股份有限公司<br/>－传统－普通保险</a></td><td class="td_width160">11</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国建设银行股份有限公司－博时主题行业混合型" target="_blank">中国建设银行股份有限公司<br/>－博时主题行业混合型</a></td><td class="td_width160">11</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>华夏基金-农业银行-华夏中证金融资产管理计划" target="_blank">华夏基金-农业银行<br/>-华夏中证金融资产管理计划</a></td><td class="td_width160">11</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>新华人寿保险股份有限公司－分红－团体分红－0" target="_blank">新华人寿保险股份有限公司<br/>－分红－团体分红－0</a></td><td class="td_width160">11</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国银行股份有限公司－华宝标普中国A股红利机" target="_blank">中国银行股份有限公司<br/>－华宝标普中国A股红利机</a></td><td class="td_width160">11</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中国人寿保险股份有限公司－分红－个人分红－0" target="_blank">中国人寿保险股份有限公司<br/>－分红－个人分红－0</a></td><td class="td_width160">11</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金四零四组合" target="_blank">全国社保基金四零四组合</a></td><td class="td_width160">11</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一一一组合" target="_blank">全国社保基金一一一组合</a></td><td class="td_width160">11</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>李欣" target="_blank">李欣</a></td><td class="td_width160">10</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>深圳市投资控股有限公司" target="_blank">深圳市投资控股有限公司</a></td><td class="td_width160">10</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>华宝信托有限责任公司" target="_blank">华宝信托有限责任公司</a></td><td class="td_width160">10</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>云南省工业投资控股集团有限责任公司" target="_blank">云南省工业投资控股集团有限责任公司</a></td><td class="td_width160">10</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国东方资产管理股份有限公司" target="_blank">中国东方资产管理股份有限公司</a></td><td class="td_width160">10</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>中信证券－中信银行－中信证券卓越成长股票集合" target="_blank">中信证券－中信银行<br/>－中信证券卓越成长股票集合</a></td><td class="td_width160">10</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>中国工商银行股份有限公司－南方大数据100指" target="_blank">中国工商银行股份有限公司<br/>－南方大数据100指</a></td><td class="td_width160">10</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>陕西省国际信托股份有限公司－陕国投·鑫鑫向荣" target="_blank">陕西省国际信托股份有限公司<br/>－陕国投·鑫鑫向荣</a></td><td class="td_width160">10</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>招商银行股份有限公司－东方红睿丰灵活配置混合" target="_blank">招商银行股份有限公司<br/>－东方红睿丰灵活配置混合</a></td><td class="td_width160">10</td></tr>
            <tr><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金四零一组合" target="_blank">全国社保基金四零一组合</a></td><td class="td_width160">10</td></tr>
            <tr class="dbrow"><td class="td_width160"><a href="<?php echo $holderurl; ?>全国社保基金一一二组合" target="_blank">全国社保基金一一二组合</a></td><td class="td_width160">10</td></tr>
        </table>
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
        <p>信息获取网站：<a href="http://quotes.money.163.com" target="_blank"style="color: lightgray">网易财经</a>+<a href="http://www.eastmoney.com" target="_blank"style="color: lightgray">东方财富网</a></p>
        <p>参考资料：NULL</p>
    </div>
</div>

<script type="text/javascript" src="javascript.js"></script>
</body>
</html>
