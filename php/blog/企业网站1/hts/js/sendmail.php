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
	echo ("<script type='text/javascript'> alert('���ⲻ��Ϊ��');history.go(-1);</script>");
}
elseif(empty($content)){
	echo ("<script type='text/javascript'> alert('���ݲ���Ϊ��');history.go(-1);</script>");
}
elseif(empty($contactor)){
	echo ("<script type='text/javascript'> alert('��ϵ�˲���Ϊ��');history.go(-1);</script>");
}
elseif(empty($mobiled)){
	echo ("<script type='text/javascript'> alert('�绰����Ϊ��');history.go(-1);</script>");
}
elseif(empty($email)){
	echo ("<script type='text/javascript'> alert('���䲻��Ϊ��');history.go(-1);</script>");
}
else
{

require_once('email.class.php');
//##########################################
$smtpserver = "smtp.163.com";//SMTP������
$smtpserverport =25;//SMTP�������˿�
$smtpusermail = "zhangchao3438@163.com";//SMTP���������û�����
$smtpemailto = "zhoulong880@sohu.com";//���͸�˭
$smtpuser = "zhangchao3438";//SMTP���������û��ʺ�
$smtppass = "3277719";//SMTP���������û�����
$mailsubject = "����";//�ʼ�����
$mailbody = "����:".$theam."<br>"."����:".$content."<br>"."��˾����:".$companyname."<br>"."��˾��ַ:".$address."<br>"."�ʱ�:".$postcode."<br>"."��ϵ��:".$contactor."<br>"."��ϵ�绰:".$mobiled."<br>"."�ֻ�:".$mobiles."<br>"."��ϵ����:".$fax."<br>"."E-mail:".$email;//�ʼ�����
$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
##########################################
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.
$smtp->debug = true;//�Ƿ���ʾ���͵ĵ�����Ϣ
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
echo "���ͳɹ�";
echo "<script>location.href='/index.html';</script>";
}
?>