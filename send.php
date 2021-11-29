<?php
    session_start();
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
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
       $_SESSION['validEmail']=true;
       $_SESSION['error']= "Entered email is not valid.";
       header('Location: index.php');
       exit();
   }

   $phone = $_POST['phone'];
   $type = $_POST['type'];
   $message= $_POST['message'];


   $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
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
    $mail->Subject = "Potwierdzenie wysłania wiadomości ".$name . " ". $surname." ". date("d.m.Y H:i:s");
    $mail->Body    = $message."<br>".$phone."<br>".$email;
    $mail->AltBody = $message."  ".$phone."  ".$email;

    $mail->send();
    $_SESSION['send']=true;
    header('Location: wyslano.php');
} catch (Exception $e) {
    $_SESSION['error'] = "Error has occurred. Try sending message again later.";
}

?>