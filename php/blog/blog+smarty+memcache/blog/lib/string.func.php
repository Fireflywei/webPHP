<?php	
/**
 * 产生随机字符串
 * @param  integer $type  类型（1,2,3）
 * @param  integer $length 长度
 * @return string
 */
function rangeString($type=1,$length=4){
	if($type==1){
		$chars = join("",range(0,9));
	}elseif($type==2){
		$chars = join("",array_merge(range("a","z"),range("A","Z")));
	}elseif($type==3){
		$chars = join("",array_merge(range(0,9),range("a","z"),range("A","Z")));
	}
	$chars = str_shuffle($chars);
	$chars = substr($chars,0,$length);
	return $chars;
}