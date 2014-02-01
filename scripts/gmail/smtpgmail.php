<?php
include "classes/class.phpmailer.php"; // include the class name
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "junoforever1991@gmail.com";
$mail->Password = "mastermind1991";
$mail->SetFrom("junoforever1991@gmail.com");
$mail->Subject = "Your Gmail SMTP Mail";
$mail->Body = "<b>Hi, your first SMTP mail via gmail server has been received. Great Job!.. <br/><br/>from Abhiroop</b>";
$mail->AddAddress("durden1704@gmail.com");
 if(!$mail->Send()){
	echo "Mailer Error: " . $mail->ErrorInfo;
}
else{
	echo "Message has been sent";
}
?>