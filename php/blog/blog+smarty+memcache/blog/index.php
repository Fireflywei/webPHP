<?php	
/**
 * 前台首页
 */
require_once 'include.php';
// $mem->flush();
//分类
$cates = $mem->get("cates");
if(!$cates)
{
	$cates   = getAllCates();
	$mem->set("cates",$cates,0,3600);
}


//文章列表
// $article = $mem->get("article");
// if(!$article){
// 	$article = getAllActicle();
// 	$mem->set("article",$article,0,3600);
// }
 
//memcache文章列表分页
$size = 2;
$page = isset($_REQUEST['page'])?$_REQUEST['page']:1;
$article  = $mem->get("article".$page.$size);
$pageinfo = $mem->get("pageinfo".$page.$size);
if(!$article || !$pageinfo){
	$article = getArticleByPage($page,$size);
    $mem->set("article".$page.$size,$article,0,3600);
    $pageinfo = showPage($page,$totalPage);
    $mem->set("pageinfo".$page.$size,$pageinfo,0,3600);
}


//最新文章
$new_article = $mem->get("new_article");
if(!$new_article){
	$new_article  = getNewAtricle();
	$mem->set("new_article",$article,0,3600);
}

$smarty->assign("pageinfo",$pageinfo);
$smarty->assign("new_article",$new_article);
$smarty->assign("article",$article);
$smarty->assign("cates",$cates);
$smarty->assign("name","如影随形");//赋值
$smarty->display('index.htm');//加载模板
