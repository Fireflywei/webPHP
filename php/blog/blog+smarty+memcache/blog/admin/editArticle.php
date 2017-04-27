<?php
require_once '../include.php';
$cates = getAllResult("bg_category");
$id = $_REQUEST['id'];
$arr = getResultInfo("bg_article","art_id={$id}");
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
    <script type="text/javascript" charset="utf-8" src="../plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/ueditor/ueditor.all.min.js"> </script>
 <script type="text/javascript" charset="utf-8" src="../plugins/ueditor/lang/zh-cn/zh-cn.js"></script>
  <!-- 实例化编辑器 -->
    <script type="text/javascript">
  <!-- 
        window.onload = function(){
            var ue = UE.getEditor('content',{
            UEDITOR_HOME_URL:'../plugins/ueditor/',
        });
        }
  //-->
  </script>
</head>

<body>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="images/logo.png" alt="后台管理系统" /></a></div>
</div>
<?php include_once('nav.php');?>

<div class="admin">

    <div class="tab">
      <div class="tab-head">
        <strong>添加文章</strong>
        <ul class="tab-nav">
          <li class="active"><a href="#tab-set">添加文章</a></li>
        </ul>
      </div>
      <div class="tab-body">
        <br />
        <div class="tab-panel active" id="tab-set">
        	<form method="post" class="form-x" action="doAdminAction.php?act=editArticle&id=<?php echo $arr['art_id'];?>" enctype="multipart/form-data">
				
                <div class="form-group">
                    <div class="label"><label for="sitename">文章标题</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="art_title" name="art_title" size="50" placeholder="文章名称" value="<?php echo $arr['art_title'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="siteurl">文章分类</label></div>
                    <div class="field">
                    	<select name="cat_id">
                        <?php for($i=0;$i<count($cates);$i++){?>
                         <option value="<?php echo $cates[$i]['cat_id']?>"<?php if($arr['cat_id']==$cates[$i]['cat_id']){?>selected<?php }?>><?php echo $cates[$i]['cat_name']?></option>  
                        <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="logo">文章作者</label></div>
                    <div class="field">
                    	<input type="text" class="input" id="art_author" name="art_author" size="50" placeholder="文章作者" value="<?php echo $arr['art_author'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="title">文章类型</label></div>
                    <div class="field">
                    	<input type="radio" name="art_type" value="0" <?php if($arr['art_type']==0) echo "checked";?>/>普通文章<input type="radio" name="art_type" value="1" <?php if($arr['art_type']==1) echo "checked";?>/>推荐文章
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="title">文章图片</label></div>
                    <div class="field">
                        <input type="file" name="myfile" />
                        <img width="35" height="35" src="../upload/<?php echo $arr['art_img'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="keywords">是否显示</label></div>
                    <div class="field">
                    	<input type="radio" name="art_open" value="0" <?php if($arr['art_open']==0) echo "checked";?>/>显示<input type="radio" name="art_open" value="1" <?php if($arr['art_open']==1) echo "checked";?>/>隐藏
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="keywords">文章简介</label></div>
                    <div class="field">
                      <textarea name="description" cols="90" rows="5"><?php echo $arr['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label"><label for="keywords">文章内容</label></div>
                    <div class="field">
                     <!-- <script id="content" name="content" type="text/plain" style="width:1100px;height:600px;"></script> -->
                      <textarea name="content" id="content" style="width:100%; height:500px; "><?php echo $arr['content'];?></textarea>
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