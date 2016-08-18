<?php
require 'PHPMailerAutoload.php';
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));


$mail = new PHPMailer;



$mail->SMTPDebug = 3;                               // Enable verbose debug output



$mail->isSMTP();                                      // Set mailer to use SMTP

$mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers

$mail->SMTPAuth = true;                               // Enable SMTP authentication

$mail->Username = 'some@some.com';                 // SMTP username

$mail->Password = 'password';                           // SMTP password

$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

$mail->Port = 25;                                    // TCP port to connect to



$mail->setFrom($email_address, 'Mailer');     //
$mail->addAddress('some@some.com', 'Name');     // Add a recipient
     
$mail->Subject = $name;
$mail->Body = "Mi número es: ".$phone." <br> Mi correo es: ".$email_address." <br> ".$message;;

$mail->isHTML(true);                                  // Set email format to HTML

if(!$mail->send()) {

    echo 'Message could not be sent.';

    echo 'Mailer Error: ' . $mail->ErrorInfo;

} else {

    echo 'Message has been sent';

}

return true;			
?>
