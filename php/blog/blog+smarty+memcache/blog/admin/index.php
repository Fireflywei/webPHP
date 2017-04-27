<?php
require_once '../include.php';
if($_SESSION['adminId'] != "" || $_COOKIE['adminId'] != ""){
 header("location:main.php");
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理-管理员登录</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/login.js"></script>
</head>

<body>
<div class="container">
    <div class="line">
        <div class="xs6 xm4 xs3-move xm4-move">
            <br /><br />
            <div class="media media-y">
                <a href="#" target="_blank"><img src="images/logo.png" class="radius" alt="后台管理系统" /></a>
            </div>
            <br /><br />
            <form action="doAdminAction.php?act=login" method="post">
            <div class="panel">
                <div class="panel-head"><strong>登录后台管理系统</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input" name="admin" id="admin" placeholder="登录账号" />
                            <span class="icon icon-user"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input" name="password" id="password" placeholder="登录密码" />
                            <span class="icon icon-key"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="text" class="input" name="verify" id="verify" placeholder="填写右侧的验证码" />
                            <img src="verify.php" width="80" height="32" class="passcode" onclick="this.src='verify.php?t='+Math.random()"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="radio"name="autoFlag" id="autoFlag" value="1"/>自动登录
                        </div>
                    </div>
                </div>
                <div class="panel-foot text-center"><button class="button button-block bg-main text-big" id="quren">立即登录后台</button></div>
            </div>
            </form>   
        </div>
    </div>
</div>

</body>
</html>