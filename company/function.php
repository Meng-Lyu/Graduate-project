<?php

#连接数据库函数，给定user、password
function connectDb(){
    return mysqli_connect("localhost","root","","wangyi");
}

#输入框查询是否由此公司信息并跳转网页
function query($name){
    if ($name != NULL) {                  //为空则不执行
        $conn = connectDb();
        mysqli_set_charset($conn, 'utf8');
        if (preg_match("/\d{6}/", $name)) {                  //检验是代码还是名称
            $result = mysqli_query($conn, "SELECT code FROM gszl WHERE code=$name");
            $num = mysqli_num_rows($result);
            if ($num != '0') {
                $url = 'http://localhost:8081/company/gszl.php' . '?code=' . $name;
                header("Location:$url");                          //跳转到gszl.php
            } else
                echo "<script> alert('未在数据库里搜索到此公司信息。/(ㄒoㄒ)/~~'); </script>";
        } else {
            $result = mysqli_query($conn, "SELECT code FROM gszl WHERE name='$name'");
            $num = mysqli_num_rows($result);
            if ($num != '0') {
                $row = mysqli_fetch_array($result);
                $code = $row['code'];
                $url = 'http://localhost:8081/company/gszl.php' . '?code=' . $code;
                header("Location:$url");
            } else
                echo "<script> alert('未在数据库里搜索到此公司信息。/(ㄒoㄒ)/~~'); </script>";
        }
    }

}

function getCode(){
    return substr(strrchr($_SERVER["QUERY_STRING"],"="),1);
}


#调用python识别函数
function python($str){
    unset($output);
    $command = 'python C:\NER-test\ner-BUS.py '.$str; //给定cmd命令
    exec($command,$array,$return_val); //执行命令
    return $array;
}

#获取python返回值并输出
function recognize($recog){
            $array = python($recog);                      //返回值为数组
            $entity = array();

            foreach ($array as $key => $value) {
                $result = iconv("gb2312", "utf-8//IGNORE", $value);          //windows显示为gbk编码形式，转码为utf8，防止中文乱码
                array_push($entity,$result);                                  //转码后存入entity数组
            }

            echo "<strong>经营业务实体：<br/></strong>";
            if($entity!=NULL)
                foreach ($entity as $key => $value) {
                    if($key != (count($entity)-1)){                   //检验是否为最后一个
                        echo $value.'  ';
                    }else
                        echo '<br/><br/>'."识别用时：".$value."s";

                }
            else
                echo "没有识别出的结果。";
}

#holder页面识别经营业务
function busRecoginize($index,$compRow,$num){
    $conn = connectDb();
    mysqli_set_charset($conn, 'utf8');
    if($index!=NULL){
        $end = "";
        $code = $compRow[$index][0];                                        //获取code值，index为post过来的按钮序号
        $result = mysqli_query($conn, "SELECT business FROM gszl WHERE code = $code");
        $row = mysqli_fetch_array($result);
        $bus = $row['business'];
        $array = python($bus);                      //返回值为数组
        $entity = array();

        foreach ($array as $key => $value) {
            $result = iconv("gb2312", "utf-8//IGNORE", $value);          //windows显示为gbk编码形式，转码为utf8，防止中文乱码
            array_push($entity,$result);                                  //转码后存入entity数组
        }

        if($entity!=NULL)
            foreach ($entity as $key => $value) {
                if($key != (count($entity)-1)){                   //检验是否为最后一个
                    $end = $end.$value.' ';                        //都加在end里
                }

            }
        else
            $end = "没有识别出的结果。";
        echo "<script>parent.tdLis[$index].innerHTML = '$end';</script>";               //因为用了frame，所以要加parent改变主页面内容
        }
}
?>
