<?php	

/**
 * 得到所有结果集
 * @return array
 */
function getAllResult($table){
	$sql = "select * from {$table}";
	$result = getAll($sql);
	return $result;
}
/**
 * 得到管理员详细信息
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function getResultInfo($table,$where){
	$sql = "select * from {$table} where {$where}";
	$result = getOne($sql);
	return $result;
}