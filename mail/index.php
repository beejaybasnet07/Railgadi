<?php
session_start();
include('smtp/PHPMailerAutoload.php');
include('database\dbcon.php');
echo"<script> alert('button clicked');</script>";
/*
$email=$_POST['receiver_email'];
$pname = $_POST['receiver_pname'];
$preference = $_POST['receiver_pre'];
$tname=$_POST['receiver_tname'];
$tdate=$_POST['receiver_tdate'];
$time=$_POST['receiver_time'];*/
$_SESSION['s_to'];
$_SESSION['s_from'];
$_SESSION['class'];	
$pname="bijayxxx";

/*$userdata='Dear '.$pname.'\ncode:\n '.$_SESSION['s_from'].'to'.$_SESSION['s_to'].'\n'.$tname.'\n'.$tdate .$time.'\nreport time 1 hours before';
*/
$html=$pname."\r\n".$_SESSION['s_to']."to".$_SESSION['s_from']."\n".$_SESSION['class'];	
 smtp_mailer('beejaybasnet01@gmail.com','subject',$html);
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
	$mail->Password = "kantipur@city234";
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
		echo"ERROR";
	}else{
		return 'Sent';
	}
}

?>