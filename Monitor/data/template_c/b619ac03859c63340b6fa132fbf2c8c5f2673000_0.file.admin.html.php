<?php
/* Smarty version 3.1.30, created on 2017-09-22 18:57:02
  from "D:\Software\phpstudy\WWW\Monitor\tpl\admin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59c4ec7e7c6f01_26471677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b619ac03859c63340b6fa132fbf2c8c5f2673000' => 
    array (
      0 => 'D:\\Software\\phpstudy\\WWW\\Monitor\\tpl\\admin.html',
      1 => 1506077819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c4ec7e7c6f01_26471677 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="./tpl/assets/css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./tpl/admin.css">
</head>

<body>
  <!-- nav -->
  <div class="nav-box" id="navBox">
    <div class="logo">
      后台编辑页
    </div>
    <ul class="nav">
      <li class="cur">
        <a href="javascript:;">
          <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
          <span class="nav-name">地图</span>
          <div class="triangle_border_left">
            <span></span>
          </div>
        </a>
      </li>

      <li class="nav-hidden" id="navHidden">
        <a href="javascript:;">
          <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
          <span class="nav-name">收起</span>
        </a>
      </li>
    </ul>
  </div>
  <!-- nav end-->
  <!--content -->
  <div class="container-box">
    <!-- head -->
    <div class="head">
      <div class="tag">地图</div>
      <div class="setting">
        <a href="javascript:;">
          <button type="button" class="btn btn-success">
            <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>消息<span class="badge">4</span>
          </button>
        </a>
        <a href="javascript:;">
          <button type="button" class="btn btn-warning">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>设置
          </button>
        </a>
        <a href="javascript:;">
          <button type="button" class="btn btn-info" id="loginOut">
            <span class="glyphicon glyphicon-log-out""aria-hidden="true"></span>登出
          </button>
        </a>
      </div>
    </div>
    <!-- head end-->
    <div class="container">
      <div class="white-box">
        <div>
          <div id="l-map"></div>
        </div>
      </div>
    </div>
  </div>

  <!--content end -->
  <?php echo '<script'; ?>
 src="./tpl/assets/js/jquery1.11.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=Eo0Ga2S25iAqZ8DyWdpyUge97LqqLBob"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="./tpl/map.js"><?php echo '</script'; ?>
>
  <!-- <?php echo '<script'; ?>
 type="text/javascript" src="wangEditor.min.js"><?php echo '</script'; ?>
> -->
  <?php echo '<script'; ?>
 src="./tpl/admin.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
