<?php
session_start();
include('database\dbcon.php');
if(isset($_POST['send'])){
$email=$_POST['receiver_email'];
$pname = $_POST['receiver_pname'];
$preference = $_POST['receiver_pre'];
$tname=$_POST['receiver_tname'];
$tdate=$_POST['receiver_tdate'];
$time=$_POST['receiver_time'];
$code=$_POST['code'];
$_SESSION['s_to'];
$_SESSION['s_from'];
$_SESSION['class'];	
}
?>
<?php
include('smtp/PHPMailerAutoload.php');
echo"<script> alert('button clicked');</script>";
$html="Dear,\r\n".$pname."\r\n Code:".$code."\r\n".$_SESSION['s_from']."\r\nto\r\n".$_SESSION['s_to']."\r\nClass:\r\n".$_SESSION['class']."\r\n".$preference.
$_SESSION['s_date']."\r\n".$time;	
 smtp_mailer($email,'subject',$html);
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
	$mail->Username = "your gmail";
	$mail->Password = "password";
	$mail->SetFrom("same gmail");
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