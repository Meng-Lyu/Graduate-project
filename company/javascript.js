// 鼠标移入移出显示图片功能
function showPic(e){
    var a=e.innerHTML;
    if(a=="博士以上")
        document.getElementById("show").innerHTML="<img src='images/doctor.jpg' id='graph'>";
    if(a=="研究生")
        document.getElementById("show").innerHTML="<img src='images/gradu.jpg' id='graph'>";
    if(a=="本科")
        document.getElementById("show").innerHTML="<img src='images/undergra.jpg' id='graph'>";
    if(a=="大专")
        document.getElementById("show").innerHTML="<img src='images/college.jpg' id='graph'>";
    if(a=="中专及以下")
        document.getElementById("show").innerHTML="<img src='images/special.jpg' id='graph'>";
}
function hiddenPic(){
    document.getElementById("show").innerHTML="";
}

// 点击按钮交换表格
function showChart1() {
    document.getElementById("tb1").style.display = "block";
    document.getElementById("tb2").style.display = "none";
    document.getElementById('button1').style.opacity=1;                     //改变按钮透明度
    document.getElementById('button2').style.opacity=0.4;
}
function showChart2() {
    document.getElementById("tb2").style.display = "block";
    document.getElementById("tb1").style.display = "none";
    document.getElementById('button2').style.opacity=1;
    document.getElementById('button1').style.opacity=0.4;
}

//导航栏跳转功能
function jumpGSZL(e) {
    var host = window.location.host;                            //获取页面host
    var code =window.location.search;                            //获取url中？及其以后的信息
    var url = "http://" + host + "/company/gszl.php" + code;
    e.href = url;                                                  //修改a的href
}
function jumpGDFX(e) {
    var host = window.location.host;
    var code =window.location.search;
    var url = "http://" + host + "/company/gdfx.php" + code;
    e.href = url;
}
function jumpYGGC(e) {
    var host = window.location.host;
    var code =window.location.search;
    var url = "http://" + host + "/company/yggc.php" + code;
    e.href = url;
}
function jumpProfit(e) {
    var host = window.location.host;
    var code =window.location.search;
    var url = "http://" + host + "/company/profit.php" + code;
    e.href = url;
}

// 显示和隐藏frame
function showFrame() {
    code =  document.getElementById("code").innerHTML;
    if(code[0]==0)
        document.getElementById("myframe").src = "http://quote.eastmoney.com/sz" + code + ".html";
    else
        document.getElementById("myframe").src = "http://quote.eastmoney.com/sh" + code + ".html";
    document.getElementById("button1").style.display = "none";
    document.getElementById("button2").style.display = "block";
}
function hideFrame() {
    document.getElementById("myframe").src = "";
    document.getElementById("button2").style.display = "none";
    document.getElementById("button1").style.display = "block";
}

//通过构建虚拟表单发送post请求给php，具体怎么实现的我也不懂
function post(URL, PARAMS) {
    var temp = document.createElement("form");
    temp.action = URL;
    temp.method = "post";
    temp.style.display = "none";
    temp.target = "nm_iframe";                //frame执行可以避免刷新页面
    for (var x in PARAMS) {
        var opt = document.createElement("textarea");
        opt.name = x;
        opt.value = PARAMS[x];
        temp.appendChild(opt);
    }
    document.body.appendChild(temp);
    temp.submit();
    return temp;
}