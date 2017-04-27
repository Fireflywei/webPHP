<?php
/**
 * 分页结果集
 * @param  [type] $table
 * @param  [type] $page
 * @param  [type] $size
 * @return [type]
 */
function getResultByPage($table,$page,$size){
	global $page;
	if($page<=0||$page==null||!is_numeric($page)){
		$page=1;
	}
	$sql = "select * from {$table}";
	$totalNum  = getResultNum($sql);
	//总页数
	global $totalPage;
	$totalPage = ceil($totalNum/$size);
	//偏移量
	$offset    = ($page-1)*$size;
	$sql = "select * from {$table} limit {$offset},{$size}";
	$result = getAll($sql);
	return $result;
}

/**
 * 分页函数
 * @param  [type] $page 
 * @param  [type] $totalPage
 */
function showPage($page,$totalPage){
	$url = $_SERVER[PHP_SELF];
	$index = ($page==1)?"":"<a href='{$url}?page=1'>首页</a>";
	$last  = ($page==$totalPage)?"":"<a href='{$url}?page={$totalPage}'>尾页</a>";
	$prev  = ($page==1)?"":"<a href='{$url}?page=".($page-1)."'>上一页</a>";
	$next  = ($page==$totalPage)?"":"<a href='{$url}?page=".($page+1)."'>下一页</a>";
	$str   = "总共{$totalPage}页/当前第{$page}页：";
	for($i=1;$i<=$totalPage;$i++){
		if($page==$i){
			$p.="[{$i}]";
		}else{
			$p.="<a href='{$url}?page={$i}'>[{$i}]</a>";
		}
	}

	return $str.$index.$prev.$p.$next.$last;
}