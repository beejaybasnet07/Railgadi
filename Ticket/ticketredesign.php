<?php

include('database\dbcon.php');
include('..\inc\header.php');
$tire = "AC 3 Tire (3A) | HIGH CLASS";
$tname = "Sagarmath Express";
$tnumber = 1220;
$date = 2021 - 5 - 30;
$_to = "KATHMANDU";
$_from = "BIRATNAGAR";
echo"<script> alert('done');</script>";
?>
<div class="container">

    <!-- <div class="row">
        <div class="col-5 offset-1 "><img src="../images/logo1.jpg" height="200px;"></div>

    </div>-->


    <div class="row" id="cong">

        <div class="row">
           <div class="col" id="congru">
        <h1 style="color: greenyellow;">Congratulations your booking is successful</h1>
        </div>
        </div>
        <div class="row">
           <div class="col">
           <h5> Please carry required verification documents for validation.</h5>
        </div>
        </div>
        
        
    </div>
    <div class="row">
        <div class="col-4 offset-2" id="con1">
            <div class="row">
                <div class="col offset-1">
                    <h2> Passenger's Details</h2>
                    <hr>
                </div>

            </div>
            <div class="row ">
                <div class="col pl-5">
                    <h5>Passenger </h5>
                    <h3> Bijay Basnet</h3>
                </div>
            </div>
            <div class="row">
                <div class="col pl-5">
                    <h5>No. of travellers</h5>
                    <h3> 34</h3>
                </div>


                <div class="col">
                    <h5> phone</h5>
                    <h3>98484949</h3>
                </div>
            </div>
            <div class="row">
                <div class="col pl-5">
                    <h5> Age</h5>
                    <h3>24</h3>
                </div>


                <div class="col ">
                    <h5> Gender</h5>
                    <h3>Male</h3>
                </div>
            </div>
            <div class="row">
                <div class="col pl-5">
                    <h5>Email</h5>
                    <h4>bijay@gmail.com </h4>
                </div>
            </div>


        </div>
        <div class="col-5  " id="con2">

            <div class="row">
                <div class="col offset-1">
                    <h2> <i class="fa fa-train" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp; Journey Details</h2>
                    <hr>
                </div>

            </div>

            <div class="row">
                <div class="col pl-5">

                    <h3><?php echo $_from; ?>&nbsp;&nbsp;<i class="far fa-arrow-alt-circle-right"></i>&nbsp;&nbsp;<?php echo $_to; ?> </h3>
                </div>
            </div>
            <div class="row">
                <div class="col pl-5">
                    <h5>Number</h5>
                    <h3> <?php echo $tnumber; ?> </h3>
                </div>
                <div class="col">
                    <h5>Date</h5>
                    <h3> <?php echo $date; ?> </h3>
                </div>

            </div>
            <div class="row">
                <div class="col pl-5">
                    <h5> Seat Number</h5>
                    <h3> 34</h3>
                </div>


                <div class="col">
                    <h5> Berth</h5>
                    <h3>lower berth </h3>
                </div>
            </div>
            <div class="row">
                <div class="col pl-5">
                    <h5>Class</h5>
                    <h4><?php echo $tire; ?> </h4>
                </div>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col offset-3">
        <h5 style="color: red;"> ** Please be at boarding station ahead of depature time.</h5>
        </div>
    </div>
</div><!--
color: #606770;
    font-family: SFProText-Regular, Helvetica, Arial, sans-serif;
    font-size: 15px;
    line-height: 24px;
    margin-bottom: 12px;


    font-family: SFProDisplay-Regular, Helvetica, Arial, sans-serif;
    font-size: 28px;
    font-weight: normal;
    line-height: 32px
    color: #1c1e21;
    
    font-family: SFProDisplay-Regular, Helvetica, Arial, sans-serif;
    font-size: 28px;
    font-weight: normal;
    line-height: 32px;
    width: 500px;
    include('smtp/PHPMailerAutoload.php');
echo"<script> alert('button clicked');</script>";
$html="Dear,\r\n".$pname."\r\n Code:".$code."\r\n".$sfrom."\r\nto\r\n".$sto."\r\nClass:\r\n".$class."\r\n".$preference.
$tdate."\r\n".$time;	
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
	$mail->Username = "beejay.basnet234@gmail.com";
	$mail->Password = "s@animabank0455";
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
		 echo $mail->ErrorInfo;
	}else{
		echo 1;
	}
}