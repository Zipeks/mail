<?php

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
   

   require 'PHPMailer-master/src/Exception.php';
   require 'PHPMailer-master/src/PHPMailer.php';
   require 'PHPMailer-master/src/SMTP.php';


    if  (!($name)) {
        header('Location: index.php');
    }
   $name = $_POST['name'];
   $surname = $_POST['surname'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $type = $_POST['type'];
   $message= $_POST['message'];


   $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmai';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pratykiemail@gmail.com';                     //SMTP username
    $mail->Password   = 'zaq1@WSX';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pratykiemail@gmail.com', 'Mailer');
    $mail->addAddress('pratykiemail@gmail.com', 'Firma');     //Add a recipient
    $mail->addAddress($email, $name . " ". $surname);               //Name is optional
   //  $mail->addReplyTo('info@example.com', 'Information');
   //  $mail->addCC('cc@example.com');
   //  $mail->addBCC('bcc@example.com');


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $name . " ". $surname. " ". $phone. " ". date("d.m.Y H:i:s");
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    header('Location: wyslano.php');
} catch (Exception $e) {

}

?>