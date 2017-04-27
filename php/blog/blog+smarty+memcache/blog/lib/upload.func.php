<?php
/**
 * 图片上传
 * @param  [type]  $fileInfo
 * @param  string  $path
 * @param  array   $allowFiles
 * @param  string  $allowSize
 * @param  boolean $imgflag
 * @return [type]
 */
function uploadImage($fileInfo,$path = "../upload",$allowFiles = array("jpg","jpeg","gif","png"),$allowSize = '2097152',$imgflag=true){
	if($fileInfo['error'] == UPLOAD_ERR_OK){
	   // $allowFiles = array("jpg","jpeg","gif","png");
	   $Ext = Ext($fileInfo['name']);
	   //判断文件格式是否合法
	   if(!in_array($Ext,$allowFiles)){
	   	 exit("不允许上传的文件格式");
	   }
	   //判断上传大小
	   if($fileInfo['size']>$allowSize){
	   	 exit("文件过大");
	   }
	   //判断是否是图片
	   if($imgflag){
		   $imginfo = getimagesize($fileInfo['tmp_name']);
		   if(!$imginfo){
		   	  exit("上传的不是真正的图片");
		   }
	    }
	   //判断是否是HTTP post提交
	   if(is_uploaded_file($fileInfo['tmp_name'])){
	      if(!file_exists($path)){
	         mkdir($path,0777,true);
	         chmod($path,0777);
	      }
	      $fileNewName = getNiuName().".".$Ext;
	      $pathName = $path."/".$fileNewName;
	      if(move_uploaded_file($fileInfo['tmp_name'],$pathName)){
	         return $fileNewName;
	      }else{
	      	exit("上传失败");
	      }

	   }else{
	   	  exit("不是通过HTTP POST方式提交");
	   }

	}else{
		switch ($fileInfo['error']) {
			case '1'://UPLOAD_ERR_INI_SIZE
				exit("超过了配置文件大小");
				break;
		    case '2'://UPLOAD_ERR_FORM_SIZE
		        exit("超过了表单配置大小");
		        break;
		    case '3'://UPLOAD_ERR_PARTIAL
		        exit("部分文件被上传");
		        break;
		    case '4'://UPLOAD_ERR_NO_FILE
		        exit("没有文件被上传");
		        break;
		    case '6'://UPLOAD_ERR_NO_TMP_DIR
		        exit("没有找到零时目录");
		        break;
		    case '7'://UPLOAD_ERR_CANT_WRITE
		        exit("文件不可写");
		        break;
		    case '8'://UPLOAD_ERR_PARTIAL
		        exit("PHP扩展程序阻止了文件上传");
		        break;

		}
	}
}
/**
 * 获得图片后缀名
 * @param [type] $fileName
 */
function Ext($fileName){
	$a = explode(".",$fileName);
    $Ext = end($a);
    return $Ext;
}
/**
 * 生成唯一图片名称
 * @return [type]
 */
function getNiuName(){
	return md5(uniqid(microtime(true),true));
}