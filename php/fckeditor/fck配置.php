<?php
fckeditor 2.66�汾����
===============
0.��Ҫ����css
<link href="/fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />

1.editor/dialog/fck_image/fck_image_preview.html	����һ��Ӣ��
2.
	editor/dialog/fck_image/fck_image.js	
		�޸� �ϴ��ɹ�����ʾ
		�� case 203 :���������������
		

		case 204 :
			alert( "����ͼƬ��С������800K������!��ѡ��С��800K��ͼƬ�������ϴ�." );
		return;

		case 2044 :
			alert( "����ͼƬ��С,�����������ϴ���С����(2M),��ѡ���С�ļ��ϴ�." );
			return;


		case 20444 :
			alert( "����ͼƬ��С,�������ύ��С����,��ѡ���С�ļ��ϴ�." );
			return;



	editor\dialog\fck_flash\fck_flash.js �޸� �ϴ����ʹ������ʾ
	editor\dialog\fck_link\fck_link.js �޸� �ϴ����ʹ������ʾ

3.editor/filemanager/connectors/php/config.php 
		�޸� $Config['Enabled'] = true  Ϊ���ϴ�

		���� $Config['MaxImageSize']= '800';//(kb);//ͼƬ����ϴ���С����������

		���� $ConfigUploadFsDir="/upload/fckupload/".date("Y").'/'.date("m").'/'.date("d");//��������

		�޸� $Config['UserFilesPath'] = "http://127.0.0.1".$ConfigUploadFsDir."/";//����վ��·����Ե� web��ʾ��·��
		�޸� $Config['UserFilesAbsolutePath'] = dirname(__FILE__)."/../../../../../".$ConfigUploadFsDir."/" ;//�����ϴ�·��


4.editor/filemanager/connectors/php/commands.php
		�� $sFileName = $oFile['name'] ; �޸� $sFileName = time().".".strtolower(array_pop(explode(".",$oFile['name']))); //Ϊ������ʱ����ļ���

		�� $oFile = $_FILES['NewFile'] ;֮������

//�������ӣ�Ϊ���ϴ�ͼƬ��С����
if($_FILES['NewFile']['error']==1 ){
	$sErrorNumber = '2044' ;  //�����������ϴ���С����

}else if($_FILES['NewFile']['error']==2 ){
	$sErrorNumber = '20444' ;  //�������ύ��С����
	
}

if ( isset( $Config['MaxImageSize'] ) ){
	  $iFileSize = round( $oFile['size'] / 1024 );       
	  if($iFileSize > $Config['MaxImageSize'] ) {
		$sErrorNumber = '204' ;     
	  }
}

if(empty($sErrorNumber)){


���� ������������
		else
			$sErrorNumber = '202' ;
	}
	else
		$sErrorNumber = '202' ;
���
		else
			$sErrorNumber = '202' ;
}
	}
	else
		$sErrorNumber = '202' ;



5.fckconfig.js
	���� FCKConfig.ToolbarSets["Other"] Ϊ����������������

	

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
	['TextColor','BGColor']	// ��������.
] ;

6.
editor\dialog\fck_image\fck_image.js
editor\dialog\fck_flash\fck_flash.js
����window.onload�滻��
SelectField( 'txtUrl' ) ;
Ϊ��
dialog.SetSelectedTab( 'Upload' ) ;
SelectField( 'txtUploadFile' ) ;


//editor\dialog\fck_link\fck_link.js
//����window.onload������λ����β�����ϣ�
//dialog.SetSelectedTab( 'Upload' ) ;

Ϊ���ϴ����� ֱ���л��������ϴ�


7.alert( FCKeditorAPI.GetInstance('FCKeditor1').GetXHTML( true )) //��ñ༭������


8.�����ĿĬ�ϱ���Ϊgb2312/utf-8�����ֱ������⣬���԰�

Ϊ��ie
(1)
editor/lang/zh-cn.js 

editor/dialog/fck_image/fck_image.js
editor/dialog/fck_flash/fck_flash.js
editor/dialog/fck_link/fck_link.js
ת�������ޱ��� 


editor/fckeditor.html
��
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
�ĳ�
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

(2)editor/js/fckeditorcode_ie.js 
�ҵ� FCKXHtmlEntities.Entities=
�� '��':'divide' ֮���ע�͵�


(3) Ϊ�˻��
editor/js/fckeditorcode_gecko.js 
fckconfig.js
editor/dialog/common/fck_dialog_common.js
ת������ǩ����utf-8 Ϊ utf-8����



9.php����ʱ������
/*
/fckconfig.js ����������
/editor/filemanager/connectors/php/config.php �ϴ�������

$fckEditorName;//�ı�������
$fckEditorValue;//�ı����ʼֵ
$toolType;//���� ���ͣ�Other/Basic/Default
$w;//��
$h;//��
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
		$oFCKeditor->Config['FontNames']="����;����;����;����;�п�;Arial;Comic Sans MS;Courier New;Tahoma;Times New Roman;Verdana";
		$oFCKeditor->Config['FontSizes']="9px;10px;11px;12px;14px;16px;18px;24px;26px;28px;32px;smaller;larger;xx-small;x-small;small;medium;large;x-large;xx-large";
		$oFCKeditor->Config['EnterMode']="br";//����
		$oFCKeditor->Config['ShiftEnterMode']="p";
		$oFCKeditor->Config['LinkBrowser']=false;//���η��������
		$oFCKeditor->Config['ImageBrowser']=false;//���η��������
		$oFCKeditor->Config['FlashBrowser']=false;//���η��������
		$oFCKeditor->Config['LinkUpload']=false;//�ر������ϴ�����
		//$oFCKeditor->Config['LinkUploadAllowedExtensions']=array();//�������� �����ϴ��ļ�����չ��
		//$oFCKeditor->Config['LinkUploadDeniedExtensions']=array() ;//�������� �����ϴ��ű��ļ�����չ��

		$oFCKeditor->Config['ImageUploadAllowedExtensions']= ".(jpg|gif|png)$";   //���������ϴ�ͼƬ�ļ�����չ��   
		$oFCKeditor->Config['ImageUploadDeniedExtensions']= "" ;    //���������ϴ�ͼƬ�ű��ļ�����չ��   
		 

		$oFCKeditor->Config['FlashUpload']=false;//�ر�flash�ϴ�����
		//$oFCKeditor->Config['FlashUploadAllowedExtensions']=array();//�������� �����ϴ��ļ�����չ��
		//$oFCKeditor->Config['FlashUploadDeniedExtensions']=array() ;//�������� �����ϴ��ű��ļ�����չ��


		$oFCKeditor->Config['LinkDlgHideTarget']=true;//����Link���ڵ�target��ǩ   
		$oFCKeditor->Config['LinkDlgHideAdvanced']=true;//����Link���ڵ�advanced��ǩ 
		$oFCKeditor->Config['ImageDlgHideLink']=true;//����image���ڵ�link��ǩ   
		$oFCKeditor->Config['ImageDlgHideAdvanced']=true;//����image���ڵ�advanced��ǩ 
		$oFCKeditor->Config['FlashDlgHideAdvanced']=true;//����Flash���ڵ�advanced��ǩ 

		$oFCKeditor->Config['FirefoxSpellChecker']=true;//���ƴд���

		Return $oFCKeditor->CreateHtml() ;
}
?>