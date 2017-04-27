<?php
fckeditor 2.66版本设置
===============
0.需要载入css
<link href="/fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />

1.editor/dialog/fck_image/fck_image_preview.html	隐藏一段英文
2.
	editor/dialog/fck_image/fck_image.js	
		修改 上传成功的提示
		在 case 203 :结束后面加入以下
		

		case 204 :
			alert( "您的图片大小超过了800K的限制!请选择小于800K的图片并重新上传." );
		return;

		case 2044 :
			alert( "您的图片大小,超出服务器上传大小设置(2M),请选择较小文件上传." );
			return;


		case 20444 :
			alert( "您的图片大小,超出表单提交大小设置,请选择较小文件上传." );
			return;



	editor\dialog\fck_flash\fck_flash.js 修改 上传类型错误的提示
	editor\dialog\fck_link\fck_link.js 修改 上传类型错误的提示

3.editor/filemanager/connectors/php/config.php 
		修改 $Config['Enabled'] = true  为了上传

		增加 $Config['MaxImageSize']= '800';//(kb);//图片最大上传大小，范申增加

		增加 $ConfigUploadFsDir="/upload/fckupload/".date("Y").'/'.date("m").'/'.date("d");//范申增加

		修改 $Config['UserFilesPath'] = "http://127.0.0.1".$ConfigUploadFsDir."/";//和网站根路径相对的 web显示用路径
		修改 $Config['UserFilesAbsolutePath'] = dirname(__FILE__)."/../../../../../".$ConfigUploadFsDir."/" ;//绝对上传路径


4.editor/filemanager/connectors/php/commands.php
		把 $sFileName = $oFile['name'] ; 修改 $sFileName = time().".".strtolower(array_pop(explode(".",$oFile['name']))); //为了生成时间戳文件名

		在 $oFile = $_FILES['NewFile'] ;之后增加

//范申增加，为了上传图片大小限制
if($_FILES['NewFile']['error']==1 ){
	$sErrorNumber = '2044' ;  //超出服务器上传大小设置

}else if($_FILES['NewFile']['error']==2 ){
	$sErrorNumber = '20444' ;  //超出表单提交大小设置
	
}

if ( isset( $Config['MaxImageSize'] ) ){
	  $iFileSize = round( $oFile['size'] / 1024 );       
	  if($iFileSize > $Config['MaxImageSize'] ) {
		$sErrorNumber = '204' ;     
	  }
}

if(empty($sErrorNumber)){


并且 下面加入大括号
		else
			$sErrorNumber = '202' ;
	}
	else
		$sErrorNumber = '202' ;
变成
		else
			$sErrorNumber = '202' ;
}
	}
	else
		$sErrorNumber = '202' ;



5.fckconfig.js
	增加 FCKConfig.ToolbarSets["Other"] 为了其他工具栏内容

	

FCKConfig.ToolbarSets["Other"] = [
	['Source','FitWindow','-','NewPage','Preview','-','Templates'],
	['Cut','Copy','Paste','PasteText','PasteWord'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	['Image','Table','Rule','Smiley','SpecialChar','PageBreak','ShowBlocks'],
	'/',
	['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
	['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote','CreateDiv'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
	['Link','Unlink','Anchor'],
	'/',
	['Style','FontFormat','FontName','FontSize'],
	['TextColor','BGColor']	// 范申增加.
] ;

6.
editor\dialog\fck_image\fck_image.js
editor\dialog\fck_flash\fck_flash.js
查找window.onload替换：
SelectField( 'txtUrl' ) ;
为：
dialog.SetSelectedTab( 'Upload' ) ;
SelectField( 'txtUploadFile' ) ;


//editor\dialog\fck_link\fck_link.js
//查找window.onload并定到位函数尾，加上：
//dialog.SetSelectedTab( 'Upload' ) ;

为了上传界面 直接切换到本地上传


7.alert( FCKeditorAPI.GetInstance('FCKeditor1').GetXHTML( true )) //获得编辑器内容


8.如果项目默认编码为gb2312/utf-8，出现编码问题，尝试把

为了ie
(1)
editor/lang/zh-cn.js 

editor/dialog/fck_image/fck_image.js
editor/dialog/fck_flash/fck_flash.js
editor/dialog/fck_link/fck_link.js
转换成亚洲编码 


editor/fckeditor.html
中
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
改成
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

(2)editor/js/fckeditorcode_ie.js 
找到 FCKXHtmlEntities.Entities=
把 '÷':'divide' 之后的注释掉


(3) 为了火狐
editor/js/fckeditorcode_gecko.js 
fckconfig.js
editor/dialog/common/fck_dialog_common.js
转换包含签名的utf-8 为 utf-8编码



9.php调用时的配置
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

		require_once(dirname(__FILE__)."/fckeditor/fckeditor.php") ;

		/*$sBasePath = $_SERVER['PHP_SELF'] ;
		$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;*/
		//$sBasePath =Project::singleton()->getConfig('customConfig.managesRootUrl')."/fckeditor/";
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
?>