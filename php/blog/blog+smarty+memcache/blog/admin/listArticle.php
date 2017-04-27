<?php   
require_once '../include.php';
$size = 3;
$page = isset($_REQUEST['page'])?$_REQUEST['page']:1;
$arr = getArticleByPage($page,$size);
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
    <style type="text/css">
    .article{
        background: #E6F2FB none repeat scroll 0% 0%;
        border-top: 1px solid #B5CFD9;
        border-bottom: 1px solid #B5CFD9;
    }
    </style>
</head>

<body>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="images/logo.png" alt="后台管理系统" /></a></div>
</div>
<?php include_once('nav.php');?>
<div class="admin">
	<form method="post">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>文章列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
            <a href="addArticle.php" class="button button-small border-green">添加文章</a>
            <input type="button" class="button button-small border-yellow" value="批量删除" />
            <input type="button" class="button button-small border-blue" value="回收站" />
        </div>
        <table class="table table-hover">
        	<tr><th width="45">选择</th><th width="120">ID</th><th width="250">文章标题</th><th width="100">分类</th><th width="100">作者</th><th width="100">图片</th><th width="100">操作</th></tr>
            <?php for($i=0;$i<count($arr);$i++){?>
            <tr><td><input type="checkbox" name="id" value="<?php echo $arr[$i]['art_id'];?>" /></td><td><?php echo $arr[$i]['art_id'];?></td><td><?php echo $arr[$i]['art_title'];?></td><td><?php echo $arr[$i]['cat_name'];?></td><td><?php echo $arr[$i]['art_author'];?></td><td><img width="40" height="40" src="../upload/<?php echo $arr[$i]['art_img'];?>"></td><td><a class="button border-blue button-little" href="editArticle.php?id=<?php echo $arr[$i]['art_id'];?>">修改</a> <a class="button border-yellow button-little" href="doAdminAction.php?act=delArticle&id=<?php echo $arr[$i]['art_id'];?>" onclick="{if(confirm('确认删除?')){return true;}return false;}">删除</a></td></tr>
            <?php }?>
        </table>
        <div class="panel-foot text-center">
            <?php echo showPage($page,$totalPage);?>
        </div>
    </div>
    </form>
    <br />
   
</div>

</body>
</html>