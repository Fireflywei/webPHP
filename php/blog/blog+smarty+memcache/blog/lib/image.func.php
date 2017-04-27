<?php
require_once 'string.func.php';
/**
 * 验证码
 * @param  integer $type 
 * @param  integer $length
 * @param  integer $pixel
 * @param  integer $line
 * @param  string  $sess_name 
 * @return [type]  string     
 */
function verifyImage($type=1,$length=4,$pixel=0,$line=0,$sess_name = "verify"){
	session_start();
	$width=80;
	$height=32;
	//通过GD库创建画布
	$image = imagecreatetruecolor($width, $height);
	$white = imagecolorallocate($image,255,255,255);
	$black = imagecolorallocate($image,0,0,0);
	//创建矩形填充
	imagefilledrectangle($image,1,1,$width-2,$height-2,$white);

	//随机数
	$chars = rangeString($type,$length);
	$_SESSION[$sess_name] = $chars;
	for($i=0;$i<=$length;$i++){
	$size = mt_rand(14,18);
	$x = 5+$i*$size;
	$y = mt_rand(1,$length/4);
	$color = imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
	$text = substr($chars,$i,1);
	imagestring($image,$size,$x,$y,$text,$color);
	}
	if($pixel){
		for($i=0;$i<=50;$i++){
		  imagesetpixel($image,mt_rand(1,$width-2),mt_rand(1,$height-2),$black);
		}
    }
	if($line){
		for($i=0;$i<=$line;$i++){
			$color = imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
			imageline($image, mt_rand(1,$width-2), mt_rand(1,$height-2), mt_rand(1,$width-2), mt_rand(1,$height-2), $color);
		}
    }
	ob_clean();
	header("content-type:image/gif");
	imagegif($image);
	imagedestroy($image);
}