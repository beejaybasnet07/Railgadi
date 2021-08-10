
<?php
/*
$to_email = "beejaybasnet01@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: beejay.basnet234@gmail.com";
echo mail($to_email, $subject, $body, $headers);
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}*/
?>
<?php

date_default_timezone_set('Asia/Kathmandu');
$new_time = date("Y-m-d H:i:s");
echo $new_time;
$ab="2021-08-10 9:49:29";
$timestamp1 = strtotime($new_time);
$timestamp2 = strtotime($ab);
if($timestamp1 >$timestamp2){
    echo "time finished";
}else{

    echo("time remaining");
}
?>