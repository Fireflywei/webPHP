<?php
require_once '../include.php';
$act = $_REQUEST['act'];
if($act=="login")
{
	$username = $_POST['admin'];
	$password = base64_encode($_POST['password']);
	$verify = $_POST['verify'];
	$verify1 = $_SESSION['verify'];
	$autoFlag = $_POST['autoFlag'];
	if($verify != $verify1){
		show_message("验证码错误","index.php");
	}else{
		$sql = "select * from bg_admin where u_username = '{$username}' and u_password = '{$password}'";
		$result = getOne($sql);
		if($result){
		   if($autoFlag){
		   	  setcookie("adminId",$result['u_id'],time()+7*24*3600);
		   	  setcookie("adminName",$result['u_username'],time()+7*24*3600);
		   }
		   $arr['visit_count'] = $result['visit_count']+1;
		   $arr['login_time']  = time();
		   update("bg_admin",$arr,"u_id={$result['u_id']}");
		   $_SESSION['adminName'] = $result['u_username'];
		   $_SESSION['adminId'] = $result['u_id'];
		   $_SESSION['visit_count'] = $arr['visit_count'];
		   $_SESSION['login_time'] = $result['login_time'];
           show_message("登录成功","main.php");
		}else{
           show_message("登录失败","index.php");
		}
	}
}
elseif($act=="logout")
{
	$_SESSION = array();
	if($_COOKIE[session_name()] != ""){
		setcookie(session_name(),"",time()-1);
	}
	if($_COOKIE['adminId'] != ""){
		setcookie("adminId","",time()-1);
	}
	if($_COOKIE['adminName'] != ""){
		setcookie("adminName","",time()-1);
	}
	session_destroy();
	header("location:index.php");
}
elseif($act=="addAdmin")
{
	$arr['u_username'] = $_POST['u_username'];
	$password          = $_POST['u_password'];
	$password1         = $_POST['u_password1'];
	$arr['u_tel']      = $_POST['u_tel'];
	$arr['u_email']    = $_POST['u_email'];
	$arr['login_time'] = time();
	$arr['visit_count'] = 0;
    $arr['u_password']  = base64_encode($_POST['u_password']);
    if($password != $password1){
    	show_message("两次密码输入不一致","addAdmin.php");
    }
	$result = insert("bg_admin",$arr);
	if($result){
		show_message("添加管理员成功","listAdmin.php");
	}else{
		show_message("添加管理员失败","listAdmin.php");
	}
}
elseif($act=="editAdmin")
{
	$id = $_GET['id'];
	$arr = $_POST;
	$arr['u_password'] = base64_encode($_POST['u_password']);
	if(update("bg_admin",$arr,"u_id={$id}")){
		show_message("修改管理员成功","listAdmin.php");
	}else{
		show_message("修改管理员失败","listAdmin.php");
	}
}
elseif($act=="delAdmin")
{
	$ckid = $_REQUEST['ckid'];
    if(!empty($ckid)){
       for($i=0;$i<count($ckid);$i++){
       	  $res = delete("bg_admin","u_id={$ckid[$i]}");
       	  if($res){
       	  	show_message("批量删除成功","listAdmin.php");
       	  }else{
       	  	show_message("批量删除失败","listAdmin.php");
       	  }
       }
    }else{
	$id = $_GET['id'];
	if(delete("bg_admin","u_id={$id}")){
		show_message("删除管理员成功","listAdmin.php");
	}else{
		show_message("删除管理员失败","listAdmin.php");
	}
 }
}
elseif($act=="addCate")
{
   $cate = $_POST;
   if(insert("bg_category",$cate)){
   	 show_message("添加分类成功","listCate.php");
   }else{
   	 show_message("添加分类失败","listCate.php");
   }
}
elseif($act=="editCate")
{
	$id = $_REQUEST['id'];
	$cate = $_POST;
	if(update("bg_category",$cate,"cat_id={$id}")){
		show_message("修改分类成功","listCate.php");
	}else{
		show_message("修改分类失败","listCate.php");
	}
}
elseif($act=="delCate")
{
	$id = $_REQUEST['id'];
	if(delete("bg_category","cat_id={$id}")){
		show_message("删除分类成功","listCate.php");
	}else{
		show_message("删除分类失败","listCate.php");
	}
}
elseif($act=="addArticle")
{
	$file = $_FILES['myfile'];
	$arr = $_POST;
	$arr['art_img'] = uploadImage($file);
	$arr['add_time'] = time();
    $arr['click_count'] = '0';
    // $arr['content'] = htmlspecialchars($_POST['content']);
    $result = insert("bg_article",$arr);
    if($result){
    	show_message("添加文章成功","listArticle.php");
    }else{
        show_message("添加文章失败","listArticle.php");
    }
}
elseif($act=="editArticle")
{
	$id = $_REQUEST['id'];
	$arr = $_POST; 
	$file = $_FILES['myfile'];
	// $arr['content'] = htmlspecialchars($_POST['content']);
	$article = getResultInfo("bg_article","art_id={$id}");
	//判断图片是否重新上传
	if($file['error']==4){
      $arr['art_img'] = $article['art_img'];
	}else{
	  $arr['art_img'] = uploadImage($file);
	  @unlink("../upload/".$article['art_img']);
	}

	$res = update("bg_article",$arr,"art_id={$id}");
	if($res){
		show_message("修改文章成功","listArticle.php");
	}else{
		show_message("修改文章失败","listArticle.php");
	}

}
elseif($act=="delArticle")
{
	$id = $_REQUEST['id'];
	$article = getResultInfo("bg_article","art_id={$id}");
    if(delete("bg_article","art_id={$id}")){
    	@unlink("../upload/".$article['art_img']);
       show_message("删除文章成功","listArticle.php");
    }else{
    	show_message("删除文章失败","listArticle.php");
    }

}
elseif($act=="checkAdmin")
{
	$username = $_REQUEST['username'];
	$sql = "select * from bg_admin where u_username = '{$username}'";
	$res = getAll($sql);
	if($res){
		echo '1';
	}else{
		echo "0";
	}
	//echo json_encode($username);
}