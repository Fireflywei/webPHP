<?php
require_once '../include.php';
$id = $_GET['id'];
$arr = getResultInfo("bg_admin",$id);
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

    <div class="tab">
      <div class="tab-head">
        <strong>添加管理员</strong>
        <ul class="tab-nav">
          <li class="active"><a href="#tab-set">编辑管理员</a></li>
        </ul>
      </div>
      <div class="tab-body">
        <br />
        <div class="tab-panel active" id="tab-set">
        	<form method="post" class="form-x" action="doAdminAction.php?act=editAdmin&id=<?php echo $arr['u_id'];?>">
				
                <div class="form-group">
                    <div class="label"><label for="sitename">管理员名称</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="u_username" name="u_username" size="50" placeholder="管理员名称" value="<?php echo $arr['u_username'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="siteurl">管理员密码</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="u_password" name="u_password" size="50" placeholder="管理员密码" value="<?php echo base64_decode($arr['u_password']);?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="title">管理员手机</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="u_tel" name="u_tel" size="50" placeholder="管理员手机" value="<?php echo $arr['u_tel'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="keywords">管理员邮箱</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="u_email" name="u_email" size="50" placeholder="管理员邮箱" value="<?php echo $arr['u_email'];?>"/>
                    </div>
                </div>
                
                <div class="form-button"><button class="button bg-main" type="submit">提交</button></div>
            </form>
        </div>
        <div class="tab-panel" id="tab-email">邮件设置</div>
        <div class="tab-panel" id="tab-upload">上传设置</div>
        <div class="tab-panel" id="tab-visit">访问限制</div>
      </div>
    </div>
   
</div>

</body>
</html>