<?php
/**
 * 自定义打印函数
 * @param  [type] $data 
 * @return array
 */
function p($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
/**
 * 信息提示
 * @param  [type] $msg
 * @param  [type] $url
 */
function show_message($msg,$url){
	echo "<script>alert('{$msg}');</script>";
	echo "<script>window.location='{$url}';</script>";
}

function checkLogin(){
	if($_SESSION['adminId'] == "" && $_COOKIE['adminId'] == ""){
		show_message("您还没有登录，请先登录","index.php");
	}
}
/**
 * 文章分页结果集
 * @param  [type] $table
 * @param  [type] $page
 * @param  [type] $size
 * @return [type]
 */
function getArticleByPage($page,$size){
	global $page;
	if($page<=0||$page==null||!is_numeric($page)){
		$page=1;
	}
	$sql = "select A.*,B.cat_name from bg_article A,bg_category B where A.cat_id = B.cat_id";
	$totalNum  = getResultNum($sql);
	//总页数
	global $totalPage;
	$totalPage = ceil($totalNum/$size);
	//偏移量
	$offset    = ($page-1)*$size;
	$sql = "select A.*,B.cat_name from bg_article A,bg_category B where A.cat_id = B.cat_id limit {$offset},{$size}";
	$result = getAll($sql);
	return $result;
}