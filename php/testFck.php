<html>
<head>
<meta charset="utf-8">
</head>

<body>
<?php
/*
/fckconfig.js 工具栏配置
/editor/filemanager/connectors/php/config.php 上传等配置


$fckEditorName;//文本框名称
$fckEditorValue;//文本框初始值
$toolType;//工具 类型：Other/Basic/Default
$w;//宽
$h;//高
*/
function getFck($fckEditorName="fckEditorName",$fckEditorValue="",$toolType='Other',$w=700,$h=300){
	/**
	* @定义fck的配置变量
	*/
	require_once(dirname(__FILE__)."/fckeditor/fckeditor.php") ;


	/*$sBasePath = $_SERVER['PHP_SELF'] ;
	$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;*/
	$sBasePath ="http://".$_SERVER['HTTP_HOST']."/fckeditor/";

	$oFCKeditor = new FCKeditor($fckEditorName) ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->ToolbarSet	= $toolType;
	$oFCKeditor->Value		= $fckEditorValue ;


	$oFCKeditor->Width=$w;
	$oFCKeditor->Height=$h;
		;

	$oFCKeditor->Config['DefaultLanguage']="zh-cn";
	$oFCKeditor->Config['FontNames']="宋体;楷体;黑体;隶书;行楷;Arial;Comic Sans MS;Courier New;Tahoma;Times New Roman;Verdana";
	$oFCKeditor->Config['FontSizes']="9px;10px;11px;12px;14px;16px;18px;24px;26px;28px;32px;smaller;larger;xx-small;x-small;small;medium;large;x-large;xx-large";
	$oFCKeditor->Config['EnterMode']="br";//换行
	$oFCKeditor->Config['ShiftEnterMode']="p";
	$oFCKeditor->Config['LinkBrowser']=false;//屏蔽服务器浏览
	$oFCKeditor->Config['ImageBrowser']=false;//屏蔽服务器浏览
	$oFCKeditor->Config['FlashBrowser']=false;//屏蔽服务器浏览
	$oFCKeditor->Config['LinkUpload']=false;//关闭连接上传功能
	//$oFCKeditor->Config['LinkUploadAllowedExtensions']=array();//设置连接 允许上传文件的扩展名
	//$oFCKeditor->Config['LinkUploadDeniedExtensions']=array() ;//设置连接 允许上传脚本文件的扩展名

	$oFCKeditor->Config['ImageUploadAllowedExtensions']= ".(jpg|gif|png)$";   //设置允许上传图片文件的扩展名   
	$oFCKeditor->Config['ImageUploadDeniedExtensions']= "" ;    //设置允许上传图片脚本文件的扩展名   
	 

	$oFCKeditor->Config['FlashUpload']=false;//关闭flash上传功能
	//$oFCKeditor->Config['FlashUploadAllowedExtensions']=array();//设置连接 允许上传文件的扩展名
	//$oFCKeditor->Config['FlashUploadDeniedExtensions']=array() ;//设置连接 允许上传脚本文件的扩展名


	$oFCKeditor->Config['LinkDlgHideTarget']=true;//隐藏Link窗口的target标签   
	$oFCKeditor->Config['LinkDlgHideAdvanced']=true;//隐藏Link窗口的advanced标签 
	$oFCKeditor->Config['ImageDlgHideLink']=true;//隐藏image窗口的link标签   
	$oFCKeditor->Config['ImageDlgHideAdvanced']=true;//隐藏image窗口的advanced标签 
	$oFCKeditor->Config['FlashDlgHideAdvanced']=true;//隐藏Flash窗口的advanced标签 

	$oFCKeditor->Config['FirefoxSpellChecker']=true;//火狐拼写检查

	Return $oFCKeditor->CreateHtml() ;
}

echo getFck();
?>


</body>
</html>