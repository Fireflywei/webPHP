<?php
require_once '../include.php';
checkLogin();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理-后台管理</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="images/logo.png" alt="后台管理系统" /></a></div>
</div>

<?php include_once('nav.php');?>

<div class="admin">
	<div class="line-big">
    	<div class="xm3">
        	<div class="panel border-back">
            	<div class="panel-body text-center">
                	<img src="images/face.jpg" width="120" class="radius-circle" /><br />
            <?php 
            if(isset($_SESSION['adminName'])){
                echo $_SESSION['adminName'];
            }elseif(isset($_COOKIE['adminName'])){
                echo $_COOKIE['adminName'];
            }
            ?>
                </div>
            <div class="panel-foot bg-back border-back">您好，<?php 
            if(isset($_SESSION['adminName'])){
                echo $_SESSION['adminName'];
            }elseif(isset($_COOKIE['adminName'])){
                echo $_COOKIE['adminName'];
            }
            ?>，这是您第<?php echo $_SESSION['visit_count'];?>次登录，上次登录为<?php echo date("Y-m-d",$_SESSION['login_time']);?>。</div>
            </div>
            <br />
        	<div class="panel">
            	<div class="panel-head"><strong>站点统计</strong></div>
                <ul class="list-group">
                	<li><span class="float-right badge bg-red">88</span><span class="icon-user"></span> 会员</li>
                    <li><span class="float-right badge bg-main">828</span><span class="icon-file"></span> 文件</li>
                    <li><span class="float-right badge bg-main">828</span><span class="icon-shopping-cart"></span> 订单</li>
                    <li><span class="float-right badge bg-main">828</span><span class="icon-file-text"></span> 内容</li>
                    <li><span class="float-right badge bg-main">828</span><span class="icon-database"></span> 数据库</li>
                </ul>
            </div>
            <br />
        </div>
        <div class="xm9">
           
            <div class="panel">
            	<div class="panel-head"><strong>系统信息</strong></div>
                <table class="table">
                	<tr><th colspan="2">服务器信息</th><th colspan="2">系统信息</th></tr>
                    <tr><td width="110" align="right">操作系统：</td><td><?php echo PHP_OS;?></td><td width="90" align="right">系统开发：</td><td><a href="#" target="_blank">诺博源8月集体</a></td></tr>
                    <tr><td align="right">Web服务器：</td><td><?php echo apache_get_version();?></td><td align="right">主页：</td><td><a href="#" target="_blank">#</a></td></tr>
                    <tr><td align="right">程序语言：</td><td><?php echo "php".phpversion();?></td><td align="right">演示：</td><td><a href="#" target="_blank">http://localhost/blog</a></td></tr>
                    <tr><td align="right">数据库：</td><td>MySQL</td><td align="right">群交流：</td><td><a href="#" target="_blank">201916085</a> (点击加入)</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>