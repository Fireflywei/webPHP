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
        <strong>添加分类</strong>
        <ul class="tab-nav">
          <li class="active"><a href="#tab-set">添加分类</a></li>
        </ul>
      </div>
      <div class="tab-body">
        <br />
        <div class="tab-panel active" id="tab-set">
        	<form method="post" class="form-x" action="doAdminAction.php?act=addCate">
				
                <div class="form-group">
                    <div class="label"><label for="sitename">分类名称</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="cat_name" name="cat_name" size="50" placeholder="分类名称"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="siteurl">连接地址</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="cat_link" name="cat_link" size="50" placeholder="分类连接" />
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