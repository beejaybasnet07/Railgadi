<?php
$to_email = "beejaybasnet01@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: beejay.basnet234@gmail.com";
echo mail($to_email, $subject, $body, $headers);
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
?>