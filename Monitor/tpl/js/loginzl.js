function checkUpName(str){
    //var str = document.getElementById("username").value;
    //alert(str);
    if(str.length==0){
        document.getElementById("mySpan").innerHTML="请填写用户名";
    }else{
        var xmlhttp;
        if (window.XMLHttpRequest){
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else{
            // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if (xmlhttp.readyState==4 && xmlhttp.status==200){
                if(xmlhttp.responseText==1){
                    document.getElementById("mySpan").innerHTML="用户名可用"
                }
                if(xmlhttp.responseText==0){
                    document.getElementById("mySpan").innerHTML="用户名已被占用"
                }
            }
        };
        //请求指令加上输入框的值q
        xmlhttp.open("GET","register2.php?q="+str,true);
        //发送请求指令
        xmlhttp.send();
    }
}