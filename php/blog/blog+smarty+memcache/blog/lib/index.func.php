<?php

/**
 * 获得所有分类
 * @return [type]
 */
function getAllCates(){
	$sql = "select * from bg_category";
	$cates = getAll($sql);
	return $cates;
}
/**
 * 获取所有文章
 * @return [type]
 */
function getAllActicle(){
	$sql = "select A.*,B.cat_name from bg_article A,bg_category B where A.cat_id = B.cat_id";
	$res = getAll($sql);
	return $res;
}
/**
 * 获取最新文章
 * @return [type]
 */
function getNewAtricle(){
	$sql = "select art_id,art_title from bg_article order by art_id desc";
	$res = getAll($sql);
	return $res;
}