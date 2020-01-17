<?php
echo '111<br><br>';
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../vendor/autoload.php';
include_once 'a_conect.php';

echo '222<br><br>';




//Create a new PHPMailer instance
$mail = new PHPMailer(true);

try{

// Set PHPMailer to use the sendmail transport
$mail->isSendmail();

//Set who the message is to be sent from
$mail->setFrom('ogneyar_ya@mail.ru', 'First Last');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('ya13th@mail.ru', 'John Doe');

//Set the subject line
$mail->Subject = 'PHPMailer sendmail test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');


/*


// `true` включает исключения (exceptions)
$mail = new PHPMailer(true);

try {
  
   
echo '<br><br>333';
  
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    
echo '<br><br>444<br><br>';
    
    $mail->Host       = 'mail.ru';                              // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ogneyar_ya';                     // SMTP username
    
echo '555<br><br>';
    
    $mail->Password   = $passSMTP;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    
echo '666<br><br>';

    
    //Recipients
    $mail->setFrom('ogneyar_ya@mail.ru', 'Mailer');
//    $mail->addAddress('ya13th@mail.ru', 'Joe User');     // Add a recipient
//    $mail->addAddress('ogneyar-ne@yandex.ru');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('ogneyar_ya@mail.ru');

    // Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
echo '777<br><br>';
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
echo '888<br><br>';


*/


    $mail->send();
    echo 'Message has been sent<br>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}<br>";
}


// Подключаем файл бота
include_once 'botInfoUsers.php';
?>
