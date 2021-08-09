<?php

$email=$_POST["useremail"];
$pname = $_POST["username"];
$preference = $_POST['userpre'];
$tname=$_POST['usertrain'];
$tdate=$_POST['userdate'];
$time=$_POST['usertime'];
$code=$_POST['code'];
$sto=$_POST['userto'];
$sfrom=$_POST['userfrom'];
$class=$_POST['userclass'];
?>

<?php
include('smtp/PHPMailerAutoload.php');
echo"<script> alert('button clicked');</script>";
$html="Dear,\r\n".$pname."\r\n Code:".$code."\r\n".$sfrom."\r\nto\r\n".$sto."\r\nClass:\r\n".$class."\r\n".$preference."\r\n".
$tdate."\r\n".$time;	
 smtp_mailer($email,'Train Ticket Details',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "beejay.basnet234@gmail.com";
	$mail->Password = "password";
	$mail->SetFrom("beejay.basnet234@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo"0";
	}else{
		echo"1";
	}
}

?>