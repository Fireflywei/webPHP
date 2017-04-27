<?php

$theam=$_POST["theam"];
$content=$_POST["content"];
$companyname=$_POST["companyname"];
$address=$_POST["address"];
$postcode=$_POST["postcode"];
$contactor=$_POST["contactor"];
$mobiled=$_POST["mobiled"];
$mobiles=$_POST["mobiles"];
$fax=$_POST["fax"];
$email=$_POST["email"];

if(empty($theam)){
	echo ("<script type='text/javascript'> alert('主题不能为空');history.go(-1);</script>");
}
elseif(empty($content)){
	echo ("<script type='text/javascript'> alert('内容不能为空');history.go(-1);</script>");
}
elseif(empty($contactor)){
	echo ("<script type='text/javascript'> alert('联系人不能为空');history.go(-1);</script>");
}
elseif(empty($mobiled)){
	echo ("<script type='text/javascript'> alert('电话不能为空');history.go(-1);</script>");
}
elseif(empty($email)){
	echo ("<script type='text/javascript'> alert('邮箱不能为空');history.go(-1);</script>");
}
else
{

require_once('email.class.php');
//##########################################
$smtpserver = "smtp.163.com";//SMTP服务器
$smtpserverport =25;//SMTP服务器端口
$smtpusermail = "zhangchao3438@163.com";//SMTP服务器的用户邮箱
$smtpemailto = "zhoulong880@sohu.com";//发送给谁
$smtpuser = "zhangchao3438";//SMTP服务器的用户帐号
$smtppass = "3277719";//SMTP服务器的用户密码
$mailsubject = "主题";//邮件主题
$mailbody = "主题:".$theam."<br>"."内容:".$content."<br>"."公司名称:".$companyname."<br>"."公司地址:".$address."<br>"."邮编:".$postcode."<br>"."联系人:".$contactor."<br>"."联系电话:".$mobiled."<br>"."手机:".$mobiles."<br>"."联系传真:".$fax."<br>"."E-mail:".$email;//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
##########################################
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
$smtp->debug = true;//是否显示发送的调试信息
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
echo "发送成功";
echo "<script>location.href='/index.html';</script>";
}
?>