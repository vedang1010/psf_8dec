<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/punese3g/PHPMailerTest/PHPMailer/src/Exception.php';
require '/home/punese3g/PHPMailerTest/PHPMailer/src/PHPMailer.php';
require '/home/punese3g/PHPMailerTest/PHPMailer/src/SMTP.php';

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2; // Enable verbose debug output
 $mail->isSMTP(); // Set mailer to use SMTP
 $mail->Host = 'punestartupfest.in'; // Specify main and backup SMTP servers
 $mail->SMTPAuth = true; // Enable SMTP authentication
 $mail->Username = 'querysender@punestartupfest.in'; // SMTP username
 $mail->Password = 'queryme@2k21'; // SMTP password
 $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
 $mail->Port = 465; // TCP port to connect to

//Recipients
 $mail->setFrom('querysender@punestartupfest.in');
 $mail->addAddress('queries.psf@gmail.com'); // Add a recipient
//  $mail->addAddress('recipient2@example.com'); // Name is optional
 $mail->addReplyTo('viren.p2000@gmail.com');
//  $mail->addCC('cc@example.com');
//  $mail->addBCC('bcc@example.com');

// Attachments
//  $mail->addAttachment('/home/cpanelusername/attachment.txt'); // Add attachments
//  $mail->addAttachment('/home/cpanelusername/image.jpg', 'new.jpg'); // Optional name

// Content
 $mail->isHTML(true); // Set email format to HTML
 $mail->Subject = 'Here is the subject';
 $mail->Body = 'This is the HTML message body <b>in bold!</b>';
 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
 echo 'Message has been sent';

} catch (Exception $e) {
 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
