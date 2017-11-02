<?php
/* Smarty version 3.1.30, created on 2017-09-27 20:44:58
  from "D:\Software\phpstudy\WWW\Monitor\tpl\member.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59cb9d4aabd8b8_77856089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96e993ec90d8f2a31a9d42aece2995c05f0e8c70' => 
    array (
      0 => 'D:\\Software\\phpstudy\\WWW\\Monitor\\tpl\\member.html',
      1 => 1506516231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59cb9d4aabd8b8_77856089 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>数据监测</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./tpl/css/main.css">
    <link rel="stylesheet" href="css/reset.css">
    <style type="text/css">
    </style>
</head>

<body>
<!--main-->
<!--<div class="main">-->
    <!--nav-->
    <nav class="navbar navbar-default nav-justified" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">智能实验室管理系统</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right main-nav">
                    <li><a href="/docs/introduction/overview/">设备管理</a></li>
                    <li><a href="/download/">数据监测</a></li>
                    <li><a href="/community/">视频监控</a></li>
                    <li><a href="/blog/">文档管理</a></li>
                    <li><a href="/blog/">个人中心</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--container-->
    <div class='main container'>
        <div class="row " id="vueRow">
            <!--左侧导航区-->
            <div class="col-lg-2 col-md-2 aside" id="navLeft">
                <!--<hr>-->
                <div class="dataChoose">
                    <!--<ul>-->
                        <!--<li>-->
                            <div class="btn-group">
                                <!--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" >历史数据 <span-->
                                <!--class="caret"></span></button>-->
                                <a  class="dropdown-toggle a_title" data-toggle="dropdown" style='width: 100%'>历史数据 <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu"   role="menu" style="min-width: 300px">
                                    <li id="today" class="hahaha" onclick="getPhp('today')"><a class="pointer historyActive">今天</a></li>
                                    <li id="one" ><a class="pointer" >过去一天</a></li>
                                    <li id="seven"><a class="pointer" >过去7天</a></li>
                                    <li id="oneDay">
                                        <a href="javascript:;">历史日期：</a>
                                        <div class="dropSelects">
                                            <select id="year">
                                                <option value="2017" id="2017">2017</option>
                                            </select>
                                            <span class="dropLabel">年</span>
                                            <select id="moth">
                                            </select>
                                            <span class="dropLabel" onchange="writeYMD()">月</span>
                                            <select id="day">
                                            </select>
                                            <span class="dropLabel">日</span>
                                            <button type="button" id="query" class="btn btn-primary btn-xs button-font" >确定</button>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        <!--</li>-->
                        <!--<li>-->
                            <a class="realTimeBtn a_title btn-group" style="outline: none" onclick="turn()" title="每三分钟自动刷新">实时数据</a>
                            <!--<button class="btn btn-default realTimeBtn" style="outline: none" onclick="turn()" title="每三分钟自动刷新">实时数据-->
                            <!--</button>-->
                        <!--</li>-->
                        <!--<li>-->
                            <div class="btn-group">
                                <a class="dropdown-toggle a_title" data-toggle="dropdown">图表类型<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="pointer series0 aActive">折线图</a></li>
                                    <li><a class="pointer series1">柱形图</a></li>
                                </ul>
                            </div>
                        <!--</li>-->
                    <!--</ul>-->
                </div>
            </div>

            <!--数据展示区-->
            <div class="col-lg-8  col-md-8 ">
                <!--<hr>-->
                <!--按钮设置区-->
                <div id="noData"><p>暂无数据...</p></div>
                <!--数据展示-->
                <div id="showData">
                    <!--温度数据-->
                    <div class="">
                        <div id="temperature" style="width: 100%;height:400px;"></div>
                    </div>
                    <hr>
                    <!--湿度数据-->
                    <div class="">
                        <div id="humidity" style="width: 100%;height:400px;"></div>
                    </div>
                    <hr>
                    <!--风速数据-->
                    <div class="">
                        <div id="wind" style="width: 100%;height:400px;"></div>
                    </div>
                </div>
                <hr>
            </div>

            <!--右侧占位-->
            <!--<div class="col-lg-1 col-md-1 "></div>-->
        </div>
    </div>
<!--</div>-->
<!-- footer -->
<!--<div class="footer">-->
    <!--长海现代&copy;-->
<!--</div>-->
<!-- footer end -->

<?php echo '<script'; ?>
 src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.bootcss.com/echarts/3.6.2/echarts.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var phpData = <?php echo $_smarty_tpl->tpl_vars['machine_data']->value;?>
;
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./tpl/js/main.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function () {
        seriesType = 'line';
        subText ="（今天）";
//        myStartValue =data[0].date;
        showAllData();
        writeYMD();
        $('.series1').attr("onclick", "turnSeriesType()");
        $('#one,#seven, #thirty, #all').attr("onclick", "turnHistory(this.id)");
    });
<?php echo '</script'; ?>
>
</body>

</html><?php }
}
