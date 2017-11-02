<?php
/* Smarty version 3.1.30, created on 2017-09-19 20:25:17
  from "D:\Software\phpstudy\WWW\Monitor\tpl\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59c10cad5495c5_85320639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b88aa492d0f9f6b077947a3bfe2ba9f639717a75' => 
    array (
      0 => 'D:\\Software\\phpstudy\\WWW\\Monitor\\tpl\\index.html',
      1 => 1505823385,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c10cad5495c5_85320639 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>通风柜监测系统登录</title>
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
      .modal-dialog{
          padding: 0;
          margin: 0;
      }
      body{
          overflow: hidden;
          padding: 0;
          margin: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%,-50%);
      }
      button{
          outline:none!important;
      }
      .modal-content{
          box-shadow: none!important;
          border:none;
      }
      .goReg{
          float: left;
          line-height: 34px;
      }
  </style>
</head>

<body>

  <!-- 登录窗口 -->
  <div id="login">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-body">
          <button class="close" data-dismiss="modal">
          </button>
        </div>
        <div class="modal-title">
          <h2 class="text-center">通风柜监测系统登录</h2>
        </div>
        <div class="modal-body">
          <form class="form-group" method="post" action="admin.php?controller=admin&method=login">
            <div class="form-group">
              <label for="username">用户名</label>
              <input class="form-control" type="text" id='username' name="username" placeholder="请输入用户名">
            </div>
            <div class="form-group">
              <label for="password">密码</label>
              <input class="form-control" type="password" id='password' name="password" placeholder="请输入密码">
            </div>
            <div class="text-right">
                  <a href="./tpl/register.html" class="goReg">还没有账号？点我注册</a>
              <input class="btn btn-primary" type="submit" id="loginButton" value="登录">
              <input class="btn btn-danger" type='reset' value="重置">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--<?php echo '<script'; ?>
 src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"><?php echo '</script'; ?>
>-->


</body>

</html><?php }
}
