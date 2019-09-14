<?php
error_reporting(0);
require_once 'function.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="holder.css">
        <?php
        $holder = urldecode(getCode());
        $conn = connectDb();
        mysqli_set_charset($conn, 'utf8');
        $result = mysqli_query($conn, "SELECT code,name FROM holder WHERE shareholder='$holder'");
        $row = mysqli_fetch_all($result);
        $num =count($row);
        $compurl = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].'/company/gszl.php?code=';
        ?>
        <title><?php echo $holder; ?></title>
    </head>
    <body>
    <div class="body">
    <table class="tb">
    <tr><td colspan="2"><h2><?php echo $holder; ?></h2></td></tr>
    <?php
    for($i=0;$i<$num;$i++){
        echo "<tr><td class=\"td_width160\"><a href=\"$compurl{$row[$i][0]}\" target=\"_blank\">{$row[$i][1]}</a></td><td class='bus'><button class='button' type=\"button\">识别经营业务</button></td></tr>";
    }
        ?>
    </table>
    </div>
    <iframe id="id_iframe" name="nm_iframe" style="display:none;"></iframe>
    <script>
        var tdLis = document.getElementsByClassName("bus");
        for(var n=0;i<tdLis.length;i++){
            tdLis[n].index = n;
        }
        var lis = document.getElementsByClassName("button");
        for(var i=0;i<lis.length;i++){
            lis[i].index = i;
            lis[i].onclick = function(){
                var index = this.index;
                post('', {status:index});
            }
        }
    </script>
    <?php
    $status = $_POST["status"];
   busRecoginize($status,$row,$num);
    ?>
    <script type="text/javascript" src="javascript.js"></script>
    </body>
</html>