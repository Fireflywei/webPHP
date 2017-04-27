<?php
/**
 * 文章详情页
 */
require_once 'include.php';
// $mem->flush();
$id = intval($_REQUEST['id']);
if(!$id){
	show_message("非法参数","index.php");
}

$article = $mem->get("article".$id);
if(empty($article)){
	$article = getResultInfo("bg_article","art_id={$id}");
	$mem->set("article".$id,$article,0,3600);
}
//memcache点击率
$clickNum = $mem->get("clickNum");
if(!$clickNum){
	$mem->set("clickNum",1,0,3600);
}else{
	$clickNum += 1;
	$mem->set("clickNum",$clickNum,0,3600);
	if($clickNum>10){
		$arr['click_count'] = $article['click_count']+10;
        update("bg_article",$arr,"art_id={$id}");
        $mem->set("clickNum",1,0,3600);
        $article['click_count'] += $clickNum;
        $mem->set("article".$id,$article,0,3600);
	}
}

$totalClickNum = $article['click_count']+$clickNum;




$smarty->assign("totalClickNum",$totalClickNum);
$smarty->assign("article",$article);
$smarty->display('new.htm');